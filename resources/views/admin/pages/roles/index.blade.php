@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
<div class="row">
    <div class="col-sm-6">
        <h1>Cargos</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Cargos</li>
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
                        <form class="form form-inline" action="{{route('roles.search')}}" method="POST">
                            @csrf
                            <input type="text" name="filter" placeholder="Filtrar..." class="form-control"
                                value="{{$filters['filter'] ?? ''}}">
                            <button type="submit" class="btn btn-secondary mx-1">Filtrar <i
                                    class="fas fa-search fa-fw"></i></button>
                        </form>
                    </div>

                    <div class="ml-auto">
                        <div class="card-tools">
                            <a href="{{route('roles.create')}}"><button class="btn btn-success">Adicionar <i
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
                            <th width="270">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>
                                {{$role->name}}
                            </td>

                            <td style="width=30px">

                                <a href="{{route('roles.show', $role->id)}}" class="btn btn-info">Ver</a>
                                <a href="{{route('roles.edit', $role->id)}}" class="btn btn-secondary">Editar</a>
                                <a href="{{route('roles.permissions', $role->id)}}" class="btn btn-secondary"><i
                                        class="fas fa-lock"></i></a>

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
