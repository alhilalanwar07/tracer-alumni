<div>
    <!-- Alert Section -->
    @if($isDataComplete == false)
    <div class="alert alert-danger animate__animated animate__fadeInDown">
        <h4 class="alert-heading">Lengkapi Data Anda!</h4>
        <p>Konfigurasi Anda hampir selesai, silahkan lengkapi data diri Anda. Seperti alamat, tanggal lahir, tempat kerja untuk memudahkan kami mengorganisir data Anda.</p>
        <hr>
        <a href="/alumni/profil" class="btn btn-light">Lengkapi Data &rarr;</a>
    </div>
    @else
        @if($hasFilledQuestionnaire)
            <div class="alert alert-success animate__animated animate__fadeInDown mt-3">
                <h4 class="alert-heading">Terima Kasih!</h4>
                <p>Anda telah mengisi kuisioner. Terima kasih atas partisipasi Anda.</p>
                @if($alumni->keterangan == 'Belum Bekerja' || $alumni->keterangan == 'Study Lanjut')
                <hr>
                <p>Jika status Anda sudah berubah menjadi <b>"sudah bekerja"</b>, silahkan update profil Anda untuk mengisi kuisioner kembali.</p>
                <a href="/alumni/profil" class="btn btn-light">Update Profil &rarr;</a>
                @endif
            </div>
        @else
            <div class="alert alert-custom animate__animated animate__fadeInDown mt-3">
                <h4 class="alert-heading">Isi Kuisioner</h4>
                <p>Data lengkap, silahkan isi kuisioner untuk membantu kami memahami lebih baik pengalaman Anda setelah lulus. Informasi yang Anda berikan akan sangat berharga bagi kami dalam meningkatkan kualitas pendidikan dan layanan kami. Terima kasih atas partisipasi Anda.</p>
                <hr>
                <a href="/alumni/kuisioner" class="btn btn-light">Isi Kuisioner &rarr;</a>
            </div>
        @endif
    @endif

    <!-- Questionnaire Section -->
    <div class="">
        <h5 class="animate__animated animate__fadeInLeft">Kuesioner</h5>
        <p class="animate__animated animate__fadeInRight">Riwayat Pengisian Kuisioner</p>
        {{-- <button class="btn btn-custom btn-sm animate__animated animate__fadeInRight">+ Tambah Kuisioner</button> --}}
    </div>
    <div class="card card-custom mb-4 animate__animated animate__fadeInLeft">
        <div class="card-body table-responsive">
            {{-- <h6>Riwayat Pengisian Kuisioner</h6> --}}
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pengisian</th>
                        <th>Status Anda</th>
                        {{-- <th>Aksi</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse($responses as $response)
                    <tr>
                        <td width="10%">{{ $loop->iteration }}</td>
                        <td width="55%">{{ $response->tanggal_respon }} [{{ Carbon\Carbon::parse($response->tanggal_respon)->diffForHumans() }}]</td>
                        <td width="35%">{{ $response->kategori->nama_kategori }}</td>
                        {{-- <td>
                            <a href="#" class="btn btn-info btn-sm">Lihat Detail</a>
                        </td> --}}
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data kuesioner.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Alumni Information Section -->
    <h5 class="animate__animated animate__fadeInRight">Alumni</h5>
    <p class="animate__animated animate__fadeInRight">Informasi Alumni</p>
    <div class="card card-custom animate__animated animate__fadeInUp">
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Angkatan</th>
                        <th>Wisudawan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($alumnis as $alumni)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alumni->nama }}</td>
                        <td>{{ $alumni->tahun_masuk }}</td>
                        <td>{{ $alumni->wisuda->angkatan }} [{{ Carbon\Carbon::parse($alumni->wisuda->tanggal)->format('d-m-Y') }}]</td>
                        <td>
                            <span class="badge bg-{{ $alumni->keterangan == 'belum bekerja' ? 'danger' : 'success' }}">{{ $alumni->keterangan }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data alumni.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
