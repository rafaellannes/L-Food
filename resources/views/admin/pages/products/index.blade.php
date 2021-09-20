@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
<div class="row">
    <div class="col-sm-6">
        <h1>Produtos</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Produtos</li>
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
                        <form class="form form-inline" action="{{route('products.search')}}" method="POST">
                            @csrf
                            <input type="text" name="filter" placeholder="Filtrar..." class="form-control"
                                value="{{$filters['filter'] ?? ''}}">
                            <button type="submit" class="btn btn-secondary mx-1">Filtrar <i
                                    class="fas fa-search fa-fw"></i></button>
                        </form>
                    </div>

                    <div class="ml-auto">
                        <div class="card-tools">
                            <a href="{{route('products.create')}}"><button class="btn btn-success">Adicionar <i
                                        class="fas fa-plus fa-fw"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Titulo</th>
                            <th width="250">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>
                                <img style="max-width: 90px" alt="{{$product->title}}"
                                    src="{{url("storage/{$product->image}")}}">
                            </td>
                            <td>
                                {{$product->title}}
                            </td>


                            <td style="width=30px">

                                <a href="{{route('products.categories', $product->id)}}" class="btn btn-primary"><i class="fas fa-layer-group"></i></a>
                                <a href="{{route('products.show', $product->id)}}" class="btn btn-info">Ver</a>
                                <a href="{{route('products.edit', $product->id)}}" class="btn btn-secondary">Editar</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @if (isset($filters))
                {!! $products->appends($filters)->links() !!}
                @else
                {!! $products->links() !!}
                @endif

            </div>
        </div>
    </div>
</div>
@stop
