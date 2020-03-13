<?php

namespace Denis303\ReCaptcha;

use Denis303\ReCaptcha\Config\ReCaptcha as ReCaptchaConfig;

abstract class BaseReCaptchaValidator
{

    public static function reCaptcha3(string $token, string $params) : bool
    {
        $reCaptcha = service('reCaptcha');

        $params = explode(',', $params);

        $reCaptcha->setExpectedAction(trim($params[0]));

        if (count($params) > 1)
        {
            $reCaptcha->setScoreThreshold(trim($params[1]));
        }
        
        $response = $reCaptcha->verify($token);

        if (!$response->isSuccess())
        {
            return false;
        }

        return true;
    }

}