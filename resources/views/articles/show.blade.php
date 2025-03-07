<x-layout>

    <x-header />

    <div class="container">
        <div class="row rounded border shadow">
            <div class="col-12 col-md-6">
                <x-carousel />
            </div>
            <div class="col-12 col-md-6 wrap-custom ">
                <div class="row right-part-custom">
                    <div class="col-12 ">
                        <h2 class="text-center mt-2">{{ $article->title }}</h2>
                        <p class="mt-4 ms-2 text-secondary show-description-custom">{{ $article->description }}</p>
                    </div>
                    <div class="col-12 d-flex justify-content-end my-2">
                        <p class="me-5 price-custom text-secondary">€ {{ $article->price }}</p>
                    </div>
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <a href="{{route('index.articles')}}" class="btn btn-primary me-4">Torna Indietro</a>
                        <a href="" class="btn btn-primary ms-4">Compra</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-layout>
