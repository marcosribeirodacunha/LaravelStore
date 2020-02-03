@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">PRODUCTS</h1>

        <a href="{{ route('admin.products.create') }}" class="btn btn-dark">
            <i class="fas fa-plus"></i>
            <span class="ml-2">ADD PRODUCT</span>
        </a>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Active</th>
                <th scope="col">Name</th>
                <th scope="col">Price (R$)</th>
                <th scope="col">Category</th>
                <th scope="col">Stock</th>
                <th scope="col">Updated at</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row" >
                        @if($product->active)
                            <i class="fas fa-dot-circle text-success"></i>
                        @else
                            @if($product->units_in_stock == 0)
                                <i class="fas fa-dot-circle text-danger"></i>
                            @else
                                <i class="fas fa-dot-circle text-warning"></i>
                            @endif
                        @endif
                    </th>
                    <td id="product_name">{{ $product->name }}</td>
                    <td id="product_price">{{ str_replace('.', ',', $product->price) }}</td>
                    <td id="product_category">{{ $product->category->name }}</td>
                    <td id="product_stock">{{ $product->units_in_stock }}</td>
                    <td id="product_update">{{ $product->updated_at->format('d/m/Y') }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.products.show', $product->slug) }}"
                           class="btn btn-primary btn-sm">
                            <i class="fas fa-info"></i>
                        </a>
                        <a href="{{ route('admin.products.edit', $product->slug) }}"
                           class="btn btn-success btn-sm">
                            <i class="fas fa-pen"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#deleteModal">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row justify-content-center my-4">
        {{ $products->links() }}
    </div>

    <div class="d-flex flex-column">
        <h6>Caption:</h6>
        <small>
            <i class="fas fa-dot-circle text-success"></i>: With stock and active
        </small>
        <small>
            <i class="fas fa-dot-circle text-warning"></i>: With stock but does not active
        </small>
        <small>
            <i class="fas fa-dot-circle text-danger"></i>: Without stock or does not active
        </small>
    </div>
@endsection

@section('modal')
    <!-- Delete modal -->
    @component('admin.components.delete-modal')
        @slot('target')
            deleteModal
        @endslot

        @slot('title')
            <span id="delete_title"></span>
            {{--Oh, sorry! We have a little problem.--}}
        @endslot

        @slot('content')
            <span id="delete_content"></span>
            {{--<p>I still do not know how to make modals dynamically show content based on the product
                user wants to delete. So, please, if you want to delete any product, go to the details page (i)
                and do it there. I hope, soon I can do this work.</p>
            <small><i>P.S.: if you're reading this, please feel free to help me to do it, all kind
                of help is welcome.</i></small>--}}
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $("a['data-target=#deleteModal']").alert("HI")
    </script>
@endpush
