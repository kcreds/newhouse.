<div>
    <div class="container">
        <div class="search-group">
            <input wire:model="search" type="search" name="query" id="search" class="query form-control rounded "
                placeholder="Szukaj" aria-label="Search" aria-describedby="search-addon" />
        </div>
    </div>

    <div class="container">
        @foreach ($results as $result)
            <article wire:key="{{ $result->id }}" class="postcard light blue ms-1 item" x-data="{ isActive: false }" x-init="setTimeout(() => isActive = true, 100)">
                <a class="postcard__img_link" href="/nieruchomosc/{{ $result->slug }}">
                    <img class="postcard__img" src="{{ asset('/folder/images/' . $result->main_photo) }}" alt="">
                </a>
                <div class="postcard__text t-dark">
                    <h1 class="postcard__title blue"><a href="/nieruchomosc/{{ $result->slug }}">{{ $result->name }}</a>
                    </h1>
                    <div class="postcard__subtitle small">
                        <i class="fas fa-location-dot me-2"></i>{{ $result->address }}
                    </div>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">{!! $result->short_desc !!}</div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-money-bill-wave me-2"></i><span
                                class="price">{{ $result->price }} $</span></li>
                        <li class="tag__item"><i class="fas fa-solid fa-maximize me-2"></i><span
                                class="extent">{{ $result->extent }} m²</span></i></li>
                    </ul>
                </div>
            </article>
        @endforeach
    </div>
</div>
