<div id="access" class="large-4 columns">
    <?php echo form_open('usuario/login') ?>
    <fieldset>
        <p>Bienvenido</p>
        <div class="form">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="" />
        </div>
        <div class="form">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" />
        </div>
        <?php echo (isset($summary) ? $summary : ''); ?>
        <a href="http://proyecto1.wfpc92.tk/index.php/usuario/vista_restablecer_contrasena">
            ¿Olvidó su password?
        </a>
        <br />
        <input id="sendLogin" type="submit" name="enviar_login" value="Ingresar" />
    </fieldset>
</form>
</div>

