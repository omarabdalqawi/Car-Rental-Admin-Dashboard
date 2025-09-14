@extends('layouts.master')
@section('title')
Product
@endsection
@section('content')
<main class="content">
    <div class="container my-5">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ trans('products.product') }}</h2>
        </div>
        <div class="pull-right">
            @can('product-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('products.create') }}"><i class="fa fa-plus"></i> {{ trans('products.Create') }}</a>
            @endcan
        </div>
    </div>
</div>

@session('success')
    <div class="alert alert-success" role="alert">
        {{ $value }}
    </div>
@endsession

<table class="table table-bordered">
    <tr>
        <th>{{ trans('products.No') }}</th>
        <th>{{ trans('products.Name') }}</th>
        <th>{{ trans('products.Details') }}</th>
        <th width="280px">{{ trans('products.Action') }}</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->detail }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}"><i class="fa-solid fa-list"></i> {{ trans('products.Show') }}</a>
                @can('product-edit')
                <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}"><i class="fa-solid fa-pen-to-square"></i> {{ trans('products.Edit') }}</a>
                @endcan

                @csrf
                @method('DELETE')

                @can('product-delete')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid ti-trash"></i> {{ trans('products.Delete') }}</button>
                @endcan
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $products->links() !!}
    </div>
</main>
@endsection
