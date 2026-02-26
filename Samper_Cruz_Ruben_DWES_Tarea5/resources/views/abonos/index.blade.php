@extends("layouts.default")
@section('title','Listado de abonos')
@section('contenido')

<div class="listado">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <p>Total de abonos: {{ $abonos->count() }}</p>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha de creación</th>
                <th>Abonado</th>
                <th>Edad</th>
                <th>Teléfono</th>
                <th>Cuenta Bancaria</th>
                <th>Tipo</th>
                <th>Asiento</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($abonos as $n)

                <tr>
                    <td>{{ $n->id }}</td>
                    <td>{{ $n->created_at }}</td>
                    <td>{{ $n->abonado }}</td>
                    <td>{{ $n->edad }}</td>
                    <td><img class="icono-telefono" src="{{ asset('img/telefono.png') }}" title="{{ $n->telefono }}" style="cursor: help;"></td>
                    <td><img class="icono-banco" src="{{ asset('img/banco.png') }}" title="{{ $n->cuenta_bancaria }}" style="cursor: help;"></td>
                    <td>{{ $n->tipo }}</td>
                    <td>{{ $n->asiento }}</td>
                    <td>{{ $n->precio }}</td>
                </tr>

            @endforeach
        </tbody>
    </table>
  </div>
  @endsection