<?php

/**
 * src/Exceptions/InvalidLimitParamException.php
 *
 * @package ruhulfbr/excelq
 * @author Md Ruhul Amin (ruhul11bd@gmail.com)
 */

namespace Ruhul\ExcelQuery\Exceptions;

class InvalidLimitParamException extends \Exception
{
    public function __construct(string $message = "Invalid array limit params")
    {
        parent::__construct($message);
    }
}
