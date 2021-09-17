@extends('adminlte::page')

@section('title', "Detalhes da permissão: {$user->name}")

@section('content_header')
<h1>Detalhes da permissão: {{$user->name}}</h1>
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
                    <li>
                        <strong>Nome:</strong>{{$user->name}}
                    </li>

                    <li>
                        <strong>E-mail:</strong>{{$user->email}}
                    </li>

                </ul>
            </div>
            <div class="card-footer">
                <button class="btn btn-danger" data-toggle="modal" data-target="#delete"><i
                        class="fas fa-trash fa-fw"></i>Deletar Usuário</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deletar Usuário?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('users.destroy', $user->id)}}" method="post">
                @method("DELETE")
                {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center">
                        Tem certeza que deseja deletar o usuário {{$user->name}}
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


@stop
