@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Adicionar Plano</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Cadastro de Plano</h3>
    
            </div>
                            
            <div class="card-body">
                <form action="{{route('plans.store')}}" method="POST" class="form">
                   @include('admin.pages.plans._partials.form')
               </form>
            </div>
         
        </div>
    </div>
</div>


@stop

