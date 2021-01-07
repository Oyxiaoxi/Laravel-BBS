<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Overtrue\EasySms\EasySms;
use App\Http\Requests\Api\VerificationCodeRequest;

class VerificationCodesController extends Controller
{
    public function store(VerificationCodeRequest $request, EasySms $easySms)
    {
        $phone = $request->phone;

        // 生成6位随机数，左侧补0
        $code = str_pad(random_int(1, 9999), 6, 0, STR_PAD_LEFT);
        $expire_minutes = 5;

        if (!app()->environment('production')) {
            $code = '321234';
        } else {
            try {
                $result = $easySms->send($phone, [
                    'content' => " 您的登录验证码是{$code}，请于{$expire_minutes}分钟内填写。如非本人操作，请忽略本短信。",
                ]);
            } catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception) {
                $response = $exception->getExceptions()['qcloud']->getMessage();
                abort(500, $response ?: '短信发送异常');
            }
        }


        $key = 'verificationCode_' . Str::random(15);

        $expiredAt = now()->addMinutes(5);
        // 缓存验证码 5 分钟过期。
        \Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);

        return response()->json([
            'key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
        ])->setStatusCode(201);
    }
}
