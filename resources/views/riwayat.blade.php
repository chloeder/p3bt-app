@extends('layouts.main')
@section('content')
    <div class="col-lg-12">
        <div class="grid">
            <p class="grid-header">Pengembalian</p>
            <div class="item-wrapper">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peminjam</th>
                                <th>Nama Pengguna</th>
                                <th>Desa</th>
                                <th>Jenis Hak</th>
                                <th>Nomor Hak Milik</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Tanggal Dikembalikan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayat as $r)
                                <tr
                                    class="{{ $r->tanggal_dikembalikan == null ? '' : ($r->tanggal_pengembalian < $r->tanggal_dikembalikan ? 'bg-danger' : 'bg-success') }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $r->nama_peminjam }}</td>
                                    <td>{{ $r->user->name }}</td>
                                    <td>{{ $r->bukutanah->desa->nama }}</td>
                                    <td>{{ $r->bukutanah->jenis_hak->nama }}</td>
                                    <td>{{ $r->bukutanah->nomor_hak }}</td>
                                    <td>{{ $r->tanggal_peminjaman }}</td>
                                    <td>{{ $r->tanggal_pengembalian }}</td>
                                    @if ($r->tanggal_dikembalikan == null)
                                        <td>
                                            <span class="fst-italic fw-light">Belum Dikembalikan</span>
                                        </td>
                                    @else
                                        <td>{{ $r->tanggal_dikembalikan }}</td>
                                    @endif
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
