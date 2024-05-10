<?php

/**
 * src/Exceptions/InvalidFilePathException.php
 *
 * @package ruhulfbr/excelq
 * @author Md Ruhul Amin (ruhul11bd@gmail.com)
 */

namespace Ruhul\ExcelQuery\Exceptions;

class InvalidFilePathException extends \Exception
{
    public function __construct(string $message = "Invalid File Path")
    {
        parent::__construct($message);
    }
}
