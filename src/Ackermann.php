<?php

namespace App;

class Ackermann
{
    /**
     * Store calculated values
     * @var array
     */
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

        switch ($m) {

            //using formula for lower values of m
            case 0:
                $result =  $n + 1;
                break;
            case 1:
                $result = $n + 2;
                break;
            case 2:
                $result = (2 * $n) + 3;
                break;
            case 3:
                $result = pow(2, $n+3) -3;
                break;
            default:
                if ($n == 0) {
                    $result = $this->compute($m-1, 1);
                } else {
                    $result = $this->compute($m-1, $this->compute($m, $n-1));
                }
        }

        //cache results
        self::$cachedValues[$m][$n] = $result;

        return $result;
    }
    
    /**
     * Calculating Acermann function without using recursion
     * @param $m
     * @param $n
     * @return mixed
     */
    public function nonRecursiveCompute($m, $n)
    {
        //looping through each value of m and n starting at 0,0
        for ($i=0; $i <= $m; $i++) {
            for ($j = 0; $j <= $n; $j++) {
                switch ($i) {
                    //using formula for lower values of m
                    case 0:
                        self::$cachedValues[$i][$j] =  $j + 1;
                        break;
                    case 1:
                        self::$cachedValues[$i][$j] = $j + 2;
                        break;
                    case 2:
                        self::$cachedValues[$i][$j] = (2 * $j) + 3;
                        break;
                    case 3:
                        self::$cachedValues[$i][$j] = pow(2, $j+3) -3;
                        break;
                    default:
                        if ($j == 0) {
                            self::$cachedValues[$i][$j] = self::$cachedValues[($i-1)][1];
                        } else {
                            self::$cachedValues[$i][$j] = self::$cachedValues[$i-1][self::$cachedValues[$i][$j-1]];
                        }
                        break;
                }
            }
        }
        return self::$cachedValues[$m][$n];
    }
}
