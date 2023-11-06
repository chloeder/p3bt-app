@extends('layouts.main')
@section('content')
    <div class="page-content-wrapper-inner">
        <div class="content-viewport">
            <div class="row">
                <div class="col-12 py-5">
                    <h4>Dashboard</h4>
                    <p class="text-gray">Welcome Dashboard, {{ Auth::user()->name }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-6 equel-grid">
                    <div class="grid">
                        <div class="grid-body text-gray">
                            <div class="d-flex justify-content-between">

                                <p>Total : {{ $bukuTanah }}</p>
                            </div>
                            <p class="text-black">Buku Tanah</p>
                            <div class="wrapper w-50 mt-4">
                                <canvas height="45" id="stat-line_1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 equel-grid">
                    <div class="grid">
                        <div class="grid-body text-gray">
                            <div class="d-flex justify-content-between">

                                <p>Total : {{ $peminjaman }}</p>
                            </div>
                            <p class="text-black">Peminjaman</p>
                            <div class="wrapper w-50 mt-4">
                                <canvas height="45" id="stat-line_2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 equel-grid">
                    <div class="grid">
                        <div class="grid-body text-gray">
                            <div class="d-flex justify-content-between">

                                <p>Total : {{ $pengembalian }}</p>
                            </div>
                            <p class="text-black">Pengembalian</p>
                            <div class="wrapper w-50 mt-4">
                                <canvas height="45" id="stat-line_3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 equel-grid">
                    <div class="grid">
                        <div class="grid-body text-gray">
                            <div class="d-flex justify-content-between">
                                <p>Total : {{ $dokumen_plotting }}</p>
                            </div>
                            <p class="text-black">Dokumen Plotting</p>
                            <div class="wrapper w-50 mt-4">
                                <canvas height="45" id="stat-line_4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 equel-grid">
                    <div class="grid">
                        <div class="grid-body py-3">
                            <p class="card-title ml-n1">Riwayat Berkas Plotting</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Jenis Berkas</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($berkas as $b)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $b->jenis_berkas }}</td>
                                            @if ($b->status == 'Belum Divalidasi')
                                                <td class="text-center text-warning">{{ $b->status }}
                                                </td>
                                            @elseif($b->status == 'Divalidasi')
                                                <td class="text-center text-success">{{ $b->status }}</td>
                                            @else
                                                <td class="text-center text-danger">{{ $b->status }}</td>
                                            @endif
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-primary btn-xs"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('dokumen.plotting.detail', $b->id) }}">Cek
                                                                Validasi
                                                                Berkas
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- <tr>
                                        <td class="pr-0 pl-4">
                                            <img class="profile-img img-sm"
                                                src="{{ asset('admin') }}/src/assets/images/profile/male/image_4.png"
                                                alt="profile image">
                                        </td>
                                        <td class="pl-md-0">
                                            <small class="text-black font-weight-medium d-block">Barbara
                                                Curtis</small>
                                            <span class="text-gray">
                                                <span
                                                    class="status-indicator rounded-indicator small bg-primary"></span>Account
                                                Deactivated
                                            </span>
                                        </td>
                                        <td>
                                            <small>8523537435</small>
                                        </td>
                                        <td> Just Now </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                        <a class="border-top px-3 py-2 d-block text-gray" href="{{ route('dokumen.plotting') }}">
                            <small class="font-weight-medium"><i class="mdi mdi-chevron-down mr-2"></i>View
                                All Plotting History</small>
                        </a>
                    </div>
                </div>
                <div class="col-md-12 equel-grid">
                    <div class="grid">
                        <div class="grid-body py-3">
                            <p class="card-title ml-n1">Riwayat Keterlambatan</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nomor Berkas</th>
                                        <th class="text-center">Nama Peminjam</th>
                                        <th class="text-center">Tanggal Pengembalian</th>
                                        <th class="text-center">Tanggal Dikembalikan</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peminjamanBuku as $pb)
                                        @if ($pb->tanggal_pengembalian < $pb->tanggal_dikembalikan)
                                            <tr>
                                                <td class="text-center">{{ $pb->bukutanah->nomor_hak }}</td>
                                                <td class="text-center">{{ $pb->nama_peminjam }}</td>
                                                <td class="text-center">{{ $pb->tanggal_pengembalian }}</td>
                                                <td class="text-center">{{ $pb->tanggal_dikembalikan }}</td>

                                                <td class="text-center text-danger">
                                                    Terlambat
                                                </td>

                                            </tr>
                                        @endif
                                    @endforeach
                                    {{-- <tr>
                                        <td class="pr-0 pl-4">
                                            <img class="profile-img img-sm"
                                                src="{{ asset('admin') }}/src/assets/images/profile/male/image_4.png"
                                                alt="profile image">
                                        </td>
                                        <td class="pl-md-0">
                                            <small class="text-black font-weight-medium d-block">Barbara
                                                Curtis</small>
                                            <span class="text-gray">
                                                <span
                                                    class="status-indicator rounded-indicator small bg-primary"></span>Account
                                                Deactivated
                                            </span>
                                        </td>
                                        <td>
                                            <small>8523537435</small>
                                        </td>
                                        <td> Just Now </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                        <a class="border-top px-3 py-2 d-block text-gray" href="{{ route('dokumen.plotting') }}">
                            <small class="font-weight-medium"><i class="mdi mdi-chevron-down mr-2"></i>View
                                All Plotting History</small>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- content viewport ends -->
    <!-- partial:partials/_footer.html -->
    {{-- <footer class="footer">
        <div class="row">
            <div class="col-sm-6 text-center text-sm-right order-sm-1">
                <ul class="text-gray">
                    <li><a href="#">Terms of use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
                <small class="text-muted d-block">Copyright © 2019 <a href="http://www.uxcandy.co"
                        target="_blank">UXCANDY</a>. All rights reserved</small>
                <small class="text-gray mt-2">Handcrafted With <i class="mdi mdi-heart text-danger"></i></small>
            </div>
        </div>
    </footer> --}}
    <!-- partial -->
@endsection
