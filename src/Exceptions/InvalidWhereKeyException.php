<?php

/**
 * src/Exceptions/InvalidWhereKeyException.php
 *
 * @package ruhulfbr/excelq
 * @author Md Ruhul Amin (ruhul11bd@gmail.com)
 */

namespace Ruhul\ExcelQuery\Exceptions;

class InvalidWhereKeyException extends \Exception
{
    public function __construct(string $message = "Invalid array key exception")
    {
        parent::__construct($message);
    }
}
