<?php
/**
 *
 * Tests/LimitQueryTest.php
 *
 * @package ruhulfbr/excelq
 * @author Md Ruhul Amin (ruhul11bd@gmail.com) <https://github.com/ruhulfbr>
 *
 */

namespace Ruhul\ExcelQuery\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use Ruhul\ExcelQuery\EXLQ;

class LimitQueryTest extends TestCase
{
    private string $_filePath = "Tests/files/data.xls";

    /**
     * @test Expect 3 Item of results
     * @throws Exception
     */
    public function it_shouldGetResultsWithLimit()
    {
        $results = EXLQ::from($this->_filePath)->limit(3)->get();
        $this->assertCount(3, $results);
    }

    /**
     * @test Expect 3 Item of results from index 2
     * @throws Exception
     */
    public function it_shouldGetResultsWithLimitAndOffset()
    {
        $results = EXLQ::from($this->_filePath)->limit(2, 1)->get();
        $this->assertCount(2, $results);
    }

    /**
     * @test Expect 0 Item of results with limit offset
     * @throws Exception
     */
    public function it_shouldGetZeroItemResultsWithLimitAndOffset()
    {
        $results = EXLQ::from($this->_filePath)->limit(200, 100)->get();
        $this->assertCount(0, $results);
    }

}
