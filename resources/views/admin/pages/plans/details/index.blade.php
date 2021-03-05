@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
<div class="row">
    <div class="col-sm-6">
        <h1>Detalhes do Plano {{$plan->name}}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
            <li class="breadcrumb-item active">Detalhes</a></li>

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
                    <div class="ml-auto">
                        <div class="card-tools">
                            <a href="{{route('details.plan.create', $plan->url)}}"><button
                                    class="btn btn-success">Adicionar <i class="fas fa-plus fa-fw"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th width="200">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail)
                        <tr>
                            <td>
                                {{$detail->name}}
                            </td>

                            <td>
                            <form method="POST" style="float:left" action="{{route('details.plan.destroy', [$plan->url, $detail->id])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                                <a href="{{route('details.plan.edit', [$plan->url, $detail->id])}}"
                                    class="btn btn-secondary mx-1">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @if (isset($filters))
                {!! $details->appends($filters)->links() !!}
                @else
                {!! $details->links() !!}
                @endif

            </div>
        </div>
    </div>
</div>
@stop
