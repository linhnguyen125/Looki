<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CheckoutMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.checkout_mail')
            ->from('hethongcntt.unitop@gmail.com', 'Looki - Beautiful And Cosmetics')
            ->subject('[Looki.com] Xác Nhận Đơn Đặt Hàng')
            ->with($this->data);
    }
}
