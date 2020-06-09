<?php

namespace App\Controllers;

use Core\View;
use Email;


class DealStatusController
{

    public function index():void
    {
        View::show('status.php');
    }

    public function update():void
    {
        //Update deal status to an offer
        $dealId = $_POST['dealId'];

        database()->update("deals", [
            "status" => "offer"
        ], [
            "id[=]" => $dealId
        ]);

        //Send an e-mail to the person, that requested an offer
        $clientEmail = database()->select(
            'deals',
            ['[><]applications' => ['application_id' => 'id']],
            ['applications.email'],
            ['deals.id ' => 32]
        );

//        $mailPartnerA = new Email();
//        $mailPartnerA->sendMail($clientEmail[0]['email']);

        header('Location: /status');
    }
}