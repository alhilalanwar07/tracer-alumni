<div>
    <div class="register-container">
        <div class="login-card">
            <div class="login-logo">
                <img src="{{ url('/') }}/simpatik.png" alt="Logo">
            </div>
            <h2>Silahkan Register</h2>
            <form class="login-form mb-2" wire:submit.prevent="registerAlumni()">
                @csrf
                <div class="row">
                    <div class="col-6 col-md-12">
                        <input wire:model="nama" type="text" class="@error('nama') is-invalid @enderror" placeholder="Masukkan Nama"  autocomplete="nama" autofocus>
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <input wire:model="nim" type="text" class="@error('nim') is-invalid @enderror" placeholder="Masukkan NIM" autocomplete="nim">
                        @error('nim')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <input wire:model="email" class="@error('email') is-invalid @enderror" placeholder="Masukkan Email" autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <input wire:model="password" type="password" class="@error('password') is-invalid @enderror" placeholder="Masukkan Password"  autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="col-6 col-md-12">
                        <select wire:model="prodi" class="@error('prodi') is-invalid @enderror">
                            <option value="">-- Pilih Program Studi --</option>
                            @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>
                            @endforeach
                        </select>
                        @error('prodi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <select wire:model="tahun_masuk" id="tahun_masuk" class="@error('tahun_masuk') is-invalid @enderror" name="tahun_masuk">
                            <option value="">-- Pilih Tahun Masuk --</option>
                            @for ($year = 2015; $year <= now()->year; $year++)
                                <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                        </select>
                        @error('tahun_masuk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <select wire:model="angkatan" id="angkatan" class="@error('angkatan') is-invalid @enderror" name="angkatan">
                            <option value="">-- Periode Kelulusan --</option>
                            @foreach($angkatans as $angkatan)
                            <option value="{{ $angkatan->id }}">Angkatan {{ $angkatan->angkatan }} [{{ $angkatan->tanggal }}]</option>
                            @endforeach
                        </select>
                        @error('angkatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <select wire:model="keterangan" id="keterangan" class="@error('keterangan') is-invalid @enderror" name="keterangan">
                            <option value="">-- Pilih Status Pekerjaan --</option>
                            <option value="belum bekerja" {{ old('keterangan') == 'belum bekerja' ? 'selected' : '' }}>Belum Bekerja</option>
                            <option value="sudah bekerja" {{ old('keterangan') == 'sudah bekerja' ? 'selected' : '' }}>Sudah Bekerja</option>
                            <option value="study lanjut" {{ old('keterangan') == 'study lanjut' ? 'selected' : '' }}>Study Lanjut</option>
                        </select>
                        @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="login-button mb-2">Register</button>
            </form>
            <br>
            <p class="mt-2">Sudah Punya Akun? <a href="{{ route('login') }}">Login</a></p>

        </div>

    </div>
    @livewire('alert')
</div>
