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
     * Detect date format
     * @param string $date
     * @return string|bool
     */
    public static function detectDateTimeFormat(string $date)
    {
        // List of all supported separators (add all you need)
        $ds = ['-', '/', ' '];
        // List of all supported formats (add your own if needed)
        $fs = [
            'Y[-]m[-]d H:i:s',
            'Y[-]m[-]d H:i',
            'Y[-]m[-]d',
            'Y[-]m',
            'Y',
            'd[-]m[-]Y H:i:s',
            'd[-]m[-]Y H:i',
            'd[-]m[-]Y',
            'd[-]m',
            'd',
            'm[-]Y H:i:s',
            'm[-]Y H',
            'm[-]Y',
            'm',
            'H:i:s',
            'H:i',
            'H',
        ];

        foreach ($fs as $f) {
            foreach ($ds as $sep) {
                $format = str_replace('[-]', $sep, $f);
                $d = Carbon::createFromFormat($format, $date);
                if ($d && $d->format($format) == $date) {
                    return $format;
                }
            }
        }

        return false;
    }

    public static function customDateFormat($date, $format = 'd F Y H:i')
    {
        $f = self::detectDateTimeFormat($date);
        if ($format) {
            return Carbon::createFromFormat($f, $date)->format($format);
        }
        return false;
    }
}
