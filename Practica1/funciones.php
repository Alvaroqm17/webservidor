<?php
function esPrimo($numero)
{
    if (!is_numeric($numero))
        //Comprobamos si es un número valido, ya que sino nos dara un error 500. 
        return false;

    for ($i = 2; $i < $numero; $i++) {

        if (($numero % $i) == 0) {
            return false;
        }
    }
    return true;
}
function dniValido($dni)
    {


        for ($i = 0; $i < 9; $i++) {
            if ($i >= 0 && $i < 8) {
                if (!is_numeric(substr($dni, 0, 8))) {
                    return false;
                }
            } else if ($i == 8) {
                $letraNUM = (substr($dni, 0, 8) % 23);
                if ($letraNUM >= 0 && $letraNUM <= 22) {
                    $letra = match ($letraNUM) {
                        0 => 'T',
                        1 => 'R',
                        2 => 'W',
                        3 => 'A',
                        4 => 'G',
                        5 => 'M',
                        6 => 'Y',
                        7 => 'F',
                        8 => 'P',
                        9 => 'D',
                        10 => 'X',
                        11 => 'B',
                        12 => 'N',
                        13 => 'J',
                        14 => 'Z',
                        15 => 'S',
                        16 => 'Q',
                        17 => 'V',
                        18 => 'H',
                        19 => 'L',
                        20 => 'C',
                        21 => 'K',
                        22 => 'E',
                    };
                    if ($letra[0] == strtoupper($dni[$i])) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
                return true;
            } else {
                return false;
            }
        }
    }
