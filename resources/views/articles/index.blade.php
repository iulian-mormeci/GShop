<x-layout>

   <x-header/>

    <hr>

    <div class="container">
        <div class="row justify-content-center border shadow rounded min-vh-80">
            @foreach ($articles as $article)
                <div class="col-12 col-md-4 my-3 d-flex justify-content-center align-items-center">
                    <x-card :article="$article" btnText="Dettaglio" class="btn btn-primary"
                        route="{{ route('show.article', ['article' => $article]) }}" />
                </div>
            @endforeach
        </div>
    </div>



</x-layout>
