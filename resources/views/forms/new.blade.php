<form method="POST" action="{{ route('store') }}">
    @csrf
    <div class="input-group p-2 mb-2">
        <label for="name" class="form-label me-2">Nombre</label>
        <input type="text" class="form-control" id="name" aria-describedby="Nombre" name="name" placeholder="Juan"
            value="{{ old('name') }}" required>

        <label for="last_name" class="form-label ms-2 me-2">Apellido</label>
        <input type="text" class="form-control" id="last_name" value="{{ old('last_name') }}"
            aria-describedby="Apellido" name="last_name" placeholder="Pérez" required>
    </div>

    <div class="input-group p-2 mb-2">
        <label for="address" class="form-label me-2">Dirección</label>
        <input type="text" class="form-control" id="address" name="address" aria-describedby="Dirección"
            placeholder="Calle Falsa 123" value="{{ old('address') }}" required>

        <label for="number" class="form-label ms-2 me-2">Teléfono</label>
        <input type="number" class="form-control" id="number" name="number" aria-describedby="Teléfono"
            placeholder="342111222" value="{{ old('number') }}" required>
    </div>
    <div class="input-group mb-3">
        <label for="email" class="form-label ms-2 me-2">Email</label>
        <input type="email" class="form-control" id="email" aria-describedby="Email" name="email"
            placeholder="email@email.com" value="{{ old('email') }}" required>
    </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
