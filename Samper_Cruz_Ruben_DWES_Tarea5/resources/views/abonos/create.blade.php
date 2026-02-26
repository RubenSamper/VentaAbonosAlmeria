@extends("layouts.default")
@section('title','Nuevos Abonos')
@section('contenido')
<div class="formularioCompra">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      <h3>Nuevo Abono</h3>
      <br>
      <form action="{{ route('abonos.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="title">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}"/>
            @error('nombre')
            <div class="alerta">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div class="form-group">
          <label for="body">Apellidos</label>
          <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos') }}">
            @error('apellidos')
            <div class="alerta">{{ $message }}</div>
            @enderror
            
        </div>

        <br>

        <div class="form-group">
          <label for="body">Fecha Nacimiento</label>
          <input type="text" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="{{ old('fechaNacimiento') }}">
            @error('fechaNacimiento')
            <div class="alerta">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div class="form-group">
          <label for="title">Dni</label>
          <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni') }}"/>
            @error('dni')
            <div class="alerta">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div class="form-group">
          <label for="title">Teléfono</label>
          <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}"/>
          @error('telefono')
        <div class="alerta">{{ $message }}</div>
        @enderror
        </div>

        <br>

        <div class="form-group">
          <label for="title">Cuenta bancaria</label>
          <input type="text" class="form-control" id="cuenta_bancaria" name="cuenta_bancaria" value="{{ old('cuenta_bancaria') }}"/>
          @error('cuenta_bancaria')
          <div class="alerta">{{ $message }}</div>
        @enderror
        </div>

        <br>
        
        <!-- <div class="form-group">
          <label for="tipo">Tipo de abono</label>
        <select name="tipo" id="tipo" class="form-control">
          <option value="" selected hidden>-- Seleccione --</option>
          @foreach ($tipos as $t)
          <option value="{{ $t->id }}" {{ old('tipo') == $t->id ? 'selected' : '' }}>
          {{ $t->descripcion }} ({{ $t->precio }} €)
          </option>
          @endforeach
        </select>
        @error('tipo')
        <div class="alerta">{{ $message }}</div>
        @enderror
</div> -->

        <x-SelectTipoAbono select-tipo="{{old('tipo')}}" />

      <br>

<div class="form-check mt-3">
    <input 
        class="form-check-input"
        type="checkbox"
        id="aceptarTerminos"
        name="aceptarTerminos"
        value="1"
        {{ old('aceptarTerminos') ? 'checked' : '' }}
    >
    <label class="form-check-label" for="aceptarTerminos">
        Aceptar términos
    </label>
</div>
@error('aceptarTerminos')
          <div class="alerta">{{ $message }}</div>
        @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
    </div>
  </div>
</div>
@endsection