@extends('adminlte::page')

@section('title', "Editar o Cargo {$role->name}")

@section('content_header')
    <h1>Editar Cargo</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Editar Cargo - {{$role->name}} </h3>

            </div>

            <div class="card-body">
                <form action="{{route('roles.update', $role->id)}}" method="POST" class="form">
                   @method('PUT')
                   @include('admin.pages.roles._partials.form')
               </form>
            </div>

        </div>
    </div>
</div>


@stop

