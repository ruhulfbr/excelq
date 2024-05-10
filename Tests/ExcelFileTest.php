<?php
/**
 *
 * Tests/ExcelFileTest.php
 *
 * @package ruhulfbr/excelq
 * @author Md Ruhul Amin (ruhul11bd@gmail.com) <https://github.com/ruhulfbr>
 *
 */

namespace Ruhul\ExcelQuery\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use Ruhul\ExcelQuery\Exceptions\InvalidFilePathException;
use Ruhul\ExcelQuery\EXLQ;
use Ruhul\ExcelQuery\Exceptions\EmptyExcelFileException;
use Ruhul\ExcelQuery\Exceptions\EmptyExcelHeaderException;
use Ruhul\ExcelQuery\Exceptions\FileTypeNotAllowedException;

class ExcelFileTest extends TestCase
{
    /**
     * @test Expect Exception InvalidFilePathException
     * @throws Exception
     */
    public function it_ThrowExceptionInvalidFilePath()
    {
        $filePath = 'Tests/files/data/non_existent_file.xls';

        $this->expectException(InvalidFilePathException::class);
        $this->expectExceptionMessage("Invalid or unreadable file path: " . $filePath);

        EXLQ::from($filePath);
    }

    /**
     * @test Expect Exception FileTypeNotAllowedException
     * @throws Exception
     */
    public function it_ThrowExceptionFileTypeNotAllowed()
    {
        $filePath = 'Tests/files/data.json';

        $this->expectException(FileTypeNotAllowedException::class);
        $this->expectExceptionMessage("File type not allowed: json");

        EXLQ::from($filePath);
    }

    /**
     * @test Expect Exception EmptyExcelHeaderException
     * @throws Exception
     */
    public function it_ThrowEmptyExcelHeaderException()
    {
        $filePath = 'Tests/files/data-empty-header.xls';

        $this->expectException(EmptyExcelHeaderException::class);
        $this->expectExceptionMessage("Excel header is empty, the first row consider as header/columns. `" . $filePath . "`");

        EXLQ::from($filePath);
    }

    /**
     * @test Expect Exception EmptyExcelFileException
     * @throws Exception
     */
    public function it_ThrowExceptionEmptyExcelFile()
    {
        $filePath = 'Tests/files/data-empty.xls';

        $this->expectException(EmptyExcelFileException::class);
        $this->expectExceptionMessage("No data found in the Excel file. `" . $filePath . "`");

        EXLQ::from($filePath);
    }
}
