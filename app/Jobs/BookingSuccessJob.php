<?php

namespace App\Jobs;

use App\Mail\BookingSuccess;
use App\Mail\NewReservation;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class BookingSuccessJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $user;
    public $details;
    public $admindetails;
    public function __construct($user,$details, $admindetails)
    {
        $this->user = $user;
        $this->details = $details;
        $this->admindetails = $admindetails;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       
        Mail::to($this->user['email'])->send(new BookingSuccess($this->details));
        Mail::to('contact@vambleapartments.com')->send(new NewReservation($this->admindetails));

    }
}
