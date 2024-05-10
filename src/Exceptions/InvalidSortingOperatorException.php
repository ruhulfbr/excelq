<?php

/**
 * src/Exceptions/InvalidSortingOperatorException.php
 *
 * @package ruhulfbr/excelq
 * @author Md Ruhul Amin (ruhul11bd@gmail.com)
 */

namespace Ruhul\ExcelQuery\Exceptions;

class InvalidSortingOperatorException extends \Exception
{
    public function __construct(string $message = "Invalid sorting operator")
    {
        parent::__construct($message);
    }
}
