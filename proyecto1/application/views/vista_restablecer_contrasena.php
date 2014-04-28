<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width-device-width, initial-scale=1" />	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/genericos.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login.css" media="all"/>
	
	<script src="js/jquery.js"></script>
	
</head>

<body>
	
	<div id="pagina">
		
		<div id="inicioSesion"></div>
		<div id="header">
			<h1>Sistema Intelectual del Departamento De Sistemas</h1>
		</div>
		<div id="logo">
			<div class="logo">
				<img src="<?php echo base_url(); ?>img/logo-unicauca.png" alt="Logo Unicauca" />
			</div>
		</div>		
		<div id="conSuperior">
                    <div id="restablecer_contrasena" class="large-4 column">
                        <p>Para restablecer tu contraseña, introduce una dirección de correo electrónico</p>
                        <?php
                        echo form_open('usuario/restablecer_contrasena') .
                        form_fieldset('').
                            form_label('Correo electrónico:', 'email') .
                            '<input type="email" name="email" id="email" value="" />' . br() .
                            '<input type="submit" restablecer="" id="sendContrasena" value="Restablecer" name="sendContrasena">'.
                            form_fieldset_close() .
                            form_close();
                        ?>
                    </div>
                  </div>
		<div class="clearfix"></div>
		<div id="conInferior"></div>		
		<div id="footer"></div>
	</div>

</body>
</html>

