<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\ActivationEmail;
class sendVerificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $member;

    public function __construct($member)
    {
        //
        $this->member = $member;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $email = new ActivationEmail($this->member);
        // $data = array('name' => "Virat Gandhi");
        // Mail::send($email, $data ,function($m){
        //     $m->to($this->member->email, 'Tutorials Point')->subject('Laravel HTML Testing Mail');
        //     $m->from('bagus.yanuar613@gmail.com', 'Bos Jon');
        // });
        Mail::to($this->member->email)->send($email);
    }
}
