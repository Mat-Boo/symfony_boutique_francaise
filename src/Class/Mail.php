<?php

namespace App\Class;
use Mailjet\Resources;
use Mailjet\Client;

class Mail
{
    private $api_key='dc6c71c187ead2b62255af1cc2c2c703';
    private $api_key_secret='77bda88960dbf434628c4f8b9498ce45';

    public function send($to_email, $to_name, $subject, $content)
    {
        
        /* $mj = new Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'),true,['version' => 'v3.1']); */
        $mj = new Client($this->api_key, $this->api_key_secret,true,['version' => 'v3.1']);

        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "mathieubouthors@hotmail.com",
                        'Name' => "La Boutique Française"
                    ],
                    'To' => [
                        [
                            'Email' => $to_email,
                            'Name' => $to_name
                        ]
                    ],
                    'TemplateID' => 4129346,
                    'TemplateLanguage' => true,
                    'Subject' => $subject,
                    'Variables' => [
                        'content' => $content
                    ]
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
    }

}