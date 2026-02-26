<?php

namespace App\View\Components;

use App\Models\TipoAbono;
use Illuminate\View\Component;

class SelectTipoAbono extends Component
{
    public $listado;
    public $selectTipo;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($selectTipo)
    {
        $this->selectTipo =  $selectTipo;
        $this->listado = TipoAbono::orderByDesc('id')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    
    public function render()
    {
        return view('components.select-tipo-abono');
    }
}
