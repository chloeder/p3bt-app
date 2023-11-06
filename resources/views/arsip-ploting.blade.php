@extends('layouts.main')
@section('content')
    <div class="col-lg-12">
        <div class="grid">
            <p class="grid-header">Arsip Plotting</p>
            <div class="item-wrapper">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Nomor Telepon</th>
                                <th class="text-center">Alamat Email</th>
                                <th class="text-center">Jenis Berkas</th>
                                <th class="text-center">File</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arsip as $b)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $b->berkasplotting->nama }}</td>
                                    <td class="text-center">{{ $b->berkasplotting->alamat }}</td>
                                    <td class="text-center">{{ $b->berkasplotting->no_hp }}</td>
                                    <td class="text-center">{{ $b->berkasplotting->email }}</td>
                                    <td class="text-center">{{ $b->berkasplotting->jenis_berkas }}</td>
                                    <td class="text-center">{{ $b->berkasplotting->file }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
