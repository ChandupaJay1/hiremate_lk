<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;

class SmsService
{
    /**
     * Send an SMS using the Twilio Gateway.
     *
     * @param string $phoneNumber
     * @param string $message
     * @return bool
     */
    public function sendSms($phoneNumber, $message)
    {
        // Format the phone number. Twilio requires E.164 format (e.g., +94712345678)
        if (str_starts_with($phoneNumber, '0')) {
            $formattedNumber = '+94' . ltrim($phoneNumber, '0');
        } elseif (!str_starts_with($phoneNumber, '+')) {
            // If it doesn't start with 0 or +, we assume it's a valid local number but needs country code
            $formattedNumber = '+94' . $phoneNumber;
        } else {
            $formattedNumber = $phoneNumber;
        }

        // For development/testing: log the message
        Log::info("SMS to {$formattedNumber}: {$message}");

        $sid = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $fromNumber = env('TWILIO_FROM_NUMBER');

        if (empty($sid) || empty($token) || empty($fromNumber)) {
            Log::warning('Twilio credentials missing in .env file. SMS was only logged.');
            return true;
        }

        try {
            $twilio = new Client($sid, $token);

            $msg = $twilio->messages->create(
                $formattedNumber, // To
                [
                    "body" => $message,
                    "from" => $fromNumber,
                ]
            );

            Log::info("Twilio SMS Created. SID: " . $msg->sid . " Status: " . $msg->status . " Error: " . $msg->errorMessage);

            return true;
        } catch (\Exception $e) {
            Log::error('Twilio SMS Sending Failed: ' . $e->getMessage());
            return false;
        }
    }
}
