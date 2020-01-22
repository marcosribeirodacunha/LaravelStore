@extends('layouts.app')

@section('content')
    {{-- Product details--}}
    <div class="container my-5">
        <div class="row">

            {{-- Images preview --}}
            <div class="col-md-5" id="image-previewer">
                <div class="tab-content image-previewer-content">
                    <div class="tab-pane fade show active" id="image-1" role="tabpanel"
                         aria-labelledby="image-1-tab">
                        <img src="https://via.placeholder.com/240x200">
                    </div>
                    @for($i = 2; $i <= 5; $i++)
                        <div class="tab-pane fade" id="image-{{ $i }}" role="tabpanel"
                             aria-labelledby="image-{{ $i }}-tab">
                            <img src="https://via.placeholder.com/240x200" alt="">
                        </div>
                    @endfor
                </div>

                <ul class="nav nav-pills mb-3 justify-content-center image-previewer-tab" role="tablist">
                    <li class="nav-item tab-control">
                        <a class="nav-link" href="#">
                            <i class="fas fa-angle-left"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="image-1-tab" data-toggle="pill" href="#image-1" role="tab"
                           aria-controls="image-1" aria-selected="true">
                            <img src="https://via.placeholder.com/240x200" alt="">
                        </a>
                    </li>
                    @for($i = 2; $i <= 5; $i++)
                        <li class="nav-item">
                            <a class="nav-link" id="image-{{ $i }}-tab" data-toggle="pill" href="#image-{{ $i }}"
                               role="tab"
                               aria-controls="image-{{ $i }}" aria-selected="false">
                                <img src="https://via.placeholder.com/240x200" alt="">
                            </a>
                        </li>
                    @endfor
                    <li class="nav-item tab-control">
                        <a class="nav-link" href="#">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Product informations --}}
            <div class="col-md-6 offset-1 px-4" id="product-info">
                <h1>{{ $product->name }}</h1>

                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>
                </div>

                <h4 class="price">R${{ str_replace('.', ',', $product->price) }}</h4>

                <hr>

                <p>{{ $product->description ?? 'No description' }}</p>

                <div class="buttons">
                    <a href="" class="btn btn-dark">Add to cart</a>
                    <a class="btn btn-favorite">
                        <i class="far fa-heart"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Related products (same category) --}}
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="custom-title">Related products</h2>
        </div>
        <div class="row">
            <div id="relatedProductsCarousel" class="carousel slide products-carousel" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#relatedProductsCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#relatedProductsCarousel" data-slide-to="1"></li>
                    <li data-target="#relatedProductsCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item carousel-item active">
                        <div class="row">
                            <div class="col-md-3">
                                @include('app.components.card-product')
                            </div>
                            <div class="col-md-3">
                                @include('app.components.card-product')
                            </div>
                            <div class="col-md-3">
                                @include('app.components.card-product')
                            </div>
                            <div class="col-md-3">
                                @include('app.components.card-product')
                            </div>
                        </div>
                    </div>
                    <div class="item carousel-item">
                        <div class="row">
                            <div class="col-md-3">
                                @include('app.components.card-product')
                            </div>
                            <div class="col-md-3">
                                @include('app.components.card-product')
                            </div>
                            <div class="col-md-3">
                                @include('app.components.card-product')
                            </div>
                            <div class="col-md-3">
                                @include('app.components.card-product')
                            </div>
                        </div>
                    </div>
                    <div class="item carousel-item">
                        <div class="row">
                            <div class="col-md-3">
                                @include('app.components.card-product')
                            </div>
                            <div class="col-md-3">
                                @include('app.components.card-product')
                            </div>
                            <div class="col-md-3">
                                @include('app.components.card-product')
                            </div>
                            <div class="col-md-3">
                                @include('app.components.card-product')
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control left carousel-control-prev" href="#relatedProductsCarousel" role="button"
                   data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control right carousel-control-next" href="#relatedProductsCarousel" role="button"
                   data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
@endsection
