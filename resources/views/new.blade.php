@include('app')
@yield('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container d-flex justify-content-center align-items-middle">
    <div class="card shadow-lg mt-5" style="width: auto">
        <div class="card-header d-flex justify-content-between">
            <h5>Nuevo Contacto</h5>
            <a href="{{ route('index') }}" class='btn btn-warning'>Volver</a>
        </div>
        <div class="card-body">
            @include('forms.new')
        </div>
    </div>
