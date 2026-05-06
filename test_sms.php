<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$sms = new \App\Services\SmsService();
$result = $sms->sendSms('+94773729462', 'Test OTP');
var_dump($result);
