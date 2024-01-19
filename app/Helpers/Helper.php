<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;

/**
 * Class Helper
 * This class is used to store own helper functions that can be used in the whole application using the Helper::functionName() syntax.
 * @package App\Helpers
 */
class Helper
{

    /**
     * This function is used to convert a date to a custom format.
     * @param string $date
     * @param string $format
     * @return string|bool
     */
    public static function customDateFormat($date, $format = 'd F Y H:i')
    {
        $parsed_date = Carbon::parse($date);
        if (!is_null($date) && $parsed_date->isValid())
            return $parsed_date->format($format);

        return null;
    }
}
