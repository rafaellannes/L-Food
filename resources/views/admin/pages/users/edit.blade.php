@extends('adminlte::page')

@section('title', "Editar o Usuário {$user->name}")

@section('content_header')
    <h1>Editar Usuário</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Editar Usuário - {{$user->name}} </h3>

            </div>

            <div class="card-body">
                <form action="{{route('users.update', $user->id)}}" method="POST" class="form">
                   @method('PUT')
                   @include('admin.pages.users._partials.form')
               </form>
            </div>

        </div>
    </div>
</div>


@stop

