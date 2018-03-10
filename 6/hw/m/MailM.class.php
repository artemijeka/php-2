<?php

class MailM
{
    /**
     * @param $name_from имя отправителя
     * @param $email_from email отправителя
     * @param $name_to имя получателя
     * @param $email_to email получателя
     * @param $data_charset кодировка переданных данных
     * @param $send_charset кодировка письма
     * @param $subject тема письма
     * @param $body текст письма
     * @param bool $html письмо в виде html или обычного текста
     * @param bool $reply_to
     * @return bool
     */
    public function sendMimeMail($name_from, // имя отправителя
                                   $email_from, // email отправителя
                                   $name_to, // имя получателя
                                   $email_to, // email получателя
                                   $data_charset, // кодировка переданных данных
                                   $send_charset, // кодировка письма
                                   $subject, // тема письма
                                   $body, // текст письма
                                   $html = FALSE, // письмо в виде html или обычного текста
                                   $reply_to = FALSE
    ) {
        $to = mime_header_encode($name_to, $data_charset, $send_charset)
            . ' <' . $email_to . '>';
        $subject = mime_header_encode($subject, $data_charset, $send_charset);
        $from =  mime_header_encode($name_from, $data_charset, $send_charset)
            .' <' . $email_from . '>';
        if($data_charset != $send_charset) {
            $body = iconv($data_charset, $send_charset, $body);
        }
        $headers = "From: $from\r\n";
        $type = ($html) ? 'html' : 'plain';
        $headers .= "Content-type: text/$type; charset=$send_charset\r\n";
        $headers .= "Mime-Version: 1.0\r\n";
        if ($reply_to) {
            $headers .= "Reply-To: $reply_to";
        }
        return mail($to, $subject, $body, $headers);
    }



    /**
     * @param $str
     * @param $data_charset
     * @param $send_charset
     * @return string
     */
    public function mime_header_encode($str, $data_charset, $send_charset) {
        if($data_charset != $send_charset) {
            $str = iconv($data_charset, $send_charset, $str);
        }
        return '=?' . $send_charset . '?B?' . base64_encode($str) . '?=';
    }



}