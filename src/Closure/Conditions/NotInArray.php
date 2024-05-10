<?php

/**
 *
 * src/Closure/Conditions/NotInArray.php
 *
 * @package ruhulfbr/excelq
 * @author Md Ruhul Amin (ruhul11bd@gmail.com) <https://github.com/ruhulfbr>
 *
 */

namespace Ruhul\ExcelQuery\Closure\Conditions;


class NotInArray implements ClosureInterface
{
    /**
     * @param $value
     * @param $valueToCompare
     * @param null $dateFormat
     * @return bool
     */
    public function match($value, $valueToCompare, $dateFormat = null): bool
    {
        return !in_array($value, $valueToCompare);
    }
}
