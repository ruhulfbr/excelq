<?php
/**
 *
 * Tests/SortingQueryTest.php
 *
 * @package ruhulfbr/excelq
 * @author Md Ruhul Amin (ruhul11bd@gmail.com) <https://github.com/ruhulfbr>
 *
 */

namespace Ruhul\ExcelQuery\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use Ruhul\ExcelQuery\EXLQ;
use Ruhul\ExcelQuery\Exceptions\InvalidSortingKeyException;
use Ruhul\ExcelQuery\Exceptions\InvalidSortingOperatorException;
use Ruhul\ExcelQuery\Exceptions\MultipleSortingOperationException;

class SortingQueryTest extends TestCase
{
    private string $_filePath = "Tests/files/data.xls";

    /**
     * @test Expect Exception InvalidSortingKeyException
     * @throws Exception
     */
    public function it_ThrowInvalidSortingKeyException()
    {
        $key = "ages";
        $message = "Invalid ordering/sorting operation key: `" . $key . "`.";

        $this->expectException(InvalidSortingKeyException::class);
        $this->expectExceptionMessage($message);

        EXLQ::from($this->_filePath)->orderBy($key, 'desc');
    }

    /**
     * @test Expect Exception InvalidSortingOperatorException
     * @throws Exception
     */
    public function it_ThrowInvalidSortingOperatorException()
    {
        $operator = "<===>";
        $message = "Invalid ordering/sorting operator: `" . $operator . "`.";

        $this->expectException(InvalidSortingOperatorException::class);
        $this->expectExceptionMessage($message);

        EXLQ::from($this->_filePath)->orderBy('id', $operator);
    }

    /**
     * @test Expect Exception MultipleSortingOperationException
     * @throws Exception
     */
    public function it_ThrowMultipleSortingOperationException()
    {
        $message = "Multiple ordering/sorting operations are not allowed.";

        $this->expectException(MultipleSortingOperationException::class);
        $this->expectExceptionMessage($message);

        EXLQ::from($this->_filePath)->orderBy('id', 'desc')->orderBy('age', 'asc');
    }

    /**
     * @test Expect results Sorting ASC
     * @throws Exception
     */
    public function it_shouldGetResultsSortedAsAscending()
    {
        $results = EXLQ::from($this->_filePath)->orderBy('id', 'asc')->get();

        $this->assertEquals(1, $results[0]['id']);
        $this->assertEquals('Allis', $results[0]['name']);
    }

    /**
     * @test Expect results Sorting DESC
     * @throws Exception
     */
    public function it_shouldGetResultsSortedAsDescending()
    {
        $results = EXLQ::from($this->_filePath)->orderBy('id', 'DESC')->get();

        $this->assertEquals(20, $results[0]['id']);
        $this->assertEquals('Ethan Hernandez', $results[0]['name']);
    }

    /**
     * @test Expect latest results
     * @throws Exception
     */
    public function it_shouldGetColumnWiseLatestResults()
    {
        $results = EXLQ::from($this->_filePath)->latest()->get();

        $this->assertEquals(20, $results[0]['id']);
        $this->assertEquals('Ethan Hernandez', $results[0]['name']);
    }

    /**
     * @test Expect Oldest results
     * @throws Exception
     */
    public function it_shouldGetColumnWiseOldestResults()
    {
        $results = EXLQ::from($this->_filePath)->oldest()->get();

        $this->assertEquals(1, $results[0]['id']);
        $this->assertEquals('Allis', $results[0]['name']);
    }

}
