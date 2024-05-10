<?php

require_once 'vendor/autoload.php';

use Ruhul\ExcelQuery\EXLQ;

try {
    $result = EXLQ::from(__DIR__ . "/example.xls")
            ->select('id', 'name')
            ->orderBy('id', 'desc')
            ->get();

} catch (\Exception $e) {
    $result = $e->getMessage();
}

pr($result);