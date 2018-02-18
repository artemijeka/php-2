<?php
/**
 * @description Класс работы с текстом.
 */
class Text
{
    public static function textGet()
    {
        return file_get_contents('data/text.txt');
    }

    public static function textSet($text)
    {
        file_put_contents('data/text.txt', $text);
    }
}
