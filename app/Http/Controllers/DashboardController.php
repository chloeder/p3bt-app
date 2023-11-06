<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Mail\StatusMail;
use App\Models\BukuTanah;
use Illuminate\Http\Request;
use App\Models\ArsipPlotting;
use App\Models\BerkasPloting;
use App\Models\DesaBukuTanah;
use App\Models\JenisBukuTanah;
use App\Models\PeminjamanBuku;
use App\Imports\BukuTanahImport;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Notifications\StatusNotification;
use Illuminate\Support\Facades\Notification;

class DashboardController extends Controller
{
  public function index()
  {
    $berkas = BerkasPloting::all();
    $bukuTanah = BukuTanah::count();
    $peminjamanBuku = PeminjamanBuku::orderBy('tanggal_dikembalikan', 'desc')->get();
    // dd($peminjamanBuku);
    $peminjaman = PeminjamanBuku::where('tanggal_dikembalikan', null)->count();
    $pengembalian = PeminjamanBuku::where('tanggal_dikembalikan', '!=', null)->count();
    $dokumen_plotting = BerkasPloting::count();
    return view('welcome', compact('berkas', 'bukuTanah', 'peminjaman', 'pengembalian', 'dokumen_plotting', 'peminjamanBuku'));
  }

  public function dokumen_plotting()
  {
    $berkas = BerkasPloting::all();
    return view('dokumen-plotting', compact('berkas'));
  }

  public function dokumen_plotting_detail(Request $request, $id)
  {
    return view('dokumen-plotting-detail', [
      'berkas' => BerkasPloting::find($id),
    ]);
  }

  public function dokumen_plotting_status(Request $request, $id)
  {
    $getStatus = BerkasPloting::where('id', $id)->first();
    $getStatus->status = $request->input('status');
    $getStatus->save();
    if ($getStatus->status == 'Divalidasi') {
      $arsip = new ArsipPlotting;
      $arsip->ploting_id = $id;
      $arsip->save();
    }
    $getStatus->notify(new StatusNotification($getStatus));
    Toastr::success('Status berhasil diperbaharui');
    return redirect()->back();
  }

  public function peminjaman()
  {
    $peminjaman = PeminjamanBuku::all();
    return view('peminjaman', compact('peminjaman'));
  }

  public function peminjaman_detail($id)
  {
    $bukutanah = BukuTanah::find($id);
    if ($bukutanah->status == 'Dipinjam') {
      Toastr::error('Buku Tanah sedang dipinjam, silahkan pilih buku tanah yang lain');
      return redirect()->back();
    }
    return view('peminjaman-detail', compact('bukutanah'));
  }

  public function peminjaman_store(Request $request, $id)
  {
    $request->validate(
      [
        'nama_peminjam' => 'required',
      ],
      [
        'nama_peminjam.required' => 'Nama peminjam tidak boleh kosong',
      ]
    );
    $request['nama_peminjam'] = $request->nama_peminjam;
    $request['tanggal_peminjaman'] = Carbon::now()->toDateString();
    $request['tanggal_pengembalian'] = Carbon::now()->addDays(7)->toDateString();
    $request['bukutanah_id'] = $id;
    $request['user_id'] = auth()->user()->id;

    $bukutanah = BukuTanah::findOrFail($request->bukutanah_id)->only('status');
    if ($bukutanah['status'] != 'Tersedia') {
      toastr()->error('Buku Tanah sedang dipinjam');
      return redirect()->back();
    } else {
      $count = PeminjamanBuku::where('user_id', $request->user_id)->where('tanggal_dikembalikan', null)->count();

      if ($count >= 3) {
        toastr()->error('Anda telah mencapai batas peminjaman, silahkan kembalikan buku terlebih dahulu');
        return redirect()->back();
      } else {
        try {
          DB::beginTransaction();
          PeminjamanBuku::create($request->all());
          $bukutanah = BukuTanah::findOrFail($request->bukutanah_id);
          $bukutanah->status = 'Dipinjam';
          $bukutanah->save();
          DB::commit();
          toastr()->success('Buku Tanah berhasil dipinjam');
          return redirect('/buku-tanah');
        } catch (\Throwable $th) {
          DB::rollback();
          dd($th);
        }
      }
    }
  }

  public function riwayat()
  {
    $riwayat = PeminjamanBuku::where('user_id', auth()->user()->id)->get();
    return view('riwayat', compact('riwayat'));
  }

  public function pengembalian_detail($id)
  {
    $pengembalian = PeminjamanBuku::where('user_id', auth()->user()->id)->where('bukutanah_id', $id)->where('tanggal_dikembalikan', null)->first();
    if ($pengembalian == null) {
      Toastr::error('Anda tidak meminjam buku ini, buku ini tidak dapat dikembalikan');
      return redirect()->back();
    }
    return view('pengembalian-detail', compact('pengembalian'));
  }

  public function pengembalian_store(Request $request, $id)
  {
    $pengembalian = PeminjamanBuku::findOrFail($id);
    $request['nama_peminjam'] = $pengembalian->nama_peminjam;
    $request['tanggal_peminjaman'] = Carbon::now()->toDateString();
    $request['tanggal_pengembalian'] = Carbon::now()->addDays(7)->toDateString();
    $request['bukutanah_id'] = $pengembalian->bukutanah_id;
    $request['user_id'] = auth()->user()->id;
    // dd($request->all());
    $rent = PeminjamanBuku::where('user_id', $request->user_id)->where('bukutanah_id', $request->bukutanah_id)->where('tanggal_dikembalikan', null);
    $rentData = $rent->first();
    $countData = $rent->count();
    if ($countData == 1) {
      $bukuTanah = BukuTanah::findOrFail($request->bukutanah_id);
      $bukuTanah->status = 'Tersedia';
      $bukuTanah->save();
      $rentData->tanggal_dikembalikan = Carbon::now()->toDateString();
      // dd($rentData);
      $rentData->save();

      Toastr::success('Buku Tanah berhasil dikembalikan');
      return redirect('/buku-tanah');
    } else {
      Toastr::error('Buku Tanah gagal dikembalikan');
      return redirect()->back();
    }
  }

  public function buku_tanah()
  {
    $desaBT = DesaBukuTanah::all();
    return view('buku-tanah', compact('desaBT'));
  }

  public function detail($id)
  {
    $desaBT = DesaBukuTanah::find($id);
    $bukuTanah = BukuTanah::where('desa_id', $id)->get();
    $jenisBT = JenisBukuTanah::find($id);

    return view('detail', compact('bukuTanah', 'desaBT', 'jenisBT'));
  }

  public function buku_tanah_import(Request $request)
  {
    Excel::import(new BukuTanahImport, $request->file('file'));
    toastr()->success('Data berhasil diimport');
    return redirect()->back();
  }

  public function arsip_ploting()
  {
    $arsip = ArsipPlotting::all();
    return view('arsip-ploting', compact('arsip'));
  }
}
