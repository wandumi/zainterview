<?php

if (!function_exists('timeFormat')) {
    function timeFormat($durationInSeconds): string
    {
        $minutes = floor((int) $durationInSeconds / 60);
        $seconds = (int) $durationInSeconds % 60;

        return sprintf('%d:%02d', $minutes, $seconds);
    }
}
