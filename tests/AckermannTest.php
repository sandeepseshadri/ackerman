<?php


use PHPUnit\Framework\TestCase;

class AckermannTest extends TestCase
{
    public function setUp()
    {
        $this->ackermann = new App\Ackermann();
    }

    /**
     * @test
     * @dataProvider sampleData
     * @param $m
     * @param $n
     * @param $expected
     */
    public function it_returns_computed_value($m, $n, $expected)
    {
        $result = $this->ackermann->compute($m, $n);
        $this->assertEquals($expected, $result);
    }
    
    /**
     * @return array
     */
    public function sampleData()
    {
        return [
            [1,1, 3],
            [3, 0, 5],
            [3,1, 13],
            [3,2, 29],
            [3,3, 61],
            [3, 4, 125]
        ];
    }
}
