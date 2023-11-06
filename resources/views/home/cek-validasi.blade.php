@extends('layouts.home')
@section('content')
    <main id="main">
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <p>Form Validasi Berkas</p>
                </div>

                <div class="row">

                    {{-- <div class="col-lg d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55s</p>
                        </div>

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                            frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>

                </div> --}}

                    <div class="col-lg mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <form action="{{ route('cek.validasi') }}" method="post" class="php-form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="Nama" value="{{ old('nama') }}">
                                    @error('nama')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 my-4 mt-md-0">
                                    <label for="name">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                        name="alamat" id="alamat" placeholder="Alamat" value="{{ old('alamat') }}">
                                    @error('alamat')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6  mt-md-0">
                                    <label for="name">No Telepon</label>
                                    <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                        name="no_hp" id="no_hp" placeholder="No Telepon" value="{{ old('no_hp') }}">
                                    @error('no_hp')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 my-4 mt-md-0">
                                    <label for="name">Alamat Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" placeholder="Alamat Email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Jenis Berkas</label>
                                <input type="text" class="form-control @error('jenis_berkas') is-invalid @enderror"
                                    name="jenis_berkas" id="jenis_berkas" placeholder="Jenis Berkas"
                                    value="{{ old('jenis_berkas') }}">
                                @error('jenis_berkas')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="input-group mt-4">
                                <input type="file" class="form-control @error('file') is-invalid @enderror"
                                    id="file" name="file" onchange="previewImage()">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                <img class="img-preview img-fluid">
                                @error('file')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="my-4">

                                <div class="text-center">
                                    <button type="submit">Kirim Validasi</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Us Section -->
    </main>
@endsection
@push('js')
    <script>
        function previewImage() {
            const file = document.querySelector('#file');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(file.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush
