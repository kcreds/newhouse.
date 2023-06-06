@extends('layouts.app')
@section('content')
<div class="container card-list-head">
    <h3 class="mb-3">Sprawdź co dla Ciebie przygotowaliśmy</h3>
    <p>Wystarczy, że wpiszesz dowolne miejsce na świecie a my wyświetlimy dla Ciebie nasze oferty!</p>
</div>
@livewire('search-field')

@endsection
