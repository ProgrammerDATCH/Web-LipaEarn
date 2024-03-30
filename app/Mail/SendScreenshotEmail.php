<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendScreenshotEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $screenshotPath;

    /**
     * Create a new message instance.
     *
     * @param array  $data
     * @param string $screenshotPath
     */
    public function __construct($data, $screenshotPath)
    {
        $this->data = $data;
        $this->screenshotPath = $screenshotPath;
    }

    public function build()
    {
        return $this->view('email.screenshot')
            ->attach(public_path('storage/' . $this->screenshotPath), [
                'as' => 'screenshot.jpg',
                'mime' => 'image/jpeg',
            ]);
    }
}
