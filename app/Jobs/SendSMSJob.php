<?php

namespace App\Jobs;

use App\Helpers\SMS;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSMSJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $to;

    public string $message;

    public string | null $sender;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($to, $message, $sender)
    {
        $this->to = $to;
        $this->message = $message;
        $this->sender = $sender;
    }

    /**
     * Execute the job.
     *
     * @return void
     *
     * @throws GuzzleException
     */
    public function handle()
    {
        (new SMS)->sendViaSMSPOH($this->to, $this->message, $this->sender);
    }
}
