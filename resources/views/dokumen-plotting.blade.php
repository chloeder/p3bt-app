@extends('layouts.main')
@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
@endpush
@section('content')
    <div class="col-lg-12">
        <div class="grid">
            <p class="grid-header">Arsip Plotting</p>
            <div class="item-wrapper">
                <div class="table-responsive">
                    <table class="table table-hover my-3" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Nomor Telepon</th>
                                <th class="text-center">Alamat Email</th>
                                <th class="text-center">Jenis Berkas</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">File</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berkas as $b)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $b->nama }}</td>
                                    <td class="text-center">{{ $b->alamat }}</td>
                                    <td class="text-center">{{ $b->no_hp }}</td>
                                    <td class="text-center">{{ $b->email }}</td>
                                    <td class="text-center">{{ $b->jenis_berkas }}</td>
                                    @if ($b->status == 'Belum Divalidasi')
                                        <td class="text-center text-warning">{{ $b->status }}</td>
                                    @elseif($b->status == 'Divalidasi')
                                        <td class="text-center text-success">{{ $b->status }}</td>
                                    @else
                                        <td class="text-center text-danger">{{ $b->status }}</td>
                                    @endif
                                    <td class="text-center">{{ $b->file }}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary btn-xs" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('dokumen.plotting.detail', $b->id) }}">Cek Validasi
                                                        Berkas
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
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
