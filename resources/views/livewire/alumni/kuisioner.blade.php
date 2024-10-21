<div>
    <div class="card card-custom mb-4 animate__animated animate__fadeInLeft">
        <div class="card-body table-responsive m-4">
            <form wire:submit.prevent="submit">
                @foreach($kuisioners as $question)
                    <div class="mb-3">
                        <label class="form-label"> {{ number_format($loop->iteration) }}. {{ $question->pertanyaan }}</label>
                        <div class="ms-3">
                            @if($question->tipe_pertanyaan == 'text')
                                <input type="text" class="form-control" wire:model.defer="answers.{{ $question->id }}">
                            @elseif($question->tipe_pertanyaan == 'multiple_choice')
                                @foreach(explode(',', $question->pilihan_jawaban) as $option)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" wire:model.defer="answers.{{ $question->id }}" value="{{ $option }}">
                                        <label class="form-check-label">{{ $option }}</label>
                                    </div>
                                @endforeach
                            @elseif($question->tipe_pertanyaan == 'checkbox')
                                @foreach(explode(',', $question->pilihan_jawaban) as $option)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" wire:model.defer="answers.{{ $question->id }}.{{ $loop->index }}" value="{{ $option }}">
                                        <label class="form-check-label">{{ $option }}</label>
                                    </div>
                                @endforeach
                            @elseif($question->tipe_pertanyaan == 'dropdown')
                                <select class="form-select" wire:model.defer="answers.{{ $question->id }}">
                                    <option value="">-- Pilih Jawaban --</option>
                                    @foreach(explode(',', $question->pilihan_jawaban) as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>
    </div>
    @livewire('alert')
</div>
