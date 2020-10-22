<?php

namespace Denis303\ReCaptcha\Libraries;

class ReCaptcha extends \ReCaptcha\ReCaptcha
{

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

        return parent::verify($response, $remoteIp);
    }
    
}