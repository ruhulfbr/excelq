<?php

/**
 *
 * src/Closure/Conditions/GreaterThanDate.php
 *
 * @package ruhulfbr/excelq
 * @author Md Ruhul Amin (ruhul11bd@gmail.com) <https://github.com/ruhulfbr>
 *
 */

namespace Ruhul\ExcelQuery\Closure\Conditions;

class GreaterThanDate implements ClosureInterface
{
    /**
     * @param $value
     * @param $valueToCompare
     * @param null $dateFormat
     * @return bool
     */
    public function match($value, $valueToCompare, $dateFormat = null): bool
    {
        $valueDate = \DateTimeImmutable::createFromFormat(($dateFormat) ?: 'Y-m-d', $value);
        $valueToCompareDate = \DateTimeImmutable::createFromFormat(($dateFormat) ?: 'Y-m-d', $valueToCompare);

        return $valueDate > $valueToCompareDate;
    }
}
