@extends('adminlte::page')

@section('title', "Editar o Categoria {$category->name}")

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Editar Categoria - {{$category->name}} </h3>

            </div>

            <div class="card-body">
                <form action="{{route('categories.update', $category->id)}}" method="POST" class="form">
                   @method('PUT')
                   @include('admin.pages.categories._partials.form')
               </form>
            </div>

        </div>
    </div>
</div>


@stop

