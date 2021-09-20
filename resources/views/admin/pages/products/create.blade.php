@extends('adminlte::page')

@section('title', 'Produto')

@section('content_header')
    <h1>Adicionar Produto</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Cadastro de Produto</h3>

            </div>

            <div class="card-body">
                <form action="{{route('products.store')}}" method="POST" class="form" enctype="multipart/form-data">
                   @include('admin.pages.products._partials.form')
               </form>
            </div>

        </div>
    </div>
</div>


@stop

