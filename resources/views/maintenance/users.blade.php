<div class="row">

	<div class="col-md-12" style="margin: 20px 0 20px 0">
		<a href="{{ route('maintenance.user.create') }}" class="btn btn-primary pull-right">
			Nuevo
		</a>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table table-responsive table-bordered text-center">
			<thead>
				<tr>
					<th class="text-center">ID</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Email</th>
					<th class="text-center">Fecha de creación</th>
					<th class="text-center">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@forelse($users as $user)
				<tr>
					<td>#{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->created_date }}</td>
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