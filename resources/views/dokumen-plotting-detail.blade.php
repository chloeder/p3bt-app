@extends('layouts.main')
@stack('css')
<style>
    .image-container .image {

        border: 5px solid #ffffff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
        cursor: pointer;
        overflow: hidden;
    }

    .popup-image {
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.8);
        height: 100%;
        width: 100%;
        z-index: 100;
        display: none;
    }

    .popup-image span {
        position: absolute;
        top: 0;
        right: 10px;
        font-size: 30px;
        font-weight: bold;
        color: #fff;
        cursor: pointer;
        z-index: 100;
    }

    .popup-image img {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: #fff solid 5px;
        border-radius: 5px;
        width: 750px;
        object-fit: cover;
        background-attachment: fixed;

    }

    @media(max-width: 768px) {
        .popup-image img {
            width: 95%;
        }
    }
</style>
@section('content')
    <div class="col-lg-12">
        <div class="grid">

            <div class="item-wrapper">
                <div class="col-lg-12">
                    <div class="grid">
                        <p class="grid-header">Dokumen Plotting</p>
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <div class="row mb-3">
                                    <div class="col-md-8 mx-auto">
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area">
                                                <label for="inputType1">Nama</label>
                                            </div>
                                            <div class="col-md-9 showcase_content_area">
                                                <input type="text" class="form-control" id="inputType1"
                                                    value="{{ $berkas->nama }}" disabled readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area">
                                                <label for="inputType12">Alamat</label>
                                            </div>
                                            <div class="col-md-9 showcase_content_area">
                                                <input type="text" class="form-control" id="inputType2"
                                                    value="{{ $berkas->alamat }}" disabled readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area">
                                                <label for="inputType13">No Telepon</label>
                                            </div>
                                            <div class="col-md-9 showcase_content_area">
                                                <input type="text" class="form-control" id="inputType3"
                                                    value="{{ $berkas->no_hp }}" disabled readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area">
                                                <label for="inputType13">Email</label>
                                            </div>
                                            <div class="col-md-9 showcase_content_area">
                                                <input type="text" class="form-control" id="inputType3"
                                                    value="{{ $berkas->email }}" disabled readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area">
                                                <label for="inputType13">Jenis Berkas</label>
                                            </div>
                                            <div class="col-md-9 showcase_content_area">
                                                <input type="text" class="form-control" id="inputType3"
                                                    value="{{ $berkas->jenis_berkas }}" disabled readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area">
                                                <label for="inputType13">Dimasukkan</label>
                                            </div>
                                            <div class="col-md-9 showcase_content_area">
                                                <input type="text" class="form-control" id="inputType3"
                                                    value="{{ $berkas->created_at }}" disabled readonly />
                                            </div>
                                        </div>

                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area">
                                                <label for="inputType13">Lampiran</label>
                                            </div>
                                            <div class="col-md-9 showcase_content_area">
                                                <div class="image-container">
                                                    <embed src="{{ asset('storage/' . $berkas->file) }}" width="600"
                                                        height="800" type="application/pdf">

                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('dokumen.plotting.status', $berkas->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row showcase_row_area">
                                                <div class="row showcase_row_area">
                                                    <div class="col-md-3 showcase_text_area">
                                                        <label>Status</label>
                                                    </div>
                                                    <div class="col-md-9 showcase_content_area">
                                                        <select name="status" class="custom-select">
                                                            <option>Select Status</option>

                                                            <option value="Divalidasi"
                                                                {{ Request::is('status') ? 'Divalidasi' : '' }}>
                                                                Validasi</option>
                                                            <option value="Tidak Valid"
                                                                {{ Request::is('status') ? 'Tidak Valid' : '' }}>
                                                                Tidak Valid</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end mt-5">
                                                <a href="{{ route('dokumen.plotting') }}" class="btn btn-info">Back</a>
                                                <button type="submit" class="btn btn-primary ms-3">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('js')
    <script>
        document.querySelectorAll('.image-container img').forEach(image => {
            image.onclick = () => {
                document.querySelector('.popup-image').style.display = 'block';
                document.querySelector('.popup-image img').src = image.getAttribute('src');

            }
        });

        document.querySelector('.popup-image span').onclick = () => {
            document.querySelector('.popup-image').style.display = 'none';
        }
    </script>
@endpush
