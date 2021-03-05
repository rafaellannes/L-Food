@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1>Adicionar Perfil</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Cadastro de Perfil</h3>

            </div>

            <div class="card-body">
                <form action="{{route('profiles.store')}}" method="POST" class="form">
                   @include('admin.pages.profiles._partials.form')
               </form>
            </div>

        </div>
    </div>
</div>


@stop

