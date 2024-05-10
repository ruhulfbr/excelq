<?php

/**
 * src/Exceptions/FileTypeNotAllowedException.php
 *
 * @package ruhulfbr/excelq
 * @author Md Ruhul Amin (ruhul11bd@gmail.com)
 */

namespace Ruhul\ExcelQuery\Exceptions;

class FileTypeNotAllowedException extends \Exception
{
    public function __construct(string $message = "Only Excel files are allowed")
    {
        parent::__construct($message);
    }
}
