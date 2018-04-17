<!--
	Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
	Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
-->

<div class="sidebar-wrapper">
    <div class="logo">
        <a href="{{ url('/') }}" class="simple-text">
            Met Vel
        </a>
    </div>

    <ul class="nav">
        <li class="{{ $sidebarActive == 1 ? 'active' : '' }}">
            <a href="{{ url('home') }}">
                <i class="ti-home"></i>
                <p>Inicio</p>
            </a>
        
        </li>
        <li class="{{ $sidebarActive == 2 ? 'active' : '' }}">
            <a href="{{ url('products') }}">
                <i class="ti-package"></i>
                <p>Productos</p>
            </a>
        </li>
        <li class="{{ $sidebarActive == 3 ? 'active' : '' }}">
            <a href="{{ url('/clients') }}">
                <i class="ti-id-badge"></i>
                <p>Clientes</p>
            </a>
        </li>
        <li class="{{ $sidebarActive == 4 ? 'active' : '' }}">
            <a href="{{ url('providers') }}">
                <i class="ti-truck"></i>
                <p>Proveedores</p>
            </a>
        </li>
       

        <li class="{{ $sidebarActive == 5 ? 'active' : '' }}">
            <a href="{{ url('sales') }}">
                <i class="ti-shopping-cart"></i>
                <p>Ordenes</p>
            </a>
        </li>
    </ul>
</div>
