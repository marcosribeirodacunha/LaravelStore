@extends('layouts.app')

@section('content')
    <div id="topDealsCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
        <ol class="carousel-indicators">
            <li data-target="#topDealsCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#topDealsCarousel" data-slide-to="1"></li>
            <li data-target="#topDealsCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://via.placeholder.com/1400x500" alt="Primeiro Slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://via.placeholder.com/1400x500" alt="Segundo Slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://via.placeholder.com/1400x500" alt="Terceiro Slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#topDealsCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#topDealsCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    {{---------------------------------------------------------------------------------------------}}
    {{-- New Arrival Carousel --}}
    <div class="container mt-4">
        <div class="row justify-content-center">
            <h2 class="custom-title">New Arrival</h2>
        </div>
        <div class="row">
            <div id="newArrivalCarousel" class="carousel slide products-carousel" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#newArrivalCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#newArrivalCarousel" data-slide-to="1"></li>
                    <li data-target="#newArrivalCarousel" data-slide-to="2"></li>
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
                <a class="carousel-control left carousel-control-prev" href="#newArrivalCarousel" role="button"
                   data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control right carousel-control-next" href="#newArrivalCarousel" role="button"
                   data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    {{---------------------------------------------------------------------------------------------}}
    {{-- Parallax --}}
    <div class="parallax">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-10 offset-1">
                    <h2 class="custom-title">Improve your {something}</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis
                        ac neque. Duis vulputate. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis
                        ac neque. Duis vulputate.</p>
                    <a href="" class="btn btn-outline-dark">Button</a>
                </div>
            </div>
        </div>
    </div>

    {{---------------------------------------------------------------------------------------------}}
    {{-- Most rated --}}
    <div class="container mt-4">
        <div class="row justify-content-center">
            <h2 class="custom-title">Most rated</h2>
        </div>
        <div class="row">
            <div id="mostRatedCarousel" class="carousel slide products-carousel" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#mostRatedCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#mostRatedCarousel" data-slide-to="1"></li>
                    <li data-target="#mostRatedCarousel" data-slide-to="2"></li>
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
                <a class="carousel-control left carousel-control-prev" href="#mostRatedCarousel" role="button"
                   data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control right carousel-control-next" href="#mostRatedCarousel" role="button"
                   data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    {{---------------------------------------------------------------------------------------------}}
    {{-- Advantages --}}
    <div id="advantages">
        <div class="container">
            <div class="row justify-content-center">
                <h2 class="custom-title">With us you'll have everything you want!</h2>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <i class="fas fa-shipping-fast"></i>
                    <h4>Fast shipping</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel convallis nisi. Nunc neque
                        justo, posuere eu sapien vitae, congue iaculis justo. Cras efficitur vestibulum justo, quis
                        consequat dolor gravida ut. </p>
                </div>
                <div class="col-md-4">
                    <i class="far fa-credit-card"></i>
                    <h4>All kinds of payment!</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel convallis nisi. Nunc neque
                        justo, posuere eu sapien vitae, congue iaculis justo. Cras efficitur vestibulum justo, quis
                        consequat dolor gravida ut. </p>
                </div>
                <div class="col-md-4">
                    <i class="far fa-clock"></i>
                    <h4>Everytime, anywhere</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel convallis nisi. Nunc neque
                        justo, posuere eu sapien vitae, congue iaculis justo. Cras efficitur vestibulum justo, quis
                        consequat dolor gravida ut. </p>
                </div>
            </div>
        </div>
    </div>
@endsection

