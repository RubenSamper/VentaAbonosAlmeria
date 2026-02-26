@extends("layouts.default")
@section('title','Login')
@section('contenido')

<div class="login"> <!--esta es la vista del login-->
        <h1 class="text-center">LOGIN</h1>
        
        @if (session('error'))
            <div class="alerta" style="background-color: #ff6b6b; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('usuarios.loginValidation') }}" method="POST">
            @csrf

            <label>Usuario:</label><br/>
            <input type="text" name="username" value="{{ old('username') }}"/><br/>
            @error('username')

            <div class="alerta">{{ $message }}</div>
            @enderror

            <label>Contraseña:</label><br/>
            <input type="password" name="password"/><br /> <!-- no se le pone el value a la contraseña por seguridad-->
            @error('password')

            <div class="alerta">{{ $message }}</div>
            @enderror

            <br/>         
            <button type="submit">Enviar</button>
        </form>
        <br>
    </div>
    @endsection