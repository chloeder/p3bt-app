@extends('layouts.main')
@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
@endpush
@section('content')
    <div class="col-lg-12">
        <div class="grid">
            <p class="grid-header">Peminjaman</p>
            {{-- <button type="button" class="btn btn-success has-icon mb-3" href="{{ route('peminjaman') }}">
                <i class="mdi mdi-file-document"></i>Pinjam Buku
            </button> --}}
            <div class="item-wrapper">
                <div class="table-responsive">
                    <table class="table table-hover my-3" id="myTable">
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
                            @foreach ($peminjaman as $p)
                                <tr
                                    class="{{ $p->tanggal_dikembalikan == null ? '' : ($p->tanggal_pengembalian < $p->tanggal_dikembalikan ? 'bg-danger' : 'bg-success') }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->nama_peminjam }}</td>
                                    <td>{{ $p->user->name }}</td>
                                    <td>{{ $p->bukutanah->desa->nama }}</td>
                                    <td>{{ $p->bukutanah->jenis_hak->nama }}</td>
                                    <td>{{ $p->bukutanah->nomor_hak }}</td>
                                    <td>{{ $p->tanggal_peminjaman }}</td>
                                    <td>{{ $p->tanggal_pengembalian }}</td>
                                    @if ($p->tanggal_dikembalikan == null)
                                        <td>
                                            <span class="fst-italic fw-light">Belum Dikembalikan</span>
                                        </td>
                                    @else
                                        <td>{{ $p->tanggal_dikembalikan }}</td>
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
@push('js')
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endpush
