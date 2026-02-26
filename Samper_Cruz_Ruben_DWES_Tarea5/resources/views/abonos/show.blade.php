@extends("layouts.default")
@section('title','Nuevos Abonos')
@section('contenido')
<div class="ticket"> <!--esta es la vista del ticket del abono-->
    <h2>Compra registrada</h2>

    <p><strong>Fecha de compra:</strong> {{$abono->created_at}}</p>

    <p><strong>Abonado:</strong> {{$abono->abonado}}</p>

    <p><strong>Edad:</strong> {{$abono->edad}}</p>
    
    <p><strong>Teléfono:</strong> {{$abono->telefono}}</p>

    <p><strong>Tipo de abono:</strong> {{$abono->tipo}}</p>

    <p><strong>Asiento:</strong> {{$abono->asiento}}</p>

    <p><strong>Tarifa especial:</strong> {{$tarifaEspecial}}</p>

    <p><strong>Precio final:</strong> {{$abono->precio}}€</p>
</div>
@endsection
