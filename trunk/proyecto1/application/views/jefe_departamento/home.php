<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo form_open('jefe_departamento/home')
 . form_label('index del jefe de departamento: ', 'nombre_jefe_departamento')
 . form_close();

echo anchor('/usuario/logout', 'Cerrar Sesion');