<?php

namespace Hackathon\LevelC;

class RotationString
{
    /**
     * @TODO ! BAM
     *
     * @param $s1
     * @param $s2
     *
     * @return bool|int
     */
    public static function isRotation($s1, $s2)
    {
        return self::isSubString($s1 . $s1, $s2);
    }

    public static function isSubString($s1, $s2)
    {
        $pos = strpos($s1, $s2);

        return $pos;
    }
}
