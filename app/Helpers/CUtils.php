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

    /**
     * Normalize YouTube link to embed format
     * @param string $url
     * @return string|null
     */
    public static function normalizeYouTubeLink($url)
    {
        // Nếu URL là dạng rút gọn: youtu.be/VIDEO_ID
        if (preg_match('/youtu\.be\/([^\?&]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        // Nếu URL là dạng đầy đủ: youtube.com/watch?v=VIDEO_ID
        if (preg_match('/v=([^\?&]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        // Nếu URL là dạng embed sẵn rồi: youtube.com/embed/VIDEO_ID
        if (preg_match('/embed\/([^\?&]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        // Nếu không match, trả lại null
        return null;
    }

}
