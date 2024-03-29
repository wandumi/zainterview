<?php

if (!function_exists('timeFormat')) {
    function timeFormat($durationInSeconds)
    {
        $minutes = floor((int) $durationInSeconds / 60);
        $seconds = (int) $durationInSeconds % 60;

        return sprintf('%d:%02d', $minutes, $seconds);
    }
}