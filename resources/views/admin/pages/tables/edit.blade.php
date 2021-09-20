@extends('adminlte::page')

@section('title', "Editar a Mesa {$table->identify}")

@section('content_header')
    <h1>Editar Mesa</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Editar Mesa - {{$table->identify}} </h3>

            </div>

            <div class="card-body">
                <form action="{{route('tables.update', $table->id)}}" method="POST" class="form">
                   @method('PUT')
                   @include('admin.pages.tables._partials.form')
               </form>
            </div>

        </div>
    </div>
</div>


@stop

