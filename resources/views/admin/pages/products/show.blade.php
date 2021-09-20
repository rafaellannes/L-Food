@extends('adminlte::page')

@section('title', "Detalhes do Produto: {$product->name}")

@section('content_header')
<h1>Detalhes do Produto: {{$product->name}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <h3 class="card-title">Detalhes</h3>
            </div>

            <div class="card-body">
                <ul>
                    <img style="max-width: 90px" alt="{{$product->title}}" src="{{url("storage/{$product->image}")}}">

                    <li>
                        <strong>Titulo:</strong>{{$product->title}}
                    </li>

                    <li>
                        <strong>Flag:</strong>{{$product->flag}}
                    </li>

                    <li>
                        <strong>Descrição:</strong>{{$product->description}}
                    </li>

                </ul>
            </div>
            <div class="card-footer">
                <button class="btn btn-danger" data-toggle="modal" data-target="#delete"><i
                        class="fas fa-trash fa-fw"></i>Deletar Produto</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deletar Produto?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('products.destroy', $product->id)}}" method="post">
                @method("DELETE")
                {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center">
                        Tem certeza que deseja deletar o produto {{$product->name}}
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@stop
