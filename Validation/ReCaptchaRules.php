<?php

namespace Denis303\ReCaptcha\Validation;

use Exception;

class ReCaptchaRules
{

    public function reCaptcha2(string $token, string $params, array $data, &$error = null)
    {
        $service = service('reCaptcha2');

        $params = explode(',', $params);
        
        $response = $service->verify($token);

        if ($response->isSuccess())
        {
            return true;
        }

        foreach($response->getErrorCodes() as $key => $value)
        {
            $error = lang('ReCaptcha.' . $value);
        
            break;
        }

        return false;
    }

    public function reCaptcha3(string $token, string $params, array $data, &$error = null)
    {
        $service = service('reCaptcha3');

        $params = explode(',', $params);

        if (count($params) > 0)
        {
            $service->setExpectedAction($params[0]);
        }

        if (count($params) > 1)
        {
            $service->setScoreThreshold($params[1]);
        }
        
        $response = $service->verify($token);

        if ($response->isSuccess())
        {
            return true;
        }

        foreach($response->getErrorCodes() as $key => $value)
        {
            $error = lang('ReCaptcha.' . $value);
        
            break;
        }

        return false;
    }

}