<div class="form-group">
    <label for="">Rif</label>
    {{ Form::text('dni', null,['class' => 'form-control border-input', 'required']) }}
</div>

<div class="form-group">
    <label for="">Razón social</label>
    {{ Form::text('name', null,['class' => 'form-control border-input', 'required']) }}
</div>

<div class="form-group">
	<label for="">Teléfono de contacto</label>
	{{ Form::text('phone', null, ['class' => 'form-control border-input'])}}
</div>

<div class="form-group">
	<label for="">Estados</label>
	<select name="state_id" id="" class="form-control border-input" v-model="state_id" @change="getCitiesAndMunicipalities()">
		<option value="0">Seleccione</option>
		<option :value="id" v-for="(state, id) in states">@{{ state }}</option>
	</select>

</div>

<div class="form-group">
	<label for="">Ciudad</label>
	<select name="city_id" id="city_id" class="form-control border-input" v-model="city_id">
		<option value="0">Seleccione</option>
		<option :value="c.id" v-for="c in cities">@{{ c.name }}</option>
	</select>
</div>

<div class="form-group">
    <label for="">Dirección</label>
    {{ Form::textarea('address', null, ['class' => 'form-control border-input', 'required', 'rows' => '3']) }}
</div>

<div class="form-group">
	<label for="">Productos</label>
	<select data-placeholder="Seleccione los productos" multiple class="chosen-select form-control border-input" name="products[]">
		@forelse($products as $id => $product)
			<option value="{{ $id }}">{{ $product }}</option>
		@empty
			<option value="">Sin datos</option>
		@endforelse
	</select>
</div>
