<?php

/**
 *
 * src/Closure/Conditions/StartsWith.php
 *
 * @package ruhulfbr/excelq
 * @author Md Ruhul Amin (ruhul11bd@gmail.com) <https://github.com/ruhulfbr>
 *
 */

namespace Ruhul\ExcelQuery\Closure\Conditions;

class StartsWith implements ClosureInterface
{
    /**
     * @param $value
     * @param $valueToCompare
     * @param null $dateFormat
     * @return bool
     */
    public function match($value, $valueToCompare, $dateFormat = null): bool
    {
        $valueToCompareLength = strlen($valueToCompare);
        $valueHead = substr($value, 0, $valueToCompareLength);

        return $valueToCompare === $valueHead;
    }
}
