<?php

namespace App\Http\Controllers;

use App\Models\BerkasPloting;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function view_cekvalidasi()
    {
        return view('home.cek-validasi');
    }

    public function cek_validasi(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|min:3|max:255',
            'alamat' => 'required|string|min:3|max:255',
            'no_hp' => 'required|string|min:11|max:255',
            'email' => 'required|email',
            'jenis_berkas' => 'required|string|min:3|max:255',
            'file' => 'required|mimes:ppt,pptx,doc,docx,txt,pdf,xls,xlsx,jpeg,jpg,png,psd,gif,raw,zip|max:204800|max:10000',

        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.min' => 'Nama minimal 3 karakter',
            'nama.max' => 'Nama maksimal 255 karakter',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.min' => 'Alamat minimal 3 karakter',
            'alamat.max' => 'Alamat maksimal 255 karakter',
            'no_hp.required' => 'No HP tidak boleh kosong',
            'no_hp.min' => 'No HP minimal 11 karakter',
            'no_hp.max' => 'No HP maksimal 255 karakter',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'jenis_berkas.required' => 'Jenis Berkas tidak boleh kosong',
            'jenis_berkas.min' => 'Jenis Berkas minimal 3 karakter',
            'jenis_berkas.max' => 'Jenis Berkas maksimal 255 karakter',
            'file.required' => 'File tidak boleh kosong',
            'file.mimes' => 'File tidak valid',
            'file.max' => 'File maksimal 200MB',
        ]);
        if ($request->hasFile('file')) {
            $validatedData['file'] = $request->file->getClientOriginalName();
            $request->file->storeAs('public', $validatedData['file']);
        } else {
            $validated = 'nodatafound';
        }
        $berkas = BerkasPloting::create($validatedData);
        Toastr::success('Data berhasil dikirim', 'Success');
        return redirect()->route('home', compact('berkas'));
    }
}
