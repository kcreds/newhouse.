<div>
    @if (!$data)
        <h3>Brak wiadomości</h3>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <h3>Wiadomości</h3>
                <hr class="h-3">
            </tr>
        </thead>
        <tbody>
            @if (count($data) > 0)
                @foreach ($data as $item)
                    <tr>
                        <td class="link" type="button" data-bs-toggle="collapse" data-bs-target="#id-{{ $item->id }}"
                            aria-expanded="false" aria-controls="collapseExample">
                            <p class="mail">
                                Email: <span class="mailLink">{{ $item->email }}</span>
                            </p>
                            <div class="mb-3">Status:
                                @if ($item->isread == false)
                                    <span class="newmessage">Nowa</span>
                                @else
                                    <span class="readmessage">Przeczytana</span>
                                @endif

                            </div>
                            <div class="collapse" id="id-{{ $item->id }}">
                                <span class="message">Wiadomość</span>
                                <div class="card text-break card-body">
                                    {{ $item->message }}
                                </div>
                                <button type="button" class="btn btn-primary mt-3"
                                    onclick="location.href='mailto:{{ $item->email }}'">Odpowiedz</button>
                                <button type="button" class="btn btn-primary mt-3"
                                    wire:click="toggleReadStatus({{ $item->id }})">
                                    @if ($item->isread)
                                        Oznacz jako nieprzeczytaną
                                    @else
                                        Oznacz jako przeczytaną
                                    @endif
                                </button>
                                @if ($item->immovables)
                                    <button type="button" class="btn btn-primary mt-3"
                                        onclick="window.open('/nieruchomosc/{{ $item->immovablesSlug }}', '_blank')">Przejdź
                                        do oferty</button>
                                @endif
                                <button type="button" wire:click="deleteTidings({{ $item->id }})"
                                    class="btn btn-danger mt-3"
                                    onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</button>

                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <p>Brak nowych wiadomości</p>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $data->links() }}
</div>
