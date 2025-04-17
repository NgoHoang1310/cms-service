<?php
namespace App\Helpers;
use Carbon\Carbon;

class CUtils
{
    /**
     * Format UNIX timestamp
     * @param $timestamp
     * @param string $format
     * @return string
    **/
    public static function format_unix_timestamp($timestamp, string $format = 'd/m/Y H:i:s'): string
    {
        if(empty($timestamp)) {
            return 'Không có';
        }
        $timestampSec = intval($timestamp / 1000);
        return Carbon::createFromTimestamp($timestampSec)->setTimezone('Asia/Ho_Chi_Minh')->format($format);
    }

    public static function format_date($date, string $format = 'd/m/Y'): string
    {
        if(empty($date)) {
            return 'Không có';
        }
        return $date->format($format);
    }
}
