<?php

use Denis303\ReCaptcha\Config\ReCaptcha2;
use Denis303\ReCaptcha\Config\ReCaptcha3;

if (!function_exists('reCaptcha2'))
{
    function reCaptcha2(string $name, array $attributes = [], array $options = [], bool $init = true)
    {
        $config = config(ReCaptcha2::class);

        if (!$config)
        {
            throw new Exception(ReCaptcha2::class . ' not found.');
        }

        if (empty($attributes['id']))
        {
            $attributes['id'] = $name;
        }

        helper('form');

        $attributes['type'] = 'hidden';

        $attributes['name'] = $name;

        $return = form_input($attributes) . PHP_EOL;

        if ($init)
        {
            $return .= view_cell('Denis303\ReCaptcha\Cells\ReCaptcha::init_v2', [
                'key' => $config->key,
                'id' => $attributes['id'],
                'options' => $options
            ]);
        }

        return $return;
    }
}

if (!function_exists('reCaptcha3'))
{
    function reCaptcha3(string $name, array $attributes = [], array $options = [], bool $init = true)
    {
        $config = config(ReCaptcha3::class);

        if (!$config)
        {
            throw new Exception(ReCaptcha3::class . ' not found.');
        }

        helper('form');

        if (empty($attributes['id']))
        {
            $attributes['id'] = $name;
        }

        $attributes['type'] = 'hidden';

        $attributes['name'] = $name;

        $return = form_input($attributes) . PHP_EOL;

        if ($init)
        {
            $return .= view_cell('Denis303\ReCaptcha\Cells\ReCaptcha::init_v3', [
                'key' => $config->key,
                'id' => $attributes['id'],
                'options' => $options
            ]);
        }

        return $return;
    }
    
}