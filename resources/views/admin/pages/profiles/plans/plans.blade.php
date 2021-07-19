@extends('adminlte::page')

@section('title', "Planos do Perfil {$profile->name}")

@section('content_header')
<div class="row">
    <div class="col-sm-6">
        <h1>Planos do Perfil: <strong>{{$profile->name}}</strong></h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item ">Perfis</li>
            <li class="breadcrumb-item active"><a href="{{route('profiles.plans', $profile->id)}}">Planos</a></li>
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
                        @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{$plan->name}}
                            </td>

                            <td style="width=30px">
                                <a href="{{route('plans.profile.detach',[$plan->id, $profile->id])}}"
                                    class="btn btn-danger">Desvincular</a>
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
