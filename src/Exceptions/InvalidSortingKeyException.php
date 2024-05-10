<?php

/**
 * src/Exceptions/InvalidSortingKeyException.php
 *
 * @package ruhulfbr/excelq
 * @author Md Ruhul Amin (ruhul11bd@gmail.com)
 */

namespace Ruhul\ExcelQuery\Exceptions;

class InvalidSortingKeyException extends \Exception
{
    public function __construct(string $message = "Invalid sorting/ordering key exception")
    {
        parent::__construct($message);
    }
}