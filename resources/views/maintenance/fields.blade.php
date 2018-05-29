<div class="form-group">
    <label for="">Nombre</label>
    {{ Form::text('name', null,['class' => 'form-control border-input', 'required']) }}
</div>

<div class="form-group">
    <label for="">Correo electronico</label>
    {{ Form::email('email', null,['class' => 'form-control border-input', 'required']) }}
</div>

<div class="form-group">
	<label for="">Tipo</label>
	<select name="tipo" id="" class="form-control border-input" required="">
		<option value="1">Administrador</option>
		<option value="2">Empleado</option>
	</select>
</div>


