@extends('adminlte::page')

@section('title', "Editar a Empresa {$tenant->name}")

@section('content_header')
<h1>Editar Empresa</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Editar Empresa - {{$tenant->name}} </h3>

            </div>

            <div class="card-body">
                <form action="{{route('tenants.update', $tenant->id)}}" method="POST" class="form"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @include('admin.pages.tenants._partials.form')
                </form>
            </div>

        </div>
    </div>
</div>


@stop
