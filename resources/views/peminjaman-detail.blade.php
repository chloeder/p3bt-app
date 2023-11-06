@extends('layouts.main')
@section('content')
    <div class="col-lg-12">
        <div class="grid">
            <p class="grid-header">Nomor Hak : {{ $bukutanah->nomor_hak }}</p>
            <div class="grid-body">
                <div class="item-wrapper">
                    <div class="row mb-3">
                        <div class="col-md-8 mx-auto">
                            <form action="{{ route('peminjaman.store', $bukutanah->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="inputEmail1">Nama Peminjam</label>
                                    <input type="text" class="form-control" id="inputEmail1" name="nama_peminjam"
                                        placeholder="Masukkan nama peminjam" />
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1">Desa</label>
                                    <input class="form-control" type="text" value="{{ $bukutanah->desa->nama }}"
                                        aria-label="Disabled input example" disabled readonly>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1">Jenis Hak</label>
                                    <input class="form-control" type="text" value="{{ $bukutanah->jenis_hak->nama }}"
                                        aria-label="Disabled input example" disabled readonly>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1">Nomor Hak Milik</label>
                                    <input class="form-control" type="text" value="{{ $bukutanah->nomor_hak }}"
                                        aria-label="Disabled input example" disabled readonly>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a type="button" class="btn btn-secondary btn-sm me-2"
                                        href="{{ route('detail', $bukutanah->id) }}">Kembali</a>
                                    <button type="submit" class="btn btn-success btn-sm">Pinjam</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
