<?php

namespace Denis303\ReCaptcha;

use Exception;
use Denis303\ReCaptcha\Config\ReCaptcha as ReCaptchaConfig;

abstract class BaseReCaptcha extends \ReCaptcha\ReCaptcha
{

    protected $_lastResponse;

    public function getLastResponse()
    {
        return $this->_lastResponse;
    }

    public function getLastErrors() : array
    {
        $return = $this->getLastErrorCodes();

        foreach($return as $key => $value)
        {
            $return[$key] = lang('ReCaptcha.' . $value);
        }

        return $return;
    }

    public function getLastErrorCodes() : array
    {
        return $this->_lastResponse ? $this->_lastResponse->getErrorCodes() : [];
    }

    public function verify($response, $remoteIp = null)
    {
        if (!$remoteIp)
        {
            $ip = service('request')->getIPAddress();

            if ($ip && ($ip != '0.0.0.0'))
            {
                $remoteIp = $ip;
            }
        }

        $this->_lastResponse = parent::verify($response, $remoteIp);

        return $this->_lastResponse;
    }

    public function render_v3(string $action, array $options = [])
    {
        $config = config(ReCaptchaConfig::class);

        if (!$config->key)
        {
            throw new Exception('The key parameter is missing.');
        }

        return view('Denis303\ReCaptcha\Views\recaptcha3', [
            'key' => $config->key,
            'action' => $action,
            'options' => $options
        ]);
    }

}