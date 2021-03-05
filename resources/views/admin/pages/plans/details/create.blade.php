@extends('adminlte::page')

@section('title', "Adicionar detalhe do plano {$plan->name}")

@section('content_header')
<div class="row">
    <div class="col-sm-6">
        <h1>Adicionar detalhe {{$plan->name}}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
            <li class="breadcrumb-item active">Adicionar detalhe do plano: {{$plan->name}}</li>
        </ol>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Adicionar novo detalhe ao plano {{$plan->nome}}</h3>
            </div>

            <div class="card-body">
                <form action="{{route('details.plan.store', $plan->url)}}" method="post">
                    @include('admin.pages.plans.details.__partials.form')
                </form>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>
@stop
