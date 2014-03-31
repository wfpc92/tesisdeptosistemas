<?php

echo form_open('administrador/crear_usuario')
 . form_label('Nombres: ', 'nombre_docente')
 . form_input('nombre_docente', '') . br()
 . form_label('Apellidos', 'apellidos_docente')
 . form_input('apellidos_docente', '') . br()
 . form_label('Correo: ', 'correo_docente')
 . form_input('correo_docente', '') . br()
 . form_label('Contraseña', 'contrasena_docente')
 . form_password('contrasena_docente') . br()
 . form_label('Repita Contraseña', 'repita_contrasena_docente')
 . form_password('repita_contrasena_docente') . br()
 . form_submit('btn_nuevo_usuario', 'Crear Nuevo usuario')
 . form_close();

