@extends('layout.layout')

@section('content')
    <!-- Contact Section -->
    <section id="kontak" class="py-5 bg-light">
        <div class="container">
            <!-- Heading -->
            <div class="row text-center mb-5 py-5" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="fw-bold text-primary">Kontak Kami</h2>
                <p class="text-muted">Hubungi kami atau kunjungi lokasi kami</p>
                <div class="mx-auto"
                    style="width:80px; height:4px; background:linear-gradient(90deg,#2980b9,#2ecc71); border-radius:2px;">
                </div>
            </div>

            <div class="row g-4" data-aos="fade-up-right" data-aos-duration="1000">
                <!-- Kiri: Info Kontak & Sosial Media -->
                <div class="col-lg-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100 contact-card">
                        <h5 class="fw-bold text-primary mb-3">Informasi Kontak</h5>
                        <p class="mb-2"><i class="bi bi-telephone-fill text-primary me-2"></i>(021) 123-4567</p>
                        <p class="mb-2"><i class="bi bi-envelope-fill text-primary me-2"></i>puskesmas@email.com</p>
                        <p class="mb-2"><i class="bi bi-clock-fill text-primary me-2"></i>Senin - Jumat: 08.00 - 16.00</p>

                        <!-- Sosial Media -->
                        <div class="mt-4 d-flex">
                            <a href="https://wa.me/6285799690454" target="_blank"
                                class="d-flex align-items-center justify-content-center me-3 rounded-circle"
                                style="width:45px; height:45px; background:#25D366; color:white;">
                                <i class="bi bi-whatsapp fs-5"></i>
                            </a>
                            <a href="#" class="d-flex align-items-center justify-content-center me-3 rounded-circle"
                                style="width:45px; height:45px; background:#1877F2; color:white;">
                                <i class="bi bi-facebook fs-5"></i>
                            </a>
                            <a href="#" class="d-flex align-items-center justify-content-center rounded-circle"
                                style="width:45px; height:45px; background:#E4405F; color:white;">
                                <i class="bi bi-instagram fs-5"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Kanan: Lokasi / Google Maps -->
                <div class="col-lg-6" data-aos="fade-up-left" data-aos-duration="1000">
                    <div class="bg-white p-2 rounded shadow-sm h-100">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126918.5749076267!2d106.689429!3d-6.229728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e5c7046a0f%3A0x301576d14feb!2sPuskesmas!5e0!3m2!1sid!2sid!4v1234567890"
                            width="100%" height="300" style="border:0; border-radius:8px;" allowfullscreen=""
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- CTA Section -->
    <section class="py-5" style="background-color:#106aa7;" id="cta">
        <div class="container" data-aos="fade-up-left" data-aos-duration="1500">
            <div class="row align-items-center">

                <!-- Gambar Kiri -->
                <div class="col-md-6 text-center mb-4 mb-md-0">
                    <img src="{{ asset('asset/img/consule.jpg') }}" alt="Konsultasi Kesehatan" class="img-fluid"
                        style="max-height:320px;">
                </div>

                <!-- Deskripsi Kanan -->
                <div class="col-md-6 text-white">
                    <h2 class="fw-bold mb-3">
                        KONSULTASIKAN<br>KESEHATAN ANDA
                    </h2>
                    <p class="mb-4">
                        Butuh informasi layanan atau ingin berkonsultasi?
                        Tim kami siap membantu memberikan solusi terbaik
                        untuk kebutuhan kesehatan Anda.
                    </p>
                    <a href="https://wa.me/6285799690454" target="_blank" class="btn px-4 py-2 fw-semibold shadow"
                        style="background-color:#25D366; color:#fff; border-radius:30px;">
                        <i class="bi bi-whatsapp"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- Testimoni Section -->
    <section id="testimoni" class="py-5 bg-light">
        <div class="container">
            <!-- Heading -->
            <div class="row text-center mb-5">
                <h2 class="fw-bold text-primary">Apa Kata Mereka?</h2>
                <p class="text-muted">Cerita pengalaman pasien setelah menggunakan layanan antrian digital Puskesmas</p>
                <div class="d-flex justify-content-center">
                    <div
                        style="width:100px; height:4px; background: linear-gradient(90deg, #2ecc71, #3498db); border-radius:2px;">
                    </div>
                </div>
            </div>

            <!-- Cards -->
            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="card h-100 shadow-sm border-0 rounded testimonial-card">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-quote text-primary fs-1 mb-3"></i>
                            <p class="text-muted fst-italic">"Pelayanan jadi lebih cepat, tidak perlu antre panjang di
                                Puskesmas. Sangat membantu sekali."</p>
                            <h6 class="fw-bold text-primary mt-3 mb-0">Andi Pratama</h6>
                            <small class="text-muted">Pasien Poli Umum</small>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="card h-100 shadow-sm border-0 rounded testimonial-card">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-quote text-success fs-1 mb-3"></i>
                            <p class="text-muted fst-italic">"Sistem antrian digital ini bikin jadwal lebih teratur, jadi
                                nyaman banget datang sesuai jam."</p>
                            <h6 class="fw-bold text-primary mt-3 mb-0">Siti Nurhaliza</h6>
                            <small class="text-muted">Pasien Poli Anak</small>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="card h-100 shadow-sm border-0 rounded testimonial-card">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-quote text-info fs-1 mb-3"></i>
                            <p class="text-muted fst-italic">"Sangat praktis! Tinggal booking online, sampai Puskesmas
                                langsung dapat pelayanan."</p>
                            <h6 class="fw-bold text-primary mt-3 mb-0">Budi Santoso</h6>
                            <small class="text-muted">Pasien Poli Gigi</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Floating WhatsApp -->
    <a href="https://wa.me/6285799690454" target="_blank"
        class="position-fixed d-flex align-items-center justify-content-center"
        style="bottom:20px; right:20px; width:55px; height:55px; background:#25D366; color:white;
          border-radius:50%; box-shadow:0 4px 10px rgba(0,0,0,0.2); z-index:1000;">
        <i class="bi bi-whatsapp fs-3"></i>
    </a>

    <!-- Extra CSS -->
    <style>
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            opacity: 0.8;
            transform: scale(1.1);
            transition: 0.3s ease;
        }
    </style>
@endsection
