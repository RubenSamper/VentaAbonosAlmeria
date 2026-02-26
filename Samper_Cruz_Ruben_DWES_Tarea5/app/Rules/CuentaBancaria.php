<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CuentaBancaria implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $iban = strtoupper(trim((string) $value));
        $iban = str_replace(['-', ' '], '', $iban);

        // if (!preg_match('/^ES\d{22}$/', $iban)) {
        //     $fail('El formato del IBAN no es válido.');
        //     return;
        // }

        $ibanReordenado = substr($iban, 4) . substr($iban, 0, 4);

        $Chars = [];
        foreach (range('A', 'Z') as $i => $letter) {
            $Chars[$letter] = (string) (10 + $i);
        }

        $ibanNumerico = '';
        foreach (str_split($ibanReordenado) as $c) {
            $ibanNumerico .= ctype_alpha($c) ? $Chars[$c] : $c;
        }

        $valido = true;

        if (function_exists('bcmod')) {
            if (bcmod($ibanNumerico, '97') != 1) {
                $valido = false;
            }
        } else {
            $mod = 0;
            $numero = $ibanNumerico;

            while (strlen($numero) > 0) {
                $block = substr($numero, 0, 9);
                $numero = substr($numero, 9);
                $mod = intval((string)$mod . $block) % 97;
            }

            if ($mod != 1) {
                $valido = false;
            }
        }

        if (!$valido) {
            $fail('El IBAN no es válido.');
        }
    }
}
