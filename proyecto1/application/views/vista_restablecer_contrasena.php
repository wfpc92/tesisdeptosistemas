<div id="restablecer_contrasena" class="large-4 column">
    <?php
    echo form_open('usuario/restablecer_contrasena') .
    form_fieldset('Restablecer Contraseña') .
    form_label('email:', 'email') .
    '<input type="email" name="email" id="email" value="" />' . br() .
    form_submit('enviar_contrasena', 'Restablecer') .
    form_fieldset_close() .
    form_close();
    ?>
</div>

