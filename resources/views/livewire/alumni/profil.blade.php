<div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-12 text-center mb-3 animate__animated animate__fadeIn">
            <div class="d-flex justify-content-between">
                <h3 class="">Profil Alumni</h3>
                <a href="{{ route('alumni.dashboard') }}" class="btn btn-custom btn-sm"> &lt; Kembali</a>
            </div>
        </div>
        <div class="col-12 col-md-12">
            <div class="row container-bordered">
                @if(!$updatePasswordMode)

                <!-- Profil Gambar dan Nama -->
                <div class="col-12 col-md-4 text-center animate__animated animate__fadeInLeft profile-column">
                    <img src="{{ url('/') }}/{{ $alumni->foto ?? 'no_image.jpg' }}" class="rounded-circle mb-3 img-fluid" alt="Profile Picture" style="max-width: 150px;">
                    <h4 class="text-white">{{ $alumni->nama ?? null }}</h4>
                    <br>
                    @if($alumni->prodi ?? null)
                    <div class="row mb-1">
                        <div class="col-12">
                            <strong>Program Studi:</strong>
                            <p class="highlight-text">{{ $alumni->prodi->nama ?? null}}</p>
                        </div>
                    </div>
                    @if($alumni->prodi->fakultas ?? null)
                    <div class="row mb-1">
                        <div class="col-12">
                            <strong>Fakultas:</strong>
                            <p class="highlight-text">{{ $alumni->prodi->fakultas->nama ?? null }}</p>
                        </div>
                    </div>
                    @else
                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>Fakultas:</strong>
                            <p class="highlight-text">Tidak tersedia</p>
                        </div>
                    </div>
                    @endif
                    @else
                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>Program Studi:</strong>
                            <p class="highlight-text">Tidak tersedia</p>
                        </div>
                    </div>
                    @endif

                </div>

                <!-- Detail Profil -->
                @if(!$updateMode)
                <div class="col-12 col-md-8 animate__animated animate__fadeInUp details-column">
                    <div class="row mb-3 row-hover animated-delay">
                        <div class="col-6">
                            <strong>NIM:</strong>
                            <p>{{ $alumni->nim ?? null }}</p>
                        </div>
                        <div class="col-6">
                            <strong>Tanggal Lahir:</strong>
                            <p>{{ $alumni->tanggal_lahir ?? null }}</p>
                        </div>
                    </div>
                    <div class="row mb-3 row-hover animated-delay-2">
                        <div class="col-6">
                            <strong>Jenis Kelamin:</strong>
                            <p>{{ $alumni->jenis_kelamin ?? null }}</p>
                        </div>
                        <div class="col-6">
                            <strong>Agama:</strong>
                            <p>{{ $alumni->agama ?? null }}</p>
                        </div>
                    </div>
                    <div class="row mb-3 row-hover">
                        <div class="col-6">
                            <strong>Alamat:</strong>
                            <p>{{ $alumni->alamat ?? null }}</p>
                        </div>
                        <div class="col-6">
                            <strong>Nomor Telepon:</strong>
                            <p>{{ $alumni->no_hp ?? null }}</p>
                        </div>
                    </div>
                    <div class="row mb-3 row-hover">
                        <div class="col-6">
                            <strong>Email:</strong>
                            <p>{{ $alumni->email ?? null }}</p>
                        </div>
                        <div class="col-6">
                            <strong>Judul Skripsi:</strong>
                            <p class="highlight-text">{{ $alumni->judul_skripsi ?? null }}</p>
                        </div>
                    </div>
                    <div class="row mb-3 row-hover">
                        <div class="col-6">
                            <strong>IPK:</strong>
                            <p>{{ $alumni->ipk ?? null }}</p>
                        </div>
                        <div class="col-6">
                            <strong>Tahun Masuk:</strong>
                            <p>{{ $alumni->tahun_masuk ?? null }}</p>
                        </div>
                    </div>
                    <div class="row mb-3 row-hover">
                        <div class="col-6">
                            <strong>Keterangan:</strong>
                            <p>{{ $alumni->keterangan ?? null }}</p>
                        </div>
                        <div class="col-6">
                            <strong>Wisudawan:</strong>
                            <p>{{ $alumni->wisuda->angkatan ?? null }} [{{ $alumni->wisuda->tanggal ?? null }}]</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 ">
                            <button class="btn  btn-custom btn-sm btn-block py-2 mr-2" wire:click="edit">Update Profile</button>
                            <button class="btn  btn-danger btn-sm btn-block py-2" wire:click="editPassword">Update Password</button>
                        </div>
                    </div>
                </div>
                @else
                {{-- berikan update profile --}}
                <div class="col-12 col-md-8 animate__animated animate__fadeInUp details-column">
                    <div class="row row-hover animated-delay px-4">

                        <form wire:submit.prevent="updateProfile">
                            @csrf

                            <!-- Nama -->
                            <div class="form-group mb-2">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control @error('nama_edit') is-invalid @enderror" wire:model="nama_edit">
                            </div>
                            <!-- NIM -->
                            <div class="form-group mb-2">
                                <label class="form-label">NIM</label>
                                <input type="text" class="form-control @error('nim_edit') is-invalid @enderror" wire:model="nim_edit">
                            </div>
                            <!-- Email -->
                            <div class="form-group mb-2">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control @error('email_edit') is-invalid @enderror" wire:model="email_edit">
                            </div>
                            <!-- Tanggal Lahir -->
                            <div class="form-group mb-2">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tanggal_lahir_edit') is-invalid @enderror" wire:model="tanggal_lahir_edit">
                            </div>
                            <!-- Jenis Kelamin -->
                            <div class="form-group mb-2">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-control @error('jenis_kelamin_edit') is-invalid @enderror" wire:model="jenis_kelamin_edit">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <!-- Alamat -->
                            <div class="form-group mb-2">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control @error('alamat_edit') is-invalid @enderror" wire:model="alamat_edit"></textarea>
                            </div>
                            <!-- No. Telp -->
                            <div class="form-group mb-2">
                                <label class="form-label">No. Telp</label>
                                <input type="text" class="form-control @error('no_hp_edit') is-invalid @enderror" wire:model="no_hp_edit">
                            </div>
                            <!-- Agama -->
                            <div class="form-group mb-2">
                                <label class="form-label">Agama</label>
                                <select class="form-control @error('agama_edit') is-invalid @enderror" wire:model="agama_edit">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <!-- Judul Skripsi -->
                            <div class="form-group mb-2">
                                <label class="form-label">Judul Skripsi</label>
                                <textarea class="form-control @error('judul_skripsi_edit') is-invalid @enderror" wire:model="judul_skripsi_edit"></textarea>
                            </div>
                            <!-- IPK -->
                            <div class="form-group mb-2">
                                <label class="form-label">IPK</label>
                                <input type="number" step="0.01" class="form-control @error('ipk_edit') is-invalid @enderror" wire:model="ipk_edit">
                            </div>
                            <!-- Tahun Masuk -->
                            <div class="form-group mb-2">
                                <label class="form-label">Tahun Masuk</label>
                                <select class="form-control @error('tahun_masuk_edit') is-invalid @enderror" wire:model="tahun_masuk_edit">
                                    <option value="">Pilih Tahun Masuk</option>
                                    @for ($year = 2015; $year <= now()->year; $year++)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                </select>
                            </div>
                            <!-- Keterangan -->
                            <div class="form-group mb-2">
                                <label class="form-label">Status Saat Ini</label>
                                <select class="form-control @error('keterangan_edit') is-invalid @enderror" wire:model="keterangan_edit">
                                    <option value="">Pilih Keterangan</option>
                                    <option value="belum bekerja">Belum Bekerja</option>
                                    <option value="sudah bekerja">Sudah Bekerja</option>
                                    <option value="study lanjut">Study Lanjut</option>
                                </select>
                            </div>
                            <!-- Wisuda -->
                            <div class="form-group mb-2">
                                <label class="form-label">Wisuda</label>
                                <select class="form-control @error('wisuda_id') is-invalid @enderror" wire:model="wisuda_id">
                                    <option value="">Pilih Wisuda</option>
                                    @foreach($wisuda as $wisuda)
                                    <option value="{{ $wisuda->id }}">{{ $wisuda->angkatan }} - {{ $wisuda->tanggal }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-sm btn-custom mt-4 mb-4">Update Profil</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
                @else
                <div class="col-12 col-md-12 animate__animated animate__fadeInUp details-column">
                    <div class="row row-hover animated-delay px-4">
                        <form wire:submit.prevent="updatePassword">
                            @csrf

                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" wire:model="new_password" id="new_password" class="form-control">
                                @error('new_password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                <input type="password" wire:model="new_password_confirmation" id="new_password_confirmation" class="form-control">
                                @error('new_password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <button class="btn btn-sm btn-danger mt-4 mb-4" wire:click="cancelUpdatePassword">Batal</button>
                                <button type="submit" class="btn btn-sm btn-custom mt-4 mb-4">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @livewire('alert')
</div>
