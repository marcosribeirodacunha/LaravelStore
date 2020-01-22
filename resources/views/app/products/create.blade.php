@extends('layouts.app')

@section('content')

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <h2 class="custom-title">Create new product</h2>
            </div>

            @if(count($errors) > 0)
                <div class="col-md-10 text-center">
                    <div class="alert alert-info">
                        <h4>Errors:</h4>

                        @foreach($errors->all() as $error)
                            <P>{{ $error }}</P>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="col-md-10">
                @isset($product)
                    <form action="{{ route('products.update', $product->id) }}" method="post">
                        @method('PUT')
                @else
                    <form action="{{ route('products.store')}}" method="post">
                @endisset

                    {{-- CSRF token --}}
                    @csrf

                    {{-- Name --}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" {{--required--}}
                               value="{{ $product ?? old('name') }}">
                    </div>

                    <div class="form-row">

                        {{-- Category --}}
                        <div class="form-group col-md-4">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control" {{--required--}}>
                                <option value="">Category</option>

                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        {{-- Price --}}
                        <div class="form-group col-md-4">
                            <label for="price">Price (R$)</label>
                            <input type="number"
                                   class="form-control"
                                   name="price"
                                   id="price"
                                   placeholder="100,00"
                                   min="0"
                                   step="0.01"
                                   {{--required--}}
                                   value="{{ $product ?? old('price') }}">
                        </div>

                        {{-- Units in stock --}}
                        <div class="form-group col-md-4">
                            <label for="units_in_stock">Units in stock</label>
                            <input type="number"
                                   class="form-control"
                                   name="units_in_stock"
                                   id="units_in_stock"
                                   placeholder="Units in stock"
                                   min="0"
                                   {{--required--}}
                                   value="{{ $product ?? old('units_in_stock') }}">
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea
                            class="form-control"
                            name="description"
                            id="description"
                            rows="10">{{ $product ?? old('description') }}</textarea>
                    </div>

                    {{-- Active --}}
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                name="active"
                                id="active"
                                value="1"
                                {{ ($product->active ?? '') ? 'checked' : '' }}>

                            <label class="custom-control-label" for="active">Active* (This only will be able to check
                                if there is at least one unit in stock)</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark">Create</button>
                </form>
            </div>
        </div>
    </div>

@endsection
