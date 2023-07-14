@extends('layouts.app')

@section('content')

    <!-- Masthead-->
    <header class="masthead">
        <div id="startchange" class="container maintext px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center ">
                    <p class="h1 mx-auto my-0 " id="typed-text"></p>
                    <p class="h2 text-white-50 mx-auto mt-3 mb-5 animate-element ">Znajdź wymarzony dom lub mieszkanie w każdym miejscu na
                        swiecie!</p>
                    <a class="btn btn-primary  animate-element" href="#about">Chcę dowiedzieć się więcej!</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="about-section text-center" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 animate-element">
                    <h2 class="text-white mb-4 ">Profejonalizm i zafuanie</h2>
                    <p class="text-white-50 ">
                        Oferujemy domy i mieszkania na całym świecie.
                        Nasza firma to lider w sprzedaży nieruchomości, zapewniając naszym klientom wyjątkowe i dostosowane
                        do ich potrzeb rozwiązania.
                        Dzięki naszemu doświadczeniu i globalnej sieci partnerów, pomagamy znaleźć idealne miejsce do
                        zamieszkania, niezależnie od lokalizacji.
                        Odkryj z nami swój wymarzony dom lub mieszkanie i zaczynaj nowy rozdział w życiu.
                    </p>
                    <a class="btn btn-primary mb-5 animate-element" href="{{ route('search') }}">Jestem zainteresowany!</a>
                </div>
            </div>
            <img class="img-fluid w-75" src="assets/img/rectangle.png" alt="..." />
        </div>
    </section>
    <!-- Projects-->
    <section class="projects-section bg-light" id="projects">
        <div class="container px-4 px-lg-5">
            <!-- Featured Project Row-->
            <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0 animate-element" src="assets/img/key.png"
                        alt="..." /></div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left animate-element">
                        <h4>Twoje szczęśći, nasza praca</h4>
                        <p class="text-black-50 mb-0">Nasze najwyższe zaangażowanie to zapewnienie Ci pełnej satysfakcji.
                            Dążymy do realizacji Twoich marzeń i celów, gwarantując doskonałą jakość usług. Dążymy do
                            zapewnienia najwyższej jakości usług, dbając o każdy detal i spełniając Twoje oczekiwania. Twoje
                            zadowolenie jest naszą nagrodą, a widok Twojego uśmiechu jest naszym największym osiągnięciem.
                            Wierzymy, że współpraca z nami to klucz do spełnienia Twoich marzeń i przekroczenia oczekiwań.
                            Zaufaj nam, a przekonasz się, że Twoje szczęście jest naszą najważniejszą misją./p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup-->
@endsection
