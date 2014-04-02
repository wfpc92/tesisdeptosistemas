
<div id= "access" class="large-4 columns">
    <?php
    echo form_open('usuario/login') .
    form_fieldset('Login') .
    form_label('email:', 'email') .
    '<input type="email" name="email" id="email" value="" />' .
    (isset($summary) ? $summary : '') .
    form_label('password:', 'password') .
    form_password('password', '') .
    form_submit('enviar_login', 'Login') .
    anchor(site_url('/usuario/vista_restablecer_contrasena'), 'Restablesca Contraseña?') .
    form_fieldset_close() .
    form_close();
    ?>       
</div>

<?php
echo "Hola Usuario";
?>

