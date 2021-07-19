@extends('adminlte::page')

@section('title', "Perfis disponíveis para o Plano {$plan->name}")

@section('content_header')
<div class="row">
    <div class="col-sm-6">
        <h1>Perfis disponíveis para o Plano: <strong>{{$plan->name}}</strong></h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item">Planos</li>
            <li class="breadcrumb-item"><a href="{{route('plans.profiles', $plan->id)}}">Planos</a></li>
            <li class="breadcrumb-item active"><a href="{{route('plans.profiles.avaiable', $plan->id)}}">Disponiveis</a></li>
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
                        <form class="form form-inline" action="{{route('plans.profiles.avaiable', $plan->id)}}"
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
                        <form action="{{route('plans.profiles.attach', $plan->id )}}" method="POST">
                            @csrf
                            @foreach ($profiles as $profile)
                            <tr>
                                <td>
                                    <input type="checkbox" name="profiles[]" value="{{$profile->id}}">
                                </td>
                                <td>
                                    {{$profile->name}}
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
                {!! $profiles->appends($filters)->links() !!}
                @else
                {!! $profiles->links() !!}
                @endif

            </div>
        </div>
    </div>
</div>
@stop
