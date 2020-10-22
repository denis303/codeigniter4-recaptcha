Google reCAPTCHA CodeIgniter 4 Library
======================================

## Installation

```composer require denis303/codeigniter4-recaptcha:dev-master```

## Configuration

In the .env file you need to add your personal ReCaptcha keys.

```
# --------------------------------------------------------------------
# ReCaptcha 2
# --------------------------------------------------------------------
recaptcha2.key = 'XXXXXXXX-XXXXXXXX'
recaptcha2.secret = 'XXXXXXXX-XXXXXXXX'

# --------------------------------------------------------------------
# ReCaptcha 3
# --------------------------------------------------------------------
recaptcha3.key = 'XXXXXXXX-XXXXXXXX'
recaptcha3.secret = 'XXXXXXXX-XXXXXXXX'
recaptcha3.scoreThreshold = 0.5
```

In the /app/Config/Validation.php file you need to add settings for validator:

```
public $ruleSets = [
    ...
    \Denis303\ReCaptcha\Validation\ReCaptchaRules::class
];
```

## Rendering ReCaptcha v2

```
helper(['form', 'reCaptcha']);

echo form_open();

echo reCaptcha2('reCaptcha2', ['id' => 'recaptcha_1'], ['theme' => 'dark']);

echo form_submit('submit', 'Submit');

echo form_close();
```

## Rendering ReCaptcha v3

```
helper(['form', 'reCaptcha']);

echo form_open();

echo reCaptcha3('reCaptcha3', ['id' => 'recaptcha_1'], ['action' => 'contactForm']);

echo form_submit('submit', 'Submit');

echo form_close();
```

## Checking ReCaptcha in a model:

```
public $validationRules = [
    'reCaptcha2' => 'required|reCaptcha2[]'
    'reCaptcha3' => 'required|reCaptcha3[contactForm,0.9]'
    ....
];
```

In the settings of the reCaptcha3 validator, the first parameter you specify is expectedAction, this parameter is not required.

You can override global scoreThreshold parameter in the second rule parameter.

## Setting custom ReCaptcha validation error in a model:

protected $validationMessages = [
    'reCaptcha' => [
        'reCaptcha3' => 'Captcha is not valid.'
    ]
];