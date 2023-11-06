@extends('layouts.main')
@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
@endpush
@section('content')
    <div class="col-lg-12">
        <div class="grid">
            <p class="grid-header">{{ $desaBT->nama }}</p>

            <div class="d-flex justify-content-between my-3">
                <button type="button" class="btn btn-success has-icon mb-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="mdi mdi-file-document"></i>Import Excel
                </button>
                <a href="{{ route('buku.tanah') }}" class="btn btn-info">Back</a>
            </div>
            <div class="item-wrapper">
                <div class="table-responsive">
                    <table class="table table-hover my-3" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Hak</th>
                                <th>Nama Desa</th>
                                <th>Jenis Hak</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bukuTanah as $bt)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $bt->nomor_hak }}</td>
                                    <td>{{ $bt->desa->nama }}</td>
                                    <td>{{ $bt->jenis_hak->nama }}</td>
                                    <td>
                                        @if ($bt->status == 'Tersedia')
                                            <span class="text-success fw-bold">Tersedia</span>
                                        @else
                                            <span class="text-danger fw-bold">Dipinjam</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary btn-xs" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('peminjaman.detail', $bt->id) }}">Pinjam Buku
                                                        Tanah
                                                    </a>

                                                    <a class="dropdown-item"
                                                        href="{{ route('pengembalian.detail', $bt->id) }}">Kembalikan
                                                        Buku
                                                        Tanah
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('buku.tanah.import') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>

    @push('js')
        <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    @endpush
@endsection
