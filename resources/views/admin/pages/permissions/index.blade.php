@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
<div class="row">
    <div class="col-sm-6">
        <h1>Permissões</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Permissões</li>
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
                        <form class="form form-inline" action="{{route('permissions.search')}}" method="POST">
                            @csrf
                            <input type="text" name="filter" placeholder="Filtrar..." class="form-control"
                                value="{{$filters['filter'] ?? ''}}">
                            <button type="submit" class="btn btn-secondary mx-1">Filtrar <i
                                    class="fas fa-search fa-fw"></i></button>
                        </form>
                    </div>

                    <div class="ml-auto">
                        <div class="card-tools">
                            <a href="{{route('permissions.create')}}"><button class="btn btn-success">Adicionar <i
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
                            <th width="250">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{$permission->name}}
                            </td>

                            <td>
                                {{$permission->description}}
                            </td>

                            <td style="width=30px">

                                <a href="{{route('permissions.show', $permission->id)}}" class="btn btn-info">Ver</a>
                                <a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-secondary">Editar</a>
                                <a href="{{route('permissions.profiles', $permission->id)}}" class="btn btn-secondary"><i class="fas fa-address-book"></i></a>
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
