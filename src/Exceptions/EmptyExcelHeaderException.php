<?php

/**
 * src/Exceptions/EmptyExcelHeaderException.php
 *
 * @package ruhulfbr/excelq
 * @author Md Ruhul Amin (ruhul11bd@gmail.com)
 */

namespace Ruhul\ExcelQuery\Exceptions;

class EmptyExcelHeaderException extends \Exception
{
    public function __construct(string $message = "The Excel file header is empty.")
    {
        parent::__construct($message);
    }
}