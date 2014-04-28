<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>

            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
         <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/genericos.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/estilos_1.css" media="all"/>
    </head>
    <body>
        <div id="pagina">

            <div id="inicioSesion">
                <a href="#">Cerrar Sesión</a>
            </div>
            <div id="header">
                <h1>Sistema Intelectual del Departamento De Sistemas</h1>
            </div>
            <div id="logo">
                <div class="logo">
                    <img src="<?php echo base_url(); ?>img/logo-unicauca.png" alt="Logo Unicauca" />
                </div>
            </div>		
            <div id="conSuperior">
                <ul id="menuPrincipal">
                    <li class="inicio">
                        <a href="#">Inicio</a>
                    </li>
                    <li class="monografias">
                        <a href="#">Monografias</a>
                    </li>
                    <li class="articulos">
                        <a href="#">Artículos</a>
                    </li>
                    <li class="reportes">
                        <a href="#">Reportes Ténicos</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div id="conInferior">
                <div style='height:20px;'></div>
                <div>
                    <?php echo $output; ?> 
                </div>
            </div>
            <div id="footer"></div>
        </div>
    </body>
</html>