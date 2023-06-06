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
  <h1>Edytuj nieruchomość</h1>
  <hr>
  <form action="{{ route('immovables_update',['id' => $immovable->id])}}" enctype="multipart/form-data" method="post">
    {{csrf_field()}}
    <div class="form-row">
      <div class="form-group">
        <label for="name">Nazwa</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$immovable->name}}" required>
      </div>
      <div class="form-group">
        <label for="meta_name">Meta-Name</label>
        <input type="text" class="form-control" id="meta_name" name="meta_name" value="{{$immovable->meta_name}}" >
      </div>
    </div>
    <div class="form-group">
      <label for="meta_desc">Meta-Desc</label>
      <input type="text" class="form-control" id="meta_desc" name="meta_desc" value="{{$immovable->meta_desc}}">
    </div>
    <div class="form-group">
      <label for="metarobots">Meta-Robots</label>
      <select name="metarobots" id="metarobots" class="form-select">
          <option value="index, follow" {{ $immovable->metarobots == 'index, follow' ? 'selected' : '' }}>index, follow</option>
          <option value="index, nofollow" {{ $immovable->metarobots == 'index, nofollow' ? 'selected' : '' }}>index, nofollow</option>
          <option value="noindex, follow" {{ $immovable->metarobots == 'noindex, follow' ? 'selected' : '' }}>noindex, follow</option>
          <option value="noindex, nofollow" {{ $immovable->metarobots == 'noindex, nofollow' ? 'selected' : '' }}>noindex, nofollow</option>
      </select>
  </div>
  
    <div class="form-group">
      <label for="slug">Slug</label>
      <input type="text" class="form-control" id="slug" name="slug" value="{{$immovable->slug}}" required>
    </div>
    <div class="form-group">
      <label for="price">Cena</label>
      <input type="text" class="form-control" id="price" name="price" value="{{$immovable->price}}" required>
    </div>
    <div class="form-group">
      <label for="extent">Metraż</label>
      <input type="text" class="form-control" id="extent" name="extent" value="{{$immovable->extent}}" required>
    </div>
    <div class="form-group">
      <label for="address">Adres</label>
      <input type="text" class="form-control" id="address" name="address" value="{{$immovable->address}}" required>
    </div>
    <div class="form-group">
      <label for="short_desc">Krótki Opis</label>
      <textarea type="text" class="short_desc form-control" id="short_desc" name="short_desc" value="{{$immovable->short_desc}}" >{!!$immovable->short_desc!!}</textarea>
    </div>
    <div class="form-group">
      @if ($immovable->main_photo)
      <label for="main_photo">Głowne Zdjęcie - wybrano</label>
      <input type="file" class="form-control" id="main_photo" name="main_photo" >
      <a href="{{asset('/folder/images/'.$immovable->main_photo)}}" data-lightbox="image">
      <img class="img-fluid mb-3 mt-2 mb-lg-0" src="{{asset('/folder/images/'.$immovable->main_photo)}}" width="100" height="100"></a>
      @else
      <label for="main_photo">Głowne Zdjęcie - brak aktualnego</label>
      <input type="file" class="form-control" id="main_photo" name="main_photo" >
      @endif
    </div>
    <div class="form-group">
      <label for="long_desc">Długi Opis</label>
      <textarea type="text" class="long_desc form-control" id="long_desc" name="long_desc" value="{{$immovable->long_desc}}" >{!!$immovable->long_desc!!}</textarea>
    </div>
    <div class="form-group">
      <label for="first_head">Pierwszy Nagłowek</label>
      <input type="text" class="form-control" id="first_head" name="first_head" value="{{$immovable->first_head}}" >
    </div>
    <div class="form-group">
      <label for="first_desc">Pierwszy Opis Krótki</label>
      <textarea type="text" class="first_desc form-control" id="first_desc" name="first_desc" value="{{$immovable->first_desc}}" >{!!$immovable->first_desc!!}</textarea>
    </div>
    <div class="form-group">
    @if ($immovable->first_photo)
      <label for="first_photo">Pierwsze Zdjęcie - wybrano</label>
      <input type="file" class="form-control" id="first_photo" name="first_photo">
      <a href="{{asset('/folder/images/'.$immovable->first_photo)}}" data-lightbox="image">
      <img class="img-fluid mb-3 mt-2 mb-lg-0" src="{{asset('/folder/images/'.$immovable->first_photo)}}" width="100" height="100"></a>
      @else
      <label for="first_photo">Drugie Zdjęcie - brak aktualnego</label>
      <input type="file" class="form-control" id="first_photo" name="first_photo" >
      @endif
    </div>
    <div class="form-group">
      <label for="second_head">Drugi Nagłowek</label>
      <input type="text" class="form-control" id="second_head" name="second_head" value="{{$immovable->second_head}}" >
    </div>
    <div class="form-group">
      <label for="second_desc">Drugi Opis Krótki</label>
      <textarea type="text" class="second_desc form-control" id="second_desc" name="second_desc" value="{{$immovable->second_desc}}" >{!!$immovable->second_desc!!}</textarea>
    </div>
    <div class="form-group">
    @if ($immovable->second_photo)
      <label for="second_photo">Pierwsze Zdjęcie - wybrano</label>
      <input type="file" class="form-control" id="second_photo" name="second_photo" >
      <a href="{{asset('/folder/images/'.$immovable->second_photo)}}" data-lightbox="image">
      <img class="img-fluid mb-3 mt-2 mb-lg-0" src="{{asset('/folder/images/'.$immovable->second_photo)}}" width="100" height="100"></a>
      @else
      <label for="second_photo">Drugie Zdjęcie - brak aktualnego</label>
      <input type="file" class="form-control" id="second_photo" name="second_photo" >
      @endif
    </div>
    <hr>
    <button type="submit" class="btn btn-primary ">Nadpisz</button>
  </form>
</div>
@endsection