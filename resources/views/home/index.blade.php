@extends('layouts.home')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>Kantor ATR/BPN Kotamobagu</h1>
                    <h2>Menjadi lembaga yang mampu mewujudkan tanah dan
                        pertanahan untuk sebesar-besar kemakmuran rakyat, serta keadilan dan keberlanjutan sistem
                        kemasyarakatan, kebangsaan dan kenegaraan Republik Indonesia</h2>
                    <div>
                        <a href="{{ route('validasi') }}" class="btn-get-started scrollto">Cek Validasi</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="{{ asset('img/logo-p3bt.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row justify-content-between">
                    <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
                        <img src="{{ asset('home') }}/assets/img/about-img.svg" class="img-fluid" alt=""
                            data-aos="zoom-in">
                    </div>
                    <div class="col-lg-6 pt-5 pt-lg-0">
                        <h3 data-aos="fade-up"> Kementerian Agraria Dan Tata Ruang/ Badan Pertanahan Nasional</h3>
                        <p data-aos="fade-up" data-aos-delay="100">
                            Sesuai Peraturan Menteri Agraria dan Tata Ruang Nomor 16 Tahun 2020
                            tentang Organisasi dan Tata Kerja Kementerian Agraria dan Tata Ruang/ Badan Pertanahan
                            Nasional, Pusat Pengembangan dan Standarisasi Kebijakan Agraria, Tata Ruang dan Pertanahan
                            (PPSK-ATP) merupakan unsur pendukung yang berada di bawah dan bertanggung jawab kepada
                            Menteri/Kepala melalui Sekretaris Jenderal.
                        </p>
                        <div class="row">
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <i class="bx bx-receipt"></i>
                                <h4>Visi</h4>
                                <p>Menjadi lembaga yang mampu mewujudkan tanah dan pertanahan untuk
                                    sebesar-besar kemakmuran rakyat, serta keadilan dan keberlanjutan sistem
                                    kemasyarakatan,
                                    kebangsaan dan kenegaraan Republik Indonesia.
                                </p>
                            </div>
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <i class="bx bx-cube-alt"></i>
                                <h4>Misi</h4>
                                <p>Mengembangkan dan menyelenggarakan politik dan kebijakan pertanahan
                                    untuk:
                                    Peningkatan kesejahteraan rakyat, penciptaan sumber-sumber baru kemakmuran rakyat
                                    pengurangan kemiskinan dan kesenjangan pendapatan, serta pemantapan ketahanan
                                    pangan.
                                    Peningkatan tatanan kehidupan bersama yang lebih berkeadilan dan bermartabat dalam
                                    kaitannya
                                    dengan penguasaan, pemilikan, penggunaan dan pemanfaatan tanah (P4T).
                                    Perwujudan tatanan kehidupan bersama yang harmonis dengan mengatasi berbagai
                                    sengketa,
                                    konflik dan perkara pertanahan di seluruh tanah air dan penataan perangkat hukum dan
                                    sistem
                                    pengelolaan pertanahan sehingga tidak melahirkan sengketa, konflik dan perkara di
                                    kemudian
                                    hari.
                                    Keberlanjutan sistem kemasyarakatan, kebangsaa dan kenegaraan Indonesia dengan
                                    memberikan
                                    akses seluas-luasnya pada generasi yang akan datang terhadap tanah sebagai sumber
                                    kesejahteraan masyarakat. Menguatkan lembaga pertanahan sesuai dengan jiwa,
                                    semangat,
                                    prinsip dan aturan yang tertuang dalam UUPA dan aspirasi rakyat secara luas.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Pelayanan</h2>
                    <p>Jenis pelayanan terdiri dari pelayanan: </p>
                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4 class="title"><a href="">Informasi Ketersediaan</a></h4>
                            <p class="description">Informasi ketersediaan tanah dan pertimbangan teknis pertanahan</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">Pengukuran</a></h4>
                            <p class="description">Pengukuran bidang tanah untuk masyarakat sekitar</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4 class="title"><a href="">Penetapan</a></h4>
                            <p class="description">Penetapan hak atas tanah dan pendaftaran keputusan hak atas tanah
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-world"></i></div>
                            <h4 class="title"><a href="">Pengelolaan</a></h4>
                            <p class="description">Pengelolaan pengaduan dari setiap masyarakat sekitar</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->



        <!-- ======= Contact Us Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <p>Hubungi Kami</p>

                </div>

                <div class="row">

                    <div class="col-lg d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>Jalan Kolonel Soegiono No.125 Kotobangon, Kec. Kotamobagu Tim., Kota Kotamobagu, Sulawesi
                                    Utara</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>kot-kotamobagu@atrbpn.go.id</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>No Telepon:</h4>
                                <p>(0434) 2628699</p>
                            </div>

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.4880066917312!2d124.32838521038212!3d0.737271299252453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x327e3d4ccb4117b5%3A0x6235038c6a1af93e!2sKantor%20Pertanahan%20Kota%20Kotamobagu!5e0!3m2!1sen!2sid!4v1684999642771!5m2!1sen!2sid"
                                frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                        </div>

                    </div>

                    {{-- <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="200">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Your Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                    <label for="name">Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">Message</label>
                                <textarea class="form-control" name="message" rows="10" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div> --}}

                </div>

            </div>
        </section><!-- End Contact Us Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    {{-- <footer id="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h4>Join Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Ninestars</h3>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Ninestars</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer --> --}}
@endsection
