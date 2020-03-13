<?php

namespace Denis303\ReCaptcha\Config;

abstract class BaseReCaptcha extends \CodeIgniter\Config\BaseConfig
{

    public $key;

    public $secret;

    public $expectedHostname;

    public $scoreThreshold = 0.5;

    public $challengeTimeout;
    
}