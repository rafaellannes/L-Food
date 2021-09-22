@extends('adminlte::page')

@section('title', "Detalhes da Empresa: {$tenant->name}")

@section('content_header')
<h1>Detalhes da Empresa: {{$tenant->name}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Detalhes</h3>
            </div>

            <div class="card-body">
                <ul>
                    <img style="max-width: 90px" alt="{{$tenant->name}}" src="{{url("storage/{$tenant->logo}")}}">

                    <li>
                        <strong>Plano:</strong>{{$tenant->plan->name}}
                    </li>

                    <li>
                        <strong>Nome:</strong>{{$tenant->name}}
                    </li>

                    <li>
                        <strong>URL:</strong>{{$tenant->url}}
                    </li>

                    <li>
                        <strong>E-mail:</strong>{{$tenant->email}}
                    </li>

                    <li>
                        <strong>CNPJ:</strong>{{$tenant->cnpj}}
                    </li>

                    <li>
                        <strong>Ativo:</strong>{{$tenant->active == 'Y' ? 'Sim' : 'Não'}}
                    </li>

                    <hr>

                    <h3>Assinatura:</h3>
                    <li>
                        <strong>Data Assinatura:</strong>{{$tenant->subscription}}
                    </li>

                    <li>
                        <strong>Data Expiração:</strong>{{$tenant->expires_at}}
                    </li>


                    <li>
                        <strong>Identificador:</strong>{{$tenant->subscription_id}}
                    </li>

                    <li>
                        <strong>Ativo?</strong>{{$tenant->subscription_active == 1 ? 'Sim' : 'Não'}}
                    </li>

                    <li>
                        <strong>Cancelou?</strong>{{$tenant->subscription_suspended == 1 ? 'Sim' : 'Não'}}
                    </li>

                </ul>
            </div>
{{--             <div class="card-footer">
                <button class="btn btn-danger" data-toggle="modal" data-target="#delete"><i
                        class="fas fa-trash fa-fw"></i>Deletar Empresa</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deletar Empresa?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('tenants.destroy', $tenant->id)}}" method="post">
                @method("DELETE")
                {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center">
                        Tem certeza que deseja deletar a empresa {{$tenant->name}}
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>
 --}}

@stop
