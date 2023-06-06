@extends('layouts.admin_header')

@section('admin_content')
    <div class=" container main-cont">
        <div class="row">
        <p class="welcome">Witaj, <b>{{ Auth::user()->name }}</b></p>
        <p class="mb-5 clock">Dziś mamy: <span id="clock" class="clock"></span></p>
        </div>
        <div class="row">
            @livewire('tidings-list')
        </div>
    </div>
@endsection
