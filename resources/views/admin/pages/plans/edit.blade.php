@extends('adminlte::page')

@section('title', "Editar o plano {$plan->name}")

@section('content_header')
    <h1>Editar Plano</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Editar Plano - {{$plan->name}} </h3>
    
            </div>
                            
            <div class="card-body">
                <form action="{{route('plans.update', $plan->url)}}" method="POST" class="form">
                   @method('PUT')
                   @include('admin.pages.plans._partials.form')
               </form>
            </div>
         
        </div>
    </div>
</div>


@stop

