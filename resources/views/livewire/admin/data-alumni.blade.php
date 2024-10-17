<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manajemen Alumni</li>
                </ol>
            </nav>
            <h2 class="h4">Manajemen Alumni</h2>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button class="btn btn-sm btn-gray-800 d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modalTambah" wire:click="resetInput()">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Alumni
            </button>
        </div>
    </div>

    <div class="table-settings mb-4">
        <div class="row align-items-center justify-content-between">
            <div class="col col-md-6 col-lg-3 col-xl-4">
                <div class="input-group me-2 me-lg-3 fmxw-400">
                    <span class="input-group-text">
                        <svg class="icon icon-xs" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <input wire:model.live="search" type="text" class="form-control" placeholder="Search...">
                </div>
            </div>
        </div>
    </div>

    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200" style="width: 5%">#</th>
                    <th class="border-gray-200">Foto</th>
                    <th class="border-gray-200">Nama / NIM</th>
                    <th class="border-gray-200">TL/JK/Agama</th>
                    <th class="border-gray-200">Alamat/Email/No. Telp</th>
                    <th class="border-gray-200">Judul Skripsi</th>
                    <th class="border-gray-200">IPK</th>
                    <th class="border-gray-200">Tahun Masuk</th>
                    <th class="border-gray-200">Wisuda </th>
                    <th class="border-gray-200">Prodi </th>
                    <th class="border-gray-200" style="width: 10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumni as $alumniItem)
                <tr>
                    <td>
                        <a href="#" class="fw-bold">
                            {{ ($loop->index) + (($alumni->currentPage() - 1) * $alumni->perPage()) + 1 }}
                        </a>
                    </td>
                    <td><span class="fw-normal">{{ $alumniItem->foto }}</span></td>
                    <td><span class="fw-normal">{{ $alumniItem->nama }} <br> {{ $alumniItem->nim }}</span> <br> <span class="badge bg-primary">{{ $alumniItem->keterangan }}</span></td>
                    <td><span class="fw-normal">{{ $alumniItem->tanggal_lahir }} <br> {{ $alumniItem->jenis_kelamin }} <br> {{ $alumniItem->agama }}</span></td>
                    <td><span class="fw-normal">{{ $alumniItem->alamat }} <br> {{ $alumniItem->no_hp }} <br> {{ $alumniItem->email }}</span></td>
                    <td><span class="fw-normal text-wrap">{{ $alumniItem->judul_skripsi }}</span></td>
                    <td><span class="fw-normal">{{ $alumniItem->ipk }}</span></td>
                    <td><span class="fw-normal">{{ $alumniItem->tahun_masuk }}</span></td>
                    <td><span class="fw-normal">{{ $alumniItem->wisuda->angkatan }} <br> {{ $alumniItem->wisuda->tanggal }}</span></td>
                    <td><span class="fw-normal">{{ $alumniItem->prodi->nama }}</span></td>
                    <td class="text-end">
                        <a href="#" class="btn btn-info btn-sm btn-rounded" wire:click.prevent="edit({{ $alumniItem->id }})" data-bs-toggle="modal" data-bs-target="#modalEdit">Edit</a>
                        <a href="#" wire:click.prevent="hapus({{ $alumniItem->id }})" class="btn btn-danger btn-sm btn-rounded">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-2">{{ $alumni->links() }}</div>
    </div>

    <!-- Modal Tambah -->
    <div wire:ignore.self class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Tambah Alumni</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    @csrf
                    <div class="modal-body">
                        <!-- Nama -->
                        <div class="form-group mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="nama">
                        </div>
                        <!-- NIM -->
                        <div class="form-group mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" wire:model="nim">
                        </div>
                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email">
                        </div>
                        <!-- Tanggal Lahir -->
                        <div class="form-group mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" wire:model="tanggal_lahir">
                        </div>
                        <!-- Jenis Kelamin -->
                        <div class="form-group mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" wire:model="jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <!-- Alamat -->
                        <div class="form-group mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" wire:model="alamat"></textarea>
                        </div>
                        <!-- No. Telp -->
                        <div class="form-group mb-3">
                            <label class="form-label">No. Telp</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" wire:model="no_hp">
                        </div>
                        <!-- Agama -->
                        <div class="form-group mb-3">
                            <label class="form-label">Agama</label>
                            <input type="text" class="form-control @error('agama') is-invalid @enderror" wire:model="agama">
                        </div>
                        <!-- Judul Skripsi -->
                        <div class="form-group mb-3">
                            <label class="form-label">Judul Skripsi</label>
                            <textarea class="form-control @error('judul_skripsi') is-invalid @enderror" wire:model="judul_skripsi"></textarea>
                        </div>
                        <!-- IPK -->
                        <div class="form-group mb-3">
                            <label class="form-label">IPK</label>
                            <input type="text" class="form-control @error('ipk') is-invalid @enderror" wire:model="ipk">
                        </div>
                        <!-- Tahun Masuk -->
                        <div class="form-group mb-3">
                            <label class="form-label">Tahun Masuk</label>
                            <input type="text" class="form-control @error('tahun_masuk') is-invalid @enderror" wire:model="tahun_masuk">
                        </div>
                        <!-- Keterangan -->
                        <div class="form-group mb-3">
                            <label class="form-label">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" wire:model="keterangan">
                        </div>
                        <!-- Wisuda -->
                        <div class="form-group mb-3">
                            <label class="form-label">Wisuda</label>
                            <select class="form-control @error('wisuda_id') is-invalid @enderror" wire:model="wisuda_id">
                                <option value="">Pilih Wisuda</option>
                                @foreach($wisuda as $wisuda)
                                    <option value="{{ $wisuda->id }}">{{ $wisuda->angkatan }} - {{ $wisuda->tanggal }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Prodi -->
                        <div class="form-group mb-3">
                            <label class="form-label">Prodi</label>
                            <select class="form-control @error('prodi_id') is-invalid @enderror" wire:model="prodi_id">
                                <option value="">Pilih Prodi</option>
                                @foreach($prodi as $prodi)
                                    <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" wire:click="simpan()" @if($modal) data-bs-dismiss="modal" @endif>Simpan</button>
                        <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div wire:ignore.self class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Update Alumni</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    @csrf
                    <div class="modal-body">
                        <!-- Nama -->
                        <div class="form-group mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="nama">
                        </div>
                        <!-- NIM -->
                        <div class="form-group mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" wire:model="nim">
                        </div>
                        <!-- Input lainnya -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" wire:click="update()" @if($modal) data-bs-dismiss="modal" @endif>Update</button>
                        <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @livewire('alert')
</div>
