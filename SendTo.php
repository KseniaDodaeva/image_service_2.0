<?php


namespace image;


class SendTo
{
    public static function SendTo(string $file)
    {
        header('Location: '.$file);
        exit;
    }
}