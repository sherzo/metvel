<div class="form-group">
    <label for="">Nombre</label>
    {{ Form::text('name', null,['class' => 'form-control border-input', 'required']) }}
</div>

<div class="form-group">
    <label for="">Descripción</label>

    {{ Form::textarea('description', null, ['class' => 'form-control border-input', 'required', 'rows' => '3']) }}
</div>

<div class="form-group">
	<label for="">Precio</label>
	{{ Form::text('price', null, ['class' => 'form-control border-input'])}}
</div>

<div class="form-group">
	<label for="">Stock inical</label>
	{{ Form::number('stock', null, ['class' => 'form-control border-input'])}}
</div>
