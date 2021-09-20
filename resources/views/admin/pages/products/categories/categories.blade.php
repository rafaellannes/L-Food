@extends('adminlte::page')

@section('title', "Categorias do Produto {$product->title}")

@section('content_header')
<div class="row">
    <div class="col-sm-6">
        <h1>Categorias do Produto: <strong>{{$product->title}}</strong></h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item">Categorias</li>
            <li class="breadcrumb-item active"><a href="{{route('products.categories', $product->id)}}">Planos</a></li>

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
                            <a href="{{route('products.categories.avaiable',$product->id)}}"><button
                                    class="btn btn-success">Adicionar Categoria
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
                        @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{$category->name}}
                            </td>

                            <td style="width=30px">
                                <a href="{{route('products.category.detach',[$product->id, $category->id])}}"
                                    class="btn btn-danger">Desvincular</a>
                            </td>
                        </tr>
                        @endforeach
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
