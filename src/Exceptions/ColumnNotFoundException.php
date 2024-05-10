<?php

/**
 * src/Exceptions/ColumnNotFoundException.php
 *
 * @package ruhulfbr/excelq
 * @author Md Ruhul Amin (ruhul11bd@gmail.com)
 */

namespace Ruhul\ExcelQuery\Exceptions;

class ColumnNotFoundException extends \Exception
{
    public function __construct(string $message = "Column Not found")
    {
        parent::__construct($message);
    }
}
