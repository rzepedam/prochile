<?php

namespace ProChile\Http\Helpers;

class Helper
{
    public static function rut($rut)
    {
        $rutTmp = explode('-', $rut);

        return number_format($rutTmp[0], 0, '', '.') . '-' . $rutTmp[1];
    }
}