@extends('adminlte::page')

@section('title', "Editar o Permissão {$permission->name}")

@section('content_header')
    <h1>Editar Permissão</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Editar Permissão - {{$permission->name}} </h3>

            </div>

            <div class="card-body">
                <form action="{{route('permissions.update', $permission->id)}}" method="POST" class="form">
                   @method('PUT')
                   @include('admin.pages.permissions._partials.form')
               </form>
            </div>

        </div>
    </div>
</div>


@stop

