<div>
    <section class="hero-section animate__animated animate__fadeIn animate-in-out">
        <div class="container text-center content">
            <h1 class="animate__animated animate__fadeInDown">Selamat Datang</h1>
            <p class="animate__animated animate__fadeInUp">
                Bagi Alumni Universitas Sembilanbelas November Kolaka, siapkan diri Anda untuk mengisi
                kuisioner tracer study.
            </p>
            <div class="d-flex justify-content-center gap-3 animate__animated animate__fadeInUp">
                <a href="{{ url('/') }}/alumni/register" class="btn btn-custom-red btn-lg">Daftar Disini</a>
                <a href="http://www.usn.ac.id/" class="btn btn-custom-blue btn-lg">Informasi Lengkap</a>
            </div>
        </div>
    </section>
    <!-- Alur Pengisian Section -->
    <section class="alur-section animate-in-out">
        <div class="container">
            <h2 class="text-center mb-5">Alur Pengisian Simpatik</h2>
            <div class="row text-center">
                <div class="col-md-6 mb-4 animate__animated animate__fadeInUp">
                    <div class="step">
                        <h4>Register</h4>
                        <p>Daftarkan diri Anda untuk mendapatkan akses ke Simpatik.</p>
                        <div class="badge rounded-pill bg-secondary">1</div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="step">
                        <h4>Login</h4>
                        <p>Masuk ke sistem menggunakan akun yang telah didaftarkan.</p>
                        <div class="badge rounded-pill bg-secondary">2</div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="step">
                        <h4>Isi Biodata</h4>
                        <p>Lengkapi biodata Anda untuk keperluan Simpatik.</p>
                        <div class="badge rounded-pill bg-secondary">3</div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="step">
                        <h4>Pengisian Kuisioner</h4>
                        <p>Isi kuisioner Simpatik dengan lengkap dan benar.</p>
                        <div class="badge rounded-pill bg-secondary">4</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rektor Section -->
    <section class="rektor-section animate-in-out pb-4">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-4 animate__animated animate__fadeInUp d-flex align-items-center justify-content-end">
                    <img class="sambutan-image" src="{{ asset('rektor_usn_kolaka.webp') }}" alt="Rektor">
                    <div class="rektor-name">
                        Dr. H. Nur Ihsan HL, M.Hum
                    </div>
                </div>
                <div class="col-md-8 animate__animated animate__fadeInUp">
                    <div class="rektor-message">
                        <p class="lead">
                            Selamat datang di Universitas Sembilanbelas November Kolaka. Kami sangat bangga dengan para alumni yang telah berkontribusi di berbagai bidang. Kami berharap Anda dapat berpartisipasi dalam website SIMPATIK ini untuk membantu kami meningkatkan kualitas pendidikan di universitas kita tercinta.
                        </p>
                        <p class="font-italic">- Rektor Universitas Sembilanbelas November Kolaka</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hubungi Kami Section -->
    <section class="hubungi-kami-section animate-in-out">
        <div class="container text-center">
            <div class="row">

                <div class="col-md-6 d-flex flex-column align-items-center justify-content-start">
            {{-- <h2 class="mb-5">Hubungi Kami</h2> --}}
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('logo_usn.webp') }}" alt="Logo USN" class="img-fluid" style="width: 100px;">
                        <img src="{{ asset('assets/img/favicon/android-chrome-192x192.png') }}" alt="Logo Simpatik" class="img-fluid ms-3" style="width: 100px;">
                    </div>
                    <p class="fw-bold">Universitas Sembilanbelas November Kolaka</p>
                    <small class="text-dark">Jl. small emuda No. 339 Kolaka, Indonesia</small >
                    <small class="text-dark">Phone: +62 (405) 2321132</small >
                    <small class="text-dark">Email: rektorat@usn.ac.id</small >
                </div>
                <div class="col-md-6 text-start">

                    <div class="row">
                        <div class="col-md-12 mb-1">
                            <p class="fw-bold text-dark text-center mt-2">
                                <u>Website Terkait</u>
                            </p>
                        </div>
                        <div class="col-md-6 mb-2">
                            <a href="http://usn.ac.id" class="btn btn-custom-blue w-100">USN Kolaka</a>
                        </div>
                        <div class="col-md-6 mb-2">
                            <a href="http://sisakti.usn.ac.id" class="btn btn-custom-blue w-100">SISAKTI</a>
                        </div>
                        <div class="col-md-6 mb-2">
                            <a href="http://simpel.usn.ac.id" class="btn btn-custom-blue w-100">SIMPEL</a>
                        </div>
                        <div class="col-md-6 mb-2">
                            <a href="http://ppid.usn.ac.id" class="btn btn-custom-blue w-100">PPID</a>
                        </div>
                        <div class="col-md-6 mb-2">
                            <a href="http://sidu.usn.ac.id" class="btn btn-custom-blue w-100">SIDU</a>
                        </div>
                        <div class="col-md-6 mb-2">
                            <a href="http://siakad.usn.ac.id" class="btn btn-custom-blue w-100">SIAKAD (lama)</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
