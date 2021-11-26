<?php
defined('BASEPATH') or exit('No direct script access allowed');

if( ! function_exists('send_mail') )
{
  function send_mail($to,$subject,$template,$attachment="",$cc="")
  {
    $CI =& get_instance();

          $CI->email->initialize(array(
                // 'protocol'  => 'smtp',
                // 'smtp_host' => 'ssl://smtp.gmail.com',
                // 'smtp_user' => 'vaalshipping@gmail.com',
                // 'smtp_pass' => 'vaalshipping123456',
                // 'smtp_port' => 465,
                // 'mailtype'  => 'html',
                // 'crlf'      => "\r\n",
                // 'newline'   => "\r\n"
        'protocol'  => 'mail',
                'smtp_host' => 'mail.gmail.com',
                'smtp_user' => 'maplebrainsca@gmail.com',
                'smtp_pass' => 'Mavrin@2007',
                'smtp_port' => 25,
                'mailtype'  => 'html',
                'crlf'      => "\r\n",
                'newline'   => "\r\n",
            ));


          $CI->email->from('maplebrainsca@gmail.com',strtoupper('AL-AKARIA'));
          $CI->email->to($to);
      if($cc){
        $CI->email->cc($cc);
      }
          $CI->email->subject($subject);
          $CI->email->message($template);

          if($attachment!='')
          {
            $CI->email->attach($attachment);
          }


          $result = $CI->email->send();

          if($result)
          {
            return true;
          }
          else
          {
            return false;
          }


  }
}
