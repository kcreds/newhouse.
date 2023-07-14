@extends('layouts.app')
@section('meta_desc')
    {!! $immovable->meta_desc !!}
@endsection
@section('meta_name')
    {!! $immovable->meta_name !!}
@endsection
@section('metarobots')
    {!! $immovable->metarobots !!}
@endsection
@section('content')
        <section class="projects-section bg-light" id="projects">
            <div class="container px-4 px-lg-5">
                <!-- Featured Project Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><a href="{{ asset('/folder/images/' . $immovable->main_photo) }}"
                            data-lightbox="image"><img class="img-fluid mb-3 mb-lg-0 main-photo"
                                src="{{ asset('/folder/images/' . $immovable->main_photo) }}" alt="Główne zdjęcie"></a></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-lg-left">
                            <h1 class="text-break  text-limit">{!! $immovable->name !!}</h1>
                            <p id="text-limit" class="text-break text-limit text-black-50 mb-0">{!! $immovable->short_desc !!}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-2 mb-5 fas-elemnts">
                    <i class="fas fa-money-bill-wave me-3"></i><span class="price me-5">{!! $immovable->price !!} $</span>
                    <i class="fas fa-solid fa-maximize me-3"></i><span class="extent me-5">{!! $immovable->extent !!}
                        m²</span><br>
                    <i class="fas fa-location-dot mt-3 me-3"></i><span class="extent me-5">{!! $immovable->address !!}</span>
                </div>

                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <p class="text-black-50 mb-5">{!! $immovable->long_desc !!}</p>
                </div>
                <!-- Project One Row-->
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><a href="{{ asset('/folder/images/' . $immovable->first_photo) }}"
                            data-lightbox="image"><img class="img-fluid"
                                src="{{ asset('/folder/images/' . $immovable->first_photo) }}" alt="..." /></a></div>
                    <div class="col-lg-6">
                        <div class="bg-black h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-lg-left">
                                    <h4 class="text-break text-center text-white">{!! $immovable->first_head !!}</h4>
                                    <p id="desc-limit" class="text-break mb-0 text-white-50">{!! $immovable->first_desc !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project Two Row-->
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><a href="{{ asset('/folder/images/' . $immovable->second_photo) }}"
                            data-lightbox="image"><img class="img-fluid"
                                src="{{ asset('/folder/images/' . $immovable->second_photo) }}" alt="..." /></a></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black  h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-lg-right">
                                    <h4 class="text-break text-center text-white">{!! $immovable->second_head !!}</h4>
                                    <p id="desc-limit2" class="text-break mb-0 text-white-50">{!! $immovable->second_desc !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (!empty($immovable->photo_gallery))
                <div class="container px-4 mt-5 px-lg-5">
                    <h2 class="text-break featured-text mt-5 mb-5 text-center">Galeria</h2>

                    <!-- Gallery -->
                    <div class="row">
                        @foreach ($immovable->photo_gallery as $photo)
                            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                <a href="{{ asset('/folder/images/' . $photo) }}" data-lightbox="roadtrip"
                                    data-lightbox="image">
                                    <img src="{{ asset('/folder/images/' . $photo) }}"
                                        class="w-100 shadow-1-strong rounded mb-4" alt="" /></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </section>

@endsection
