<div class="form-group">
    <label for="">Rif</label>
    {{ Form::text('dni', null,['class' => 'form-control border-input', 'required']) }}
</div>

<div class="form-group">
    <label for="">Nombre</label>
    {{ Form::text('name', null,['class' => 'form-control border-input', 'required']) }}
</div>

<div class="form-group">
	<label for="">Teléfono de contacto</label>
	{{ Form::text('phone', null, ['class' => 'form-control border-input'])}}
</div>

<div class="form-group">
	<label for="">Estados</label>
	<select name="state_id" id="" class="form-control border-input" v-mode="state_id" @change="getCitiesAndMunicipalities({{ $key }})">
		<option value="0">Seleccione</option>
		@forelse($states as $key => $state)
			<option value="{{ $key }}">{{ $state }}</option>
		@empty
			<option value="">No se encontraron estados</option>
		@endforelse
	</select>
	{{-- 
	{{ Form::select('state_id', $states, ['class' => 'form-control', 'v-model' => 'state_id', '@change' => 'getCitiesAndMunicipalities']) }}
	
		--}}
</div>

<div class="form-group">
	<label for="">Ciudad</label>
	<select name="city_id" id="city_id" class="form-control border-input" v-model="city_id">
		<option value="0">Seleccione</option>
		<option :value="i" v-for="(city, i) in cities">@{{ city }}</option>
	</select>
</div>

<div class="form-group">
	<label for="">Municipio</label>
	<select name="municipality_id" id="municipality_id" class="form-control border-input" v-model="municipality_id">
		<option value="0">Seleccione</option>
		<option :value="i" v-for="(m, i) in municipalities">@{{ m }}</option>
	</select>
</div>

<div class="form-group">
	<label for="">Parroquia</label>
	<select name="parish_id" id="parish_id" class="form-control border-input" v-model="parish_id">
		<option value="0">Seleccione</option>
		<option :value="i" v-for="(parish, i) in parishes">@{{ parish }}</option>
	</select>
</div>

<div class="form-group">
    <label for="">Dirección</label>
    {{ Form::textarea('address', null, ['class' => 'form-control border-input', 'required', 'rows' => '3']) }}
</div>
