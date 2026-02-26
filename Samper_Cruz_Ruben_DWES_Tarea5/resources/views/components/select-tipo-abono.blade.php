    <div class="form-group">
        <label for="body">Tipo</label>
        <select name="tipo" class="form-control">
            <option value="">-</option>
            @foreach ($listado as $op)
                <option value="{{ $op->id}}" @selected($selectTipo == $op->id)>
                    {{ $op->descripcion}} ({{$op->precio}})
                </option>
            @endforeach
        </select>
        @error('tipo')
        <div class="alerta">{{ $message }}</div>
        @enderror
    </div>