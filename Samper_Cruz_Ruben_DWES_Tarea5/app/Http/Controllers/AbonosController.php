<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Abono;
use App\Models\Usuario;
use App\Models\TipoAbono;
use App\Rules\CuentaBancaria;
use App\Rules\FechaNacimiento;

class AbonosController extends Controller{
    public function index(){
        if(!auth()->check()){
        return redirect()->route('usuarios.login')->with('error', 'No tienes permisos para acceder a esta página');
        }
        $abonos = Abono::all();

        return view('abonos.index', compact('abonos'));
    }

    public function create()
    {
        $tipos = TipoAbono::all();
        return view('abonos.create', compact('tipos'));
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'nombre' =>[
            'required',
            'regex:/^[\pL\s]+$/u'
            ],

            'apellidos' =>[
                'required',
                'regex:/^[\pL\s]+$/u'
            ],

            'dni' =>[
                'required',
                'regex:/^[0-9]{8}[A-Za-z]$/'
            ],

            'fechaNacimiento'=>[
                'required',
                new FechaNacimiento()
                //'regex:/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/[0-9]{4}$/'
            ],

            'telefono'=>[
                'required',
                'regex:/^[679][0-9]{8}$/'
            ],

            'cuenta_bancaria'=>[
                'required',
                new CuentaBancaria()
            ],

            'tipo'=>[
                'required'
            ],

            'aceptarTerminos'=>[
                'required'
            ]
        ]);

        $fechaNacimiento = \DateTime::createFromFormat('d/m/Y', $request->fechaNacimiento);
        $hoy = new \DateTime();
        $edad = $hoy->diff($fechaNacimiento)->y;

    $abono = Abono::create([
    'id' => $this->generarUUID(),
    'abonado' => $request->nombre . ' ' . $request->apellidos . ' - ' . $request->dni,
    'edad' => $edad,
    'telefono' => $request->telefono,
    'cuenta_bancaria' => $request->cuenta_bancaria,
    'tipo' => $request->tipo,
    'asiento' => $this->generarCodigoAsiento($request->tipo),
    'precio' => $this->calcularPrecioFinal($request->tipo, $edad)
    ]);
        return redirect()->route('abonos.show', ['id' => $abono->id])->with('success', 'Noticia creada correctamente.');
    }

    public function show($id)
    {
        $abono = Abono::find($id);
        $edad = $abono->edad;
        
        $tarifaEspecial = '';
        if ($edad < 12) {
            $tarifaEspecial = 'Sí (Descuento: 80€)';
        } elseif ($edad > 65) {
            $tarifaEspecial = 'Sí (Descuento: 50%)';
        } else {
            $tarifaEspecial = 'No aplica';
        }
        
        return view('abonos.show', compact('abono', 'tarifaEspecial'));
    }
    
    private function calcularPrecioFinal($tipoId, $edad)
{
    $tipo = TipoAbono::find($tipoId);

    if (!$tipo) {
        return 0;
    }

    $precioBase = $tipo->precio;

    if ($edad < 12) {
        return max($precioBase - 80, 0);
    }

    if ($edad > 65) {
        return $precioBase * 0.5;
    }

    return $precioBase;
}


    private static function generarUUID() { //genera un UUID el cual es unico
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

    private function generarCodigoAsiento($tipoId){
    $letras = [
        'tribuna' => 'T',
        'preferencia' => 'P',
        'fondo' => 'F'
    ];

    //obtiene el tipo desde la base de datos
    $tipo = TipoAbono::find($tipoId);

    $descripcion = $tipo ? strtolower(trim($tipo->descripcion)) : '';
    $letraAbono = $letras[$descripcion] ?? 'X';

    $bloque = rand(1, 5);

    $fila = rand(0, 29);
    $filaFormato = str_pad($fila, 2, '0', STR_PAD_LEFT);

    $asientosMax = 140 + ($fila * 2);
    $asiento = rand(0, $asientosMax - 1);
    $asientoFormato = str_pad($asiento, 3, '0', STR_PAD_LEFT);

    return $letraAbono . 'B' . $bloque . '/F' . $filaFormato . '-A' . $asientoFormato;
}
}
?>