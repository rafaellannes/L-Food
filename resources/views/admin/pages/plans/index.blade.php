@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
<div class="row">
    <div class="col-sm-6">
        <h1>Planos</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Planos</li>
        </ol>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-dark">
            <div class="card-header">

                <div class="row">
                    <div>
                        <form class="form form-inline" action="{{route('plans.search')}}" method="POST">
                            @csrf
                            <input type="text" name="filter" placeholder="Filtrar..." class="form-control"
                                value="{{$filters['filter'] ?? ''}}">
                            <button type="submit" class="btn btn-secondary mx-1">Filtrar <i
                                    class="fas fa-search fa-fw"></i></button>
                        </form>
                    </div>

                    <div class="ml-auto">
                        <div class="card-tools">
                            <a href="{{route('plans.create')}}"><button class="btn btn-success">Adicionar <i
                                        class="fas fa-plus fa-fw"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th width="270">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{$plan->name}}
                            </td>
                            <td>
                                {{$plan->description}}
                            </td>

                            <td>
                                {{number_format($plan->price, 2,',', '.')}}
                            </td>
                            <td style="width=30px">
                                <a href="{{route('details.plan.index', $plan->url)}}"
                                    class="btn btn-primary">Detalhes</a>
                                <a href="{{route('plans.show', $plan->url)}}" class="btn btn-info">Ver</a>
                                <a href="{{route('plans.edit', $plan->url)}}" class="btn btn-secondary">Editar</a>
                                <a href="{{route('plans.profiles', $plan->id)}}" class="btn btn-secondary">Perfis</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
                @else
                {!! $plans->links() !!}
                @endif

            </div>
        </div>
    </div>
</div>
@stop
