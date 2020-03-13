<?php

namespace Denis303\ReCaptcha\Config;

use Exception;
use Denis303\ReCaptcha\ReCaptcha;
use Denis303\ReCaptcha\Config\ReCaptcha as ReCaptchaConfig;

abstract class BaseServices extends \CodeIgniter\Config\Services
{

    public static function reCaptcha($getShared = true)
    {
        if ($getShared)
        {
            return static::getSharedInstance(__FUNCTION__);
        }

        $config = config(ReCaptchaConfig::class);

        if (!$config->secret)
        {
            throw new Exception('The secret parameter is missing.');
        }

        $return = new ReCaptcha($config->secret);

        if ($config->scoreThreshold !== null)
        {
            $return->setScoreThreshold($config->scoreThreshold);
        }

        if ($config->expectedHostname !== null)
        {
            $return->setExpectedHostname($config->expectedHostname);
        }

        if ($config->challengeTimeout !== null)
        {
            $return->setChallengeTimeout($config->challengeTimeout);
        }

        return $return;
    }

}