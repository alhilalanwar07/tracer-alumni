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
                    <li class="breadcrumb-item active" aria-current="page">Kuisioner Belum Bekerja</li>
                </ol>
            </nav>
            <h2 class="h4">Kuisioner Belum Bekerja</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <form wire:submit.prevent="saveKuisioner">
                        <div class="form-group mb-3">
                            <label class="form-label">Pertanyaan:</label>
                            <textarea class="form-control @error('pertanyaan') is-invalid @enderror" wire:model="pertanyaan" required></textarea>
                            @error('pertanyaan') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Tipe Pertanyaan:</label>
                            <select class="form-control @error('tipe_pertanyaan') is-invalid @enderror" wire:model.live="tipe_pertanyaan">
                                <option value="text">Text</option>
                                <option value="multiple_choice">Multiple Choice</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="dropdown">Dropdown</option>
                            </select>
                            @error('tipe_pertanyaan') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        @if(in_array($tipe_pertanyaan, ['multiple_choice', 'checkbox', 'dropdown']))
                        <div class="form-group mb-3">
                            <label class="form-label">Pilihan Jawaban:</label>
                            <textarea class="form-control @error('pilihan_jawaban') is-invalid @enderror" wire:model="pilihan_jawaban"></textarea>
                            @error('pilihan_jawaban') <span class="error">{{ $message }}</span> @enderror
                            <small class="form-text text-muted">Pisahkan setiap pilihan dengan koma (,)</small>
                        </div>
                        @endif

                        <button type="submit" class="btn btn-primary">Simpan Kuisioner</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h5 class="card-title">Daftar Kuisioner</h5>
                </div>
                <div class="card-body">
                    <div class="table-wrapper table-responsive">
                        <ul class="list-group p-0">
                            @foreach($kuisioners as $kuisioner)
                            <li class="list-group-item border-bottom p-0 d-flex justify-content-between align-items-center mb-2">
                                <div class="row w-100">
                                    <div class="col-md-1">
                                        <span class="badge bg-primary me-2">{{ $loop->iteration }}</span>
                                    </div>
                                    <div class="col-md-8">
                                        {{ $kuisioner->pertanyaan }}
                                    </div>
                                    <div class="col-md-3 text-end mb-1">
                                        <button class="btn btn-info btn-sm" wire:click="edit({{ $kuisioner->id }})">
                                            <svg class="icon icon-xs" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.29289 3.70711L1 11V15H5L12.2929 7.70711L8.29289 3.70711Z" fill="#ffffff"></path>
                                                <path d="M9.70711 2.29289L13.7071 6.29289L15.1716 4.82843C15.702 4.29799 16 3.57857 16 2.82843C16 1.26633 14.7337 0 13.1716 0C12.4214 0 11.702 0.297995 11.1716 0.828428L9.70711 2.29289Z" fill="#ffffff"></path>
                                            </svg>
                                        </button>
                                        <button class="btn btn-danger btn-sm" wire:click="delete({{ $kuisioner->id }})">
                                            <svg class="icon icon-xs" viewBox="0 0 16.000001 16.000001" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" stroke="#ffffff">
                                                <g transform="matrix(.7 0 0 .7 .6 -6.7)" style="display:inline">
                                                    <path transform="translate(-.857 9.571) scale(1.42857)" d="M3 6v8c0 .554.446 1 1 1h8c.554 0 1-.446 1-1V6z" style="fill:#ffffff;stroke:none;"></path>
                                                    <path transform="translate(-.857 9.571) scale(1.42857)" d="M5 1v2H2v2h12V3h-3V1zm1 1h4v1H6z" style="fill:#ffffff;stroke:none;"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                                <div class="d-flex justify-content-center mt-3"></div>
                                    {{ $kuisioners->links() }}
                                </div>
                        </ul>
                        @livewire('alert')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
