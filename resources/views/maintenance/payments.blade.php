{{ Form::open(['route' => 'shape.store']) }}
<div class="row" style="margin: 20px 0 20px 0">
	<div class="col-md-8">
		<div class="form-group">
			<label for="">Agregar nueva forma de pago</label>
			<input type="text" name="name" class="form-control border-input">
			<input type="hidden" name="shape" value="App\Payment">

		</div>
	</div>

	<div class="col-md-4" style="margin-top: 25px;">
		<button class="btn btn-primary">
			Guardar
		</button>
	</div>
</div>
{{ Form::close() }}

<div class="row">
	<div class="col-md-12">
		<table class="table table-responsive table-bordered text-center">
			<thead>
				<tr>
					<th class="text-center">ID</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@forelse($payments as $payment)
				<tr>
					<td>#{{ $payment->id }}</td>
					<td>{{ $payment->name }}</td>
					<td>
						<a href="#" class="btn btn-warning btn-sm">                                 
                            <i class="ti-pencil"></i>
                        </a>

						 <a href="#" class="btn btn-danger btn-sm">
                            <i class="ti-close"></i>
                        </a>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="3">No se encontraron resultados</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>