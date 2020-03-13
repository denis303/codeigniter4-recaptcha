<?php

if (!function_exists('form_recaptcha3'))
{
    function form_recaptcha3(string $action, array $options = [])
    {
        return service('reCaptcha')->render_v3($action, $options);
    }
}