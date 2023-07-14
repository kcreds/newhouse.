<!-- Sekcja Menu+Footer -->
@extends('layouts.app')

<!-- Wartości dla meta tagów -->
@section('meta_desc')
{!! $immovable->meta_desc !!}
@endsection
@section('meta_name')
{!! $immovable->meta_name !!}
@endsection
@section('metarobots')
{!! $immovable->metarobots !!}
@endsection

<!-- Główna sekcja -->
@section('content')

<!-- Kod własnego szablonu można umieścić między @section('content') a @endsection -->

@endsection


<!-- Opis zmiennych -->

<!-- 

    {{ asset('/folder/images/' .$immovable->main_photo}} - Głowne zdjęcie
    {{$immovable->name}} - Nazwa
    {{$immovable->short_desc}} - Krótki opis
    {{$immovable->price}} - Cena, sama liczba
    {{$immovable->extent}} - Rozmiar, sama liczba
    {{$immovable->address}} - Adres
    {{$immovable->long_desc}} - Długi opis
    {{asset('/folder/images/' . $immovable->first_photo)}} - Pierwsze zdjęcie
    {{$immovable->first_head}} - Pierwszy nagłówek
    {{$immovable->first_desc}} - Pierwszy opis
    {{asset('/folder/images/' . $immovable->second_photo)}} - Drugie zdjęcie
    {{$immovable->second_head}} - Drugi nagłówek
    {{$immovable->second_desc}} - Drugi opis
    {{$immovable->photo_gallery}} - Galeria zdjęć

 -->

<!-- Jeśli potrzebujesz wyświetlić nieprzetworzoną zawartość zmiennej przez html użyj {!!nazwa_zmiennej!!} -->

<!-- Powiększanie zdjęć -->

<!-- Jeśli chcesz umożliwić powiększenie zdjęcia możesz to zrobić tak (więcej na https://lokeshdhakar.com/projects/lightbox2/): -->

<a href="{{ asset('/folder/images/' . $immovable->main_photo) }}" data-lightbox="image">
    <img class="img-fluid mb-3 mb-lg-0 main-photo" src="{{ asset('/folder/images/' . $immovable->main_photo) }}"
        alt="Główne zdjęcie">
</a>


<!-- Przykład generowania galerii -->

        @foreach ($immovable->photo_gallery as $photo)
        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
            <a href="{{ asset('/folder/images/' . $photo) }}" data-lightbox="roadtrip" data-lightbox="image">
                <img src="{{ asset('/folder/images/' . $photo) }}" class="w-100 shadow-1-strong rounded mb-4"
                    alt="" /></a>
        </div>
        @endforeach

<!-- Wzór domyślnego szablonu znajduje się w resources\views\property.blade.php -->