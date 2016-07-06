<?php

namespace App;

class Ackermann
{
    protected static $cachedValues = [];

    /**
     * Calculate ackermann's function using memorization
     * @param $m
     * @param $n
     * @return int
     */
    public function compute($m, $n)
    {
        //lookup cache
        if (isset(self::$cachedValues[$m][$n])) {
            return self::$cachedValues[$m][$n];
        }
        
        if ($m == 0) {
            $result =  $n + 1;
        } elseif ($m == 1) {
            $result = $n + 2;
        } elseif ($m == 2) {
            $result = (2 * $n) + 3;
        } elseif ($m == 3) {
            $result = pow(2, $n+3) -3;
        } elseif ($n == 0) {
            $result = self::compute($m-1, 1);
        } else {
            $result = self::compute($m-1, self::compute($m, $n-1));
        }
        
        //cache results
        self::$cachedValues[$m][$n] = $result;

        return $result;
    }
}
