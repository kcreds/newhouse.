@extends('layouts.admin_header')

@section('admin_content')
    @if ($errors->any())
        <div class="alert alert-validation col-lg-4 alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <br>
    @endif
    <div class="cont">
        <h1>Dodaj nieruchomość</h1>
        <hr>
        <form action="{{ route('immovables_insert') }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Nazwa</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="meta_name">Meta-Name</label>
                    <input type="text" class="form-control" id="meta_name" name="meta_name"
                        value="{{ old('meta_name') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="meta_desc">Meta-Desc</label>
                <input type="text" class="form-control" id="meta_desc" name="meta_desc" value="{{ old('meta_desc') }}">
            </div>
            <div class="form-group">
                <label for="meta_robots">Meta-Robots</label>
                <select name="metarobots" id="metarobots" class="form-select">
                    <option value="index, follow" selected>index, follow</option>
                    <option value="index, nofollow">index, nofollow</option>
                    <option value="noindex, follow">noindex, follow</option>
                    <option value="noindex, nofollow">noindex, nofollow</option>
                </select>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}"
                    required>
            </div>
            <div class="form-group">
                <label for="extent">Metraż</label>
                <input type="numeric" class="form-control" id="extent" name="extent" value="{{ old('extent') }}"
                    required>
            </div>
            <div class="form-group">
                <label for="price">Cena</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}"
                    required>
            </div>
            <div class="form-group">
                <label for="address">Adres</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}"
                    required>
            </div>
            <div class="form-group">
                <label for="short_desc">Krótki Opis</label>
                <textarea type="text" class="short_desc form-control" id="short_desc" name="short_desc"
                    value="{{ old('short_desc') }}">{{ old('short_desc') }}</textarea>
            </div>
            <div class="form-group">
                <label for="main_photo">Głowne Zdjęcie</label>
                <input type="file" class="form-control" id="main_photo" name="main_photo">
            </div>
            <div class="form-group">
                <label for="long_desc">Długi Opis</label>
                <textarea type="text" class="long_desc form-control" id="long_desc" name="long_desc" value="{{ old('long_desc') }}">{{ old('long_desc') }}</textarea>
            </div>
            <div class="form-group">
                <label for="first_head">Pierwszy Nagłowek</label>
                <input type="text" class="form-control" id="first_head" name="first_head"
                    value="{{ old('first_head') }}">
            </div>
            <div class="form-group">
                <label for="first_desc">Pierwszy Opis Krótki</label>
                <textarea type="text" class="short_desc form-control" id="first_desc" name="first_desc"
                    value="{{ old('first_desc') }}">{{ old('first_desc') }}</textarea>
            </div>
            <div class="form-group">
                <label for="first_photo">Pierwsze Zdjęcie</label>
                <input type="file" class="form-control" id="first_photo" name="first_photo">
            </div>
            <div class="form-group">
                <label for="second_head">Drugi Nagłowek</label>
                <input type="text" class="form-control" id="second_head" name="second_head"
                    value="{{ old('second_head') }}">
            </div>
            <div class="form-group">
                <label for="second_desc">Drugi Opis Krótki</label>
                <textarea type="text" class="short_desc form-control" id="second_desc" name="second_desc"
                    value="{{ old('second_desc') }}">{{ old('second_desc') }}</textarea>
            </div>
            <div class="form-group">
                <label for="second_photo">Drugie Zdjęcie</label>
                <input type="file" class="form-control" id="second_photo" name="second_photo">
            </div>
            <div class="form-group">
                <label for="photo_gallery">Galeria Zdjęć</label>
                <input type="file" class="form-control" id="photo_gallery" name="photo_gallery[]" multiple>
            </div>
            <hr>
            <input type="submit" class="btn btn-primary " value="Zapisz" />
        </form>
    </div>
@endsection
