@csrf
<div class="form-group">
    <label>Nome</label>
<input type="text" name="name" id="name" placeholder="Nome do detalhe" class="form-control" value="{{$detail->name ?? old('name')}}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>
