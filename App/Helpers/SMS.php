<?php



namespace App\App\Helpers;

use Twilio\Rest\Client;

class SMS
{
    private static $_hash = '498024ebf8fd2b108a43d9af55abe9a4';

    public static function sendSMS($phone, $otp): void
    {
        $sid = "ACdaf39a8ac3c57194cf76ef9c87a0672e"; // Your Account SID from www.twilio.com/console
        $token = md5(SMS::$_hash); // Your Auth Token from www.twilio.com/console
        $client = new Client(
            $sid,
            $token
        );
        $message = $client->messages->create(
            $phone, // Text this number
            [
                'from' => '+15855581907', // From a valid Twilio number
                'body' => 'Hey User ! This is OTP for you ' . $otp
            ]
        );
    }
}
