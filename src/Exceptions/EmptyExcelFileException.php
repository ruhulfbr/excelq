<?php

/**
 * src/Exceptions/EmptyExcelFileException.php
 *
 * @package ruhulfbr/excelq
 * @author Md Ruhul Amin (ruhul11bd@gmail.com)
 */

namespace Ruhul\ExcelQuery\Exceptions;

class EmptyExcelFileException extends \Exception
{
    public function __construct(string $message = "The Excel file is empty.")
    {
        parent::__construct($message);
    }
}
