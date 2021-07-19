@extends('adminlte::page')

@section('title', "Permissões do Perfil {$profile->name}")

@section('content_header')
<div class="row">
    <div class="col-sm-6">
        <h1>Permissões disponíveis do Perfil: <strong>{{$profile->name}}</strong></h1>
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
                    <div>
                        <form class="form form-inline" action="{{route('profiles.permissions.avaiable', $profile->id)}}"
                            method="POST">
                            @csrf
                            <input type="text" name="filter" placeholder="Filtrar..." class="form-control"
                                value="{{$filters['filter'] ?? ''}}">
                            <button type="submit" class="btn btn-secondary mx-1">Filtrar <i
                                    class="fas fa-search fa-fw"></i></button>
                        </form>
                    </div>

                    <div class="ml-auto">
                        <div class="card-tools">

                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th width="50px">#</th>
                            <th>Nome</th>

                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{route('profiles.permissions.attach', $profile->id )}}" method="POST">
                            @csrf
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>
                                    <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
                                </td>
                                <td>
                                    {{$permission->name}}
                                </td>

                                {{--        <td style="width=30px">
                        <a href="{{route('profiles.edit', $profile->id)}}" class="btn btn-secondary">Editar</a>
                                </td> --}}
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="500">
                                    <button class="btn btn-success" type="submit">Vincular</button>
                                </td>
                            </tr>
                        </form>
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
