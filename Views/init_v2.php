<?php

$options['sitekey'] = $key;
$options['callback'] = 'reCaptcha2VerifyCallback_' . $num;

?>

<div id="reCaptcha2_<?= $num;?>"></div>

<script type="text/javascript">

    var reCaptcha2VerifyCallback_<?= $num;?> = function(response) {
        document.getElementById('<?= $id;?>').value = response;
    };

    var reCaptcha2Callback_<?= $num;?> = function() {
        grecaptcha.render('reCaptcha2_<?= $num;?>', <?= json_encode($options);?>);
    };
</script>

<script src="https://www.google.com/recaptcha/api.js?onload=reCaptcha2Callback_<?= $num;?>&render=explicit" async defer></script>
