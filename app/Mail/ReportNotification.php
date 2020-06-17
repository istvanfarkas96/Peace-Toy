<?php


namespace App\Mail;

use Illuminate\Mail\Mailable;

class ReportNotification extends Mailable
{
    protected $review;
    protected $user;

    /**
     * ReportNotification constructor.
     * @param $review
     * @param $user
     */
    public function __construct($review, $user)
    {
        $this->review = $review;
        $this->user = $user;
    }

    public function build()
    {
        $this->from(config('mail.from'));
        return $this->view('mail.report')
            ->with([
                'review' => $this->review,
                'user' => $this->user
            ]);

    }
}