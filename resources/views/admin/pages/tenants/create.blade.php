@extends('adminlte::page')

@section('title', 'Empresa')

@section('content_header')
<h1>Adicionar Empresa</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Cadastro de Empresa</h3>

            </div>

            <div class="card-body">
                <form action="{{route('tenants.store')}}" method="POST" class="form" enctype="multipart/form-data">
                    @include('admin.pages.tenants._partials.form')
                </form>
            </div>

        </div>
    </div>
</div>


@stop
