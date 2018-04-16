@if(session()->has('success'))
	<script>
	demo.showNotification('Exito', '{{ session('success') }}', 'success')
	</script>
@endif

@if(session()->has('danger'))
	<script>
	demo.showNotification('Error!', '{{ session('danger') }}', 'danger')	
	</script>
@endif

@if(session()->has('warning'))
	<script>
	demo.showNotification('Cuidado', '{{ session('warning') }}', 'warning')	
	</script>
@endif