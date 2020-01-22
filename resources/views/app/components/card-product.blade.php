<div class="card text-center">
    <img class="card-img-top" src="{{ $image ?? 'https://via.placeholder.com/240x200' }}"
         alt="Imagem do {{ $name ?? 'Product name' }}">
    <div class="card-body">
        <h5 class="card-title">{{ $name ?? 'Product name' }}</h5>
        <p class="card-text">
            <b>R${{ $price ?? '100,00' }}</b>

            @if($active ?? random_int(0,1))
                <i class="fas fa-check text-success"></i>
            @else
                <i class="fas fa-times text-danger"></i>
            @endif
        </p>
        <a href="" class="btn btn-dark rounded-pill">Add to Cart</a>
        <a href="{{ route('products.show', ['product' => $slug ?? 'product-name']) }}" class="stretched-link"></a>
    </div>
</div>
