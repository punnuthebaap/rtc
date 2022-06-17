<?php defined('BASEPATH') OR exit('No direct script access allowed');


        $config = array(
            'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
            'smtp_host' => 'smtp.googlemail.com', 
            'smtp_port' => 465,
            'smtp_user' => 'nihalpunnu2129@gmail.com',
            'smtp_pass' => 'Nihal@2129',
            'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
            'mailtype' => 'html', //plaintext 'text' mails or 'html'
            'smtp_timeout' => '4', //in seconds
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
// $config = Array(
//     'protocol' => 'smtp',
//     'smtp_host' => 'smtp.googlemail.com',//mail.rtccbseranchi.org
//     'smtp_port' => 465,//587
//     'smtp_user' => 'nihalpunnu2129@gmail.com',
//     'smtp_pass' => 'Nihal@2129',
//     'mailtype'  => 'html', 
//     'charset'   => 'iso-8859-1'
// );