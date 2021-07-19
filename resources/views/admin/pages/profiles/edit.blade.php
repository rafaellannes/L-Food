@extends('adminlte::page')

@section('title', "Editar o Perfil {$profile->name}")

@section('content_header')
    <h1>Editar Perfil</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Editar Perfil - {{$profile->name}} </h3>

            </div>

            <div class="card-body">
                <form action="{{route('profiles.update', $profile->id)}}" method="POST" class="form">
                   @method('PUT')
                   @include('admin.pages.profiles._partials.form')
               </form>
            </div>

        </div>
    </div>
</div>


@stop

