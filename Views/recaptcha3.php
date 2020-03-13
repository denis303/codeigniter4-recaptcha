<?php

$js_config = [];

if ($action)
{
    $js_config['action'] = $action;
}

if (empty($options['id']))
{
    $options['id'] = 'reCaptcha';
}

if (empty($options['name']))
{
    $options['name'] = 'reCaptcha';
}

$options['type'] = 'hidden';

helper('form');

echo form_input($options);

static $inited = false;

if (!$inited)
{
    $inited = true;

    echo '<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=' . $key . '"></script>';
}

?>
<script type="text/javascript">
grecaptcha.ready(function() {
    grecaptcha.execute('<?= $key;?>', <?= json_encode($js_config);?>).then(function(token) {
        document.getElementById('<?= $options['id'];?>').value = token;
        document.getElementById('<?= $options['id'];?>').oninput();
    });
});
</script>