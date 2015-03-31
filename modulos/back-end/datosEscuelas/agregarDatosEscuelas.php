<!DOCTYPE html>
<html lang="en">

<head>
<?php //////////////////////////////////////////////////////
///Copyright 2015  Luna Claudio,Rebolloso Leandro.///
////////////////////////////////////////////////////
//
//This file is part of ARSoftware.
//ARSoftware is free software; you can redistribute it and/or
//modify it under the terms of the GNU General Public License
//as published by the Free Software Foundation; either version 2
//of the License, or (at your option) any later version.
//
//ARSoftware is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//GNU General Public License for more details.
//
//You should have received a copy of the GNU General Public License
//along with this program; if not, write to the Free Software
//Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

     <title>ARSoftware</title>
<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/headerAdmin.php");	
	include_once($docRootSitio."modelo/Alumno.php");
    include_once($docRootSitio."modelo/Marca.php");
    include_once($docRootSitio."modelo/Curso.php");
    include_once($docRootSitio."modelo/Turno.php");
    include_once($docRootSitio."modelo/Tecnico.php");
    include_once($docRootSitio."modelo/Prestamo.php");
	include_once($docRootSitio."modelo/DatosEscuela.php");
	include_once($docRootSitio."modelo/Administrador.php");	
	
	$datoescuela = new DatosEscuela();
	$adm1 = new Administrador();
	
	$usuario = $_SESSION["nombreUsuario"];	
	
	$_nombre = $adm1->listarAdministradorins2($usuario);
	
?>

<?php 	if($_POST["bandera"]){			
		
		$mensaje = $datoescuela->validarDatosEscuela($_POST);
		
		if(!$mensaje){	
			$datoescuela->setNombreUsuario($usuario);					
			$datoescuela->agregarDatosEscuela();		
			header("location: listarDatosEscuelas.php?insert=1"); 	
			
		}		
	}		
?>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $httpHostSitio?>plantilla/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<script src="<?php echo $httpHostSitio?>jquery/jquery-1.11.1.js"></script>	
	<script src="<?php echo $httpHostSitio?>plantilla/js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                   </button>
	                <a class="navbar-brand" href="<?php echo $httpHostSitio?>modulos/back-end/administradores/principalAdministradorAR.php">Administradores de Redes</a>
	            </div>
			
			   <ul class="nav navbar-right top-nav">
				
			 
						  
          	<li class="dropdown">
                    <a href="principalAdministrador.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_nombre['nombre'].' '.$_nombre['apellido']?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/escuelas/utiles/ctrlLogout.php"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                        </li>
                    </ul>
                </li>
			 </ul>
          
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
          <!--Menu----------->
            
            <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php include_once($docRootSitio."utiles/menuAdministradorAR.php");?>    
                            </div>
            <!--Fin Menu----------------->
            <!-- /.navbar-collapse -->
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

         </div>
            <!-- /.container-fluid ------------------------------------------------------------------------------------------------------>

            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Agregar Datos
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Datos Escuela
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
         <!--form-->
		 			<p>
	<button type="button" class="btn btn-primary" onclick="location =('<?php echo $httpHostSitio?>modulos/back-end/datosEscuelas/agregarDatosEscuelas.php')" >  Agregar Datos Escuelas</button>
<button type="button" class="btn btn-success" onclick="location =('<?php echo $httpHostSitio?>modulos/back-end/datosEscuelas/listarDatosEscuelas.php')" >  Listar Datos Escuelas</button>
        
	</p>
	<form enctype="multipart/form-data" method="post" id="formAgregarDatosEscuela" name="formAgregarDatosEscuela">
	
		<!--bandera-->
		<input type="hidden" name="bandera" value="1">		
	

		<?php if($mensaje){?>
		<div class="alert alert-danger">
			<strong>Error </strong><?php echo $mensaje?>
		</div>
		<?php }?>	
			
		
		<!--nombre-->
		<div class="form-group">
        <label>Nombre Director: *</label><input class="form-control"  name="nombreDirector" value="<?php echo $_POST['nombreDirector']?>">
        </div>

		<!--apellido-->
		<div class="form-group">
        <label>Apellido Director: *</label><input class="form-control"  name="apellidoDirector" value="<?php echo $_POST['apellidoDirector']?>">
        </div> 
		
        <!--dniDirector-->
		<div class="form-group">
        <label>DNI Director: *</label><input class="form-control"  name="dniDirector" value="<?php echo  $_POST['dniDirector']?>">
        </div>
                	
		<!--CUIL Director-->
		<div class="form-group">
        <label>CUIL Director: *</label><input class="form-control"  name="cuilDirector" value="<?php echo $_POST['cuilDirector']?>">
        </div>
				
		<!--numero Escuela-->
		<div class="form-group">
        <label>NumeroEscuela: *</label><input class="form-control"  name="numeroEscuela" value="<?php echo $_POST['numeroEscuela']?>">
        </div>
		
		<!--nombre Escuela-->
		<div class="form-group">
        <label>Nombre Escuela: *</label><input class="form-control"  name="nombreEscuela" value="<?php echo $_POST['nombreEscuela']?>">
        </div>
		
		<!--cue Escuela-->
		<div class="form-group">
        <label>CUE Escuela: *</label><input class="form-control"  name="cueEscuela" value="<?php echo $_POST['cueEscuela']?>">
        </div>
	
		<!--seccion Escuela-->
		<div class="form-group">
        <label>Seccion Escuela: *</label><input class="form-control"  name="seccionEscuela" value="<?php echo $_POST['seccionEscuela']?>">
        </div>
		
		<!--domicilio Escuela-->
		<div class="form-group">
        <label>Domicilio Escuela: *</label><input class="form-control"  name="domicilioEscuela" value="<?php echo $_POST['domicilioEscuela']?>">
        </div>
		
		<!--ciudad-->
		<div class="form-group">
        <label>Ciudad: *</label><input class="form-control"  name="ciudad" value="<?php echo $_POST['ciudad']?>">
        </div>
		
		<!--Provincia-->
		<div class="form-group">
        <label>Provincia: *</label><input class="form-control"  name="provincia" value="<?php echo $_POST['provincia']?>">
        </div>
		
		<!--submit-->
		<input type="submit" value="Agregar" class="btn btn-success"> * Campos obligatorios
		
		</fieldset>
	</form>				
        </div><!-- Fin container-fluid ------------------------------------------------------------------------------------------------------>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>