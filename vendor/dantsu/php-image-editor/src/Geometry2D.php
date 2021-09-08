<?php

namespace DantSu\PHPImageEditor;

class Geometry2D
{
    public static function degrees0to360($angle)
    {
        while ($angle < 0 || $angle >= 360) {
            if ($angle < 0) $angle += 360;
            elseif ($angle >= 360) $angle -= 360;
        }
        return $angle;
    }

    public static function getDstXY($originX, $originY, $angle, $length)
    {
        $angle = 360 - $angle;
        return [
            'x' => round($originX + cos($angle * M_PI / 180) * $length),
            'y' => round($originY + sin($angle * M_PI / 180) * $length)
        ];
    }

    public static function getAngleAndLengthFromPoints($originX, $originY, $dstX, $dstY)
    {
        $sizeX = $dstX - $originX;
        $sizeY = $dstY - $originY;
        $diameter = sqrt(pow($sizeX, 2) + pow($sizeY, 2));
        $sinY = $sizeY / $diameter + 0.001;

        return [
            'angle' => 360 - round((360 + acos($sizeX / $diameter) * 180.0 / M_PI * $sinY / abs($sinY)) % 360),
            'length' => $diameter
        ];
    }
}
