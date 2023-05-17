<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShipmentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $shipment;

    public function __construct($shipment)
    {
        $this->shipment = $shipment;
    }

    public function build()
    {
        return $this->view('admin.emails.shipment-confirmation')
                    ->subject('Shipment Confirmation');
    }
}
