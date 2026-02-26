<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class FechaNacimiento implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $fecha = trim((string) $value);
        
        $fechaObj = \DateTime::createFromFormat('d/m/Y', $fecha);
            
        if (!$fechaObj || $fechaObj->format('d/m/Y') !== $fecha) {
            $fail('La fecha de nacimiento no es válida.');
            }
            
            $fechaHoy = new \DateTime();
            $edad = $fechaObj->diff($fechaHoy)->y;
            
            if ($edad < 4) {
                $fail('El aficionado debe tener al menos 4 años..');
            }
            
            if ($edad > 85) {
                $fail('El aficionado no puede tener más de 85 años..');
            }
    }
}