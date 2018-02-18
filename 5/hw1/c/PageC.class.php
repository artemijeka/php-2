<?php
/**
 * @author Артем Кузнецов <artem.kuznecov.samara@gmail.com>
 */
class PageC extends BaseC
{
    public function read()
    {
        $this -> title .= 'Чтение';
        $text = Text::textGet();
    }
}