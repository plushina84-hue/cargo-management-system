<?php

namespace App\Notifications;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;



class CargoAssignedNotification extends Notification
{

    use Queueable;



    public $cargo;



    public function __construct($cargo)
    {

        $this->cargo = $cargo;

    }





    public function via($notifiable)
    {

        return ['database'];

    }






    public function toDatabase($notifiable)
    {

        return [

            'message' => 
            'New cargo assigned: '.$this->cargo->tracking_number,

            'cargo_id' => $this->cargo->id,

        ];

    }



}
