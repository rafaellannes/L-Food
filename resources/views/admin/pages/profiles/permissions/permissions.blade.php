@extends('adminlte::page')

@section('title', "Permissões do Perfil {$profile->name}")

@section('content_header')
<div class="row">
    <div class="col-sm-6">
        <h1>Permissões do Perfil: <strong>{{$profile->name}}</strong></h1>
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
                            <a href="{{route('profiles.permissions.avaiable',$profile->id)}}"><button
                                    class="btn btn-success">Adicionar Permissão
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
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{$permission->name}}
                            </td>

                            <td style="width=30px">
                                <a href="{{route('profiles.permissions.detach',[$profile->id, $permission->id])}}"
                                    class="btn btn-danger">Desvincular</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
                @else
                {!! $permissions->links() !!}
                @endif

            </div>
        </div>
    </div>
</div>
@stop
