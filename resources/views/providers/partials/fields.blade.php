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
	{{ Form::text('phone', null, ['class' => 'form-control border-input', 'required'])}}
</div>

@if(isset($provider))
	<div class="form-group">
		<label for="">Localización actual de proveedor</label>
		<input type="text" class="form-control border-input" value="{{ $provider->location }}" readonly="">
	</div>
@endif

<div class="form-group">
	<label for="">Estado</label>
	<select name="state_id" id="" class="form-control border-input" v-model="state_id" @change="getCitiesAndMunicipalities()" {{ !isset($provider) ? 'required' : '' }}>
		<option value="">Seleccione</option>
		<option :value="id" v-for="(state, id) in states">@{{ state }}</option>
	</select>
	@if(isset($provider))
		<span class="help-block text-info">Seleccione solo si desea cambiar el estado</span>
	@endif
</div>

<div class="form-group">
	<label for="">Ciudad</label>
	<select name="city_id" id="city_id" class="form-control border-input" v-model="city_id" {{ !isset($provider) ? 'required' : '' }}>
		<option value="">Seleccione</option>
		<option :value="c.id" v-for="c in cities">@{{ c.name }}</option>
	</select>	
</div>

<div class="form-group">
    <label for="">Dirección fiscal</label>
    {{ Form::textarea('address', null, ['class' => 'form-control border-input', 'required', 'rows' => '3']) }}
</div>

@if(!isset($provider))
	<div class="form-group">
		<label for="">Productos</label>
		<select data-placeholder="Seleccione los productos" multiple class="chosen-select form-control border-input" name="products[]" required="">
			@forelse($products as $id => $product)
				<option value="{{ $id }}">{{ $product }}</option>
			@empty
				<option value="">Sin datos</option>
			@endforelse
		</select>
	</div>
@endif
