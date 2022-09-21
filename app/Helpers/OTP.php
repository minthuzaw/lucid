<?php

namespace App\Helpers;

use App\Jobs\SendSMSJob;
use App\Mail\SendOTP;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class OTP
{
    private string $cachePrefix = "otp_";

    public string $otp;

    private string $recipient;

    private int $ttl;

    public function __construct($recipient, $ttl = 6000)
    {
        $this->recipient = $recipient;
        $this->ttl = $ttl;

        $this->generateForRecipient();
    }

    public function generateForRecipient(): void
    {
        //TODO Control ttl from application settings later
        $this->otp = NumberHelper::getRandomNumber();

        $cacheKey = $this->cachePrefix.$this->recipient;
        Cache::put($cacheKey, $this->otp, $this->ttl);
    }

    public function sendViaEmail(): void
    {
        Mail::to($this->recipient)->queue((new SendOTP($this->otp))->onQueue('email_otp'));
    }

    public function sendViaSMSPOH($message = null, $sender = null): void
    {
        if (! $message) {
            $message = "Your OTP number is $this->otp";
        }

        SendSMSJob::dispatch($this->recipient, $message, $sender)->onQueue('mobile_otp');
    }

    public static function verify($recipient, $otp): bool
    {
        $cacheKey = "otp_".$recipient;

        return Cache::get($cacheKey) == $otp;
    }
}
