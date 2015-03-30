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
	include_once($docRootSitio."modelo/Curso.php");
	include_once($docRootSitio."modelo/Turno.php");
	
	$alu1 = new Alumno();			
	$cur1 = new Curso();	
	$tur1 = new Turno();
	
	$_alumno = $alu1->listarAlumno($_POST['Alumno']);	
	$_cursos = $cur1->listarCursos();
	$_turnos = $tur1->listarTurnos();

	#nombre
	if($_POST['nombre']){
		$nombre = $_POST['nombre'];
	}
	else{		
		$nombre = $_alumno['nombre'];
	}	
	
	#apellido
	if($_POST['apellido']){
		$apellido = $_POST['apellido'];
	}
	else{		
		$apellido = $_alumno['apellido'];
	}	
	
	#cuil
	if($_POST['cuil']){
		$cuil = $_POST['cuil'];
	}
	else{		
		$cuil = $_alumno['cuil'];
	}
	
	#direccion
	if($_POST['direccion']){
		$direccion = $_POST['direccion'];
	}
	else{		
		$direccion = $_alumno['direccion'];
	}
	
	#escuela
	if($_POST['escuela']){
		$escuela = $_POST['escuela'];
	}
	else{		
		$escuela = $_alumno['escuela'];
	}
	
	#curso
	if($_POST['curso']){
		$_curso = $cur1->listarCurso($_POST['curso']);
		}
	else{
		if($_alumno['curso']!=0){
			$_curso = $cur1->listarCurso($_alumno['curso']);
		}
		else{
			$_curso['nombre'] = "Elija un Curso para el alumnos";
		}
	}
	
	#turno
	if($_POST['turno']){
		$_turno = $tur1->listarTurno($_POST['turno']);
		}
	else{
		if($_alumno['turno']!=0){
			$_turno = $tur1->listarTurno($_alumno['turno']);
		}
		else{
			$_turno['nombre'] = "Elija un Turno para el alumnos";
		}
	}
	
	#nombrePadre
	if($_POST['nombrePadre']){
		$nombrePadre = $_POST['nombrePadre'];
	}
	else{		
		$nombrePadre = $_alumno['nombrePadre'];
	}
	
	#apellidoPadre
	if($_POST['apellidoPadre']){
		$apellidoPadre = $_POST['apellidoPadre'];
	}
	else{		
		$apellidoPadre = $_alumno['apellidoPadre'];
	}
	
	#cuilPadre
	if($_POST['cuilPadre']){
		$cuilPadre = $_POST['cuilPadre'];
	}
	else{		
		$cuilPadre = $_alumno['cuilPadre'];
	}
	
	#bandera
	if($_POST["bandera"]){				
		
		$mensaje = $alu1->validarAlumnoSinNetbook($_POST);
		
		if(!$mensaje){						
			$update = $alu1->modificarAlumnoSinNetbook();	
			header("location: listarAlumnosSinNetbook.php?update=$update"); 	
			exit();		
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
	               <div onclick="location = ('<?php echo $httpHostSitio?>modulos/back-end/administradores/principalAdministradorAR.php')"; style="height: 52px; width:225px;  max-width: 100%; background: #FFFFFF; background-image: url(<?php echo $httpHostSitio?>plantilla/imagenes/logotipoe.png);"></div>
	            </div>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
 
			<div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php include_once($docRootSitio."utiles/menuAdministradorAR.php");?>    
            </div>
       
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
                           Ver Mas Datos Alumno Sin Netbook
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Ver Mas Datos Alumno Sin Netbook
                            </li>
                        </ol>
                    </div>
                </div>
									<p>
						<button type="button" class="btn btn-primary" onclick="location = ('<?php echo $httpHostSitio?>modulos/back-end/alumnosSNetbook/agregarAlumnoSinNetbook.php')" > Agregar Alumnos Sin Netbook</button>
	                    <button type="button" class="btn btn-success" onclick="location =('<?php echo $httpHostSitio?>modulos/back-end/alumnosSNetbook/listarAlumnosSinNetbook.php')" >Listar Alumnos Sin Netbook</button> 	                    
	                </p>
				<!--form-->
	<form enctype="multipart/form-data" method="post">	
		<!--Marca-->
		<input type="hidden" name="Marca" value="<?php echo $alu1->getId()?>" />
		<!--id-->
		<input type="hidden" name="id" value="<?php echo $alu1->getId()?>" />		
		
		<!--bandera-->
		<input type="hidden" name="bandera" value="1" />	
	
		<?php if($mensaje){?>
					<div class="alert alert-danger">
		<strong>Error </strong><?php echo $mensaje?>
	</div> 
		<?php }?>		
		
		<!--alumno-->
		<div class="form-group">
        <label>Nombre:*</label><input class="form-control" readonly="readonly();" name="nombre" value="<?php echo $nombre?>">
        </div>
		<!--apellido-->
		<div class="form-group">
        <label>Apellido:*</label><input class="form-control" readonly="readonly();" name="apellido" value="<?php echo $apellido?>">
        </div>
		<!--cuil-->
		<div class="form-group">
        <label>Cuil:*</label><input class="form-control" readonly="readonly();" name="cuil" value="<?php echo $cuil?>">
        </div>
		<!--Direccion-->
		<div class="form-group">
        <label>Direccion:*</label><input class="form-control" readonly="readonly();" name="direccion" value="<?php echo $direccion?>">
        </div>
		<!--Escuela-->
		<div class="form-group">
        <label>Escuela:*</label><input class="form-control" readonly="readonly();" name="escuela" value="<?php echo $escuela?>">
        </div>
		<!--Curso-->
		<div class="form-group">
        <label>Curso:*</label><input class="form-control" readonly="readonly();" name="nombrePadre" value="<?php echo $_curso['nombre']?>">
        </div>
		<!--Turno-->
		<div class="form-group">
        <label>Turno:*</label><input class="form-control" readonly="readonly();" name="nombrePadre" value="<?php echo $_turno['nombre']?>">
        </div>
		<!--Nombre Padre-->
		<div class="form-group">
        <label>Nombre Padre:*</label><input class="form-control" readonly="readonly();" name="nombrePadre" value="<?php echo $nombrePadre?>">
        </div>
		<!--Apellido Padre-->
		<div class="form-group">
        <label>Apellido Padre:*</label><input class="form-control" readonly="readonly();" name="apellidoPadre" value="<?php echo $apellidoPadre?>">
        </div>
		<!--Cuil Padre-->
		<div class="form-group">
        <label>Cuil Padre:*</label><input class="form-control" readonly="readonly();" name="cuilPadre" value="<?php echo $cuilPadre?>">
        </div>
	
	</form>		
                <!-- /.row -->
         
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