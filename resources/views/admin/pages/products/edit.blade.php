@extends('adminlte::page')

@section('title', "Editar o Produto {$product->title}")

@section('content_header')
    <h1>Editar Produto</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Editar Produto - {{$product->title}} </h3>

            </div>

            <div class="card-body">
                <form action="{{route('products.update', $product->id)}}" method="POST" class="form" enctype="multipart/form-data">
                   @method('PUT')
                   @include('admin.pages.products._partials.form')
               </form>
            </div>

        </div>
    </div>
</div>


@stop

