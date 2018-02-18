<?php
/**
 * @Description: Класс работы с текстом.
 */
class TextM
{
    /**
     * @Description: Возвращает контент из data/text.txt
     */
    public static function textGet()
    {
        return file_get_contents('data/text.txt');
    }
    
    /**
     * @Description: Вставляет строку переданную в параметре в конец файла data/text.txt
     * @param type $text 'string'
     */
    public static function textSet($text)
    {
        file_put_contents('data/text.txt', $text);
    }
}
