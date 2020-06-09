<?php

namespace App\Controllers;
use Core\View;
use Email;


class RequestController
{
    public function index():void
    {
        View::show('index.php');
    }

    public function store():void
    {
        $email = $_POST['email'];
        $sum = $_POST['sum'];

        database()->insert('applications', [
            'email' => $email,
            'sum' => $sum,
        ]);

        $requests = database()->select('applications', '*');
        $lastId = (end($requests))['id'];

        if ($sum > 5000) {
            database()->insert('deals', [
                'application_id' => $lastId,
                'status' => 'ask',
                'partner' => 'A',
            ]);

            //Send an e-mail to partner A
//            $mailPartnerA = new Email();
//            $mailPartnerA->sendMail('A@example.com');


        } else {
            database()->insert('deals', [
                'application_id' => $lastId,
                'status' => 'ask',
                'partner' => 'B',
            ]);

            //Send an e-mail to partner B
//            $mailPartnerA = new Email();
//            $mailPartnerA->sendMail('B@example.com');
        }

        header('Location: /');
    }
}