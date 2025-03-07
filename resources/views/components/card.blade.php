<div class="card" style="width: 18rem;">
    <img src="https://picsum.photos/200/200" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title text-center">{{ $article->title }}</h5>
        <p class="card-text text-truncate">{{ $article->description }}</p>
        <div class="d-flex justify-content-center">
            <a href="{{ $route }}" class="{{ $class }}">{{ $btnText }}</a>
        </div>
    </div>
</div>
