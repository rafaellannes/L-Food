@extends('adminlte::page')

@section('title', "Cargos do Usuário {$user->name}")

@section('content_header')
<div class="row">
    <div class="col-sm-6">
        <h1>Cargos do Usuário: <strong>{{$user->name}}</strong></h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Perfis</li>
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
                            <a href="{{route('users.roles.avaiable',$user->id)}}"><button
                                    class="btn btn-success">Adicionar Cargo
                                    <i class="fas fa-plus fa-fw"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th width="250">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>
                                {{$role->name}}
                            </td>

                            <td style="width=30px">
                                <a href="{{route('users.roles.detach',[$user->id, $role->id])}}"
                                    class="btn btn-danger">Desvincular</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @if (isset($filters))
                {!! $roles->appends($filters)->links() !!}
                @else
                {!! $roles->links() !!}
                @endif

            </div>
        </div>
    </div>
</div>
@stop
