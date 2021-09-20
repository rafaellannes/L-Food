@extends('adminlte::page')

@section('title', "Categorias disponíveis para o Produto {$product->name}")

@section('content_header')
<div class="row">
    <div class="col-sm-6">
        <h1>Categorias disponíveis para o Produto: <strong>{{$product->name}}</strong></h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item">Produtos</li>
            <li class="breadcrumb-item"><a href="{{route('products.categories', $product->id)}}">Produtos</a></li>
            <li class="breadcrumb-item active"><a href="{{route('products.categories.avaiable', $product->id)}}">Disponiveis</a></li>
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
                        <form class="form form-inline" action="{{route('products.categories.avaiable', $product->id)}}"
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
                        <form action="{{route('products.categories.attach', $product->id )}}" method="POST">
                            @csrf
                            @foreach ($categories as $category)
                            <tr>
                                <td>
                                    <input type="checkbox" name="categories[]" value="{{$category->id}}">
                                </td>
                                <td>
                                    {{$category->name}}
                                </td>

                                {{--        <td style="width=30px">
                        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-secondary">Editar</a>
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
                {!! $categories->appends($filters)->links() !!}
                @else
                {!! $categories->links() !!}
                @endif

            </div>
        </div>
    </div>
</div>
@stop
