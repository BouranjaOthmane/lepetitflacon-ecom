<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminNewOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Order $order)
    {
        //
    }

    public function build()
    {
        $this->order->load(['user', 'items.product']);

        return $this->subject('Nouvelle commande - #' . $this->order->order_number)
            ->view('emails.admin-new-order');
    }
}