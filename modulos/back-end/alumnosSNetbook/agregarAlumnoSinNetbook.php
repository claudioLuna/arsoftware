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
#Paginación	
	$limit=25;		
	if(is_numeric($_GET['pagina']) && $_GET['pagina']>=1){				
		$offset = ($_GET['pagina']-1) * $limit;		
	}
	else{
		$offset=0;
	}
	
	#Orden por defecto
	if(!isset($_GET['campoOrder']) && !isset($_GET['order']) ){
		$order = "DESC";
	}
	else{
		$campoOrder = $_GET['campoOrder'];
		$order = $_GET['order'];
	}
	
	#incluyo clases
	include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/headerAdmin.php");
	include_once($docRootSitio."modelo/Alumno.php");	
	include_once($docRootSitio."modelo/Marca.php");
	include_once($docRootSitio."modelo/Curso.php");
	include_once($docRootSitio."modelo/Turno.php");
	include_once($docRootSitio."modelo/DatosEscuela.php");	
	include_once($docRootSitio."modelo/Administrador.php");
	
	$alu1 = new Alumno();
	$mar1 = new Marca();
	$cur1 = new Curso();
	$tur1 = new Turno();
	$datoesc = new DatosEscuela();	
	$adm1 = new Administrador();
	
	$usuario = $_SESSION["nombreUsuario"];
	
	$cur1->setNombreUsuario($usuario);
	$_marcas = $mar1->listarMarcas();
	$_cursos = $cur1->listarCursos();
	$_turnos = $tur1->listarTurnos();
	$datoesc->setNombreUsuario($usuario);
	$_nombre = $adm1->listarAdministradorins2($usuario);
	$_datos = $datoesc->listarDatosEscuelas($offset,$limit,$campoOrder,$order);	
	
	#Curso
	if($_POST['curso']){
		$_curso = $cur1->listarCurso($_POST['curso']);
	}
	else{
		$_curso['nombre'] = "Elija Un Curso Para El Alumno";
	}
	
	#Marca
	if($_POST['MarcaNetbook']){
		$_marca = $mar1->listarMarca($_POST['MarcaNetbook']);
	}
	else{
		$_marca['nombre'] = "Elija Una Marca De Netbook Para El Alumno";
	}
	
	#Turno
	if($_POST['turno']){
		$_turno = $tur1->listarTurno($_POST['turno']);
	}
	else{
		$_turno['nombre'] = "Elija Un Turno Para El Alumno";
	}
	
	#Escuela
	if($_POST['escuela']){
		$_dato = $datoesc->listarDatosEscuelas($_POST['escuela']);
	}
	else{
		$_dato['nombre'] = "Elija Una Escuela Para El Alumno";
	}
	if($_POST["bandera"]){			
		
		$mensaje = $alu1->validarAlumnoSinNetbook($_POST);
		
		if(!$mensaje){						
			$alu1->agregarAlumnoSinNetbook($usuario);		
			header("location: listarAlumnosSinNetbook.php?insert=1"); 	
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
	<script src="<?php echo $httpHostSitio?>jquery/jquery-1.11.1.js"></script>	
	<script src="<?php echo 	$httpHostSitio?>plantilla/js/bootstrap.min.js"></script>
	<script src="<?php echo $httpHostSitio?>js/nuevoAjax.js" type="text/javascript"></script>	
	<script src="<?php echo $httpHostSitio?>js/tecnico.js" type="text/javascript"></script>	
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
                       	<ul class="nav navbar-right top-nav">
	<li class="dropdown">
                    <a href="principalAdministrador.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_nombre['nombre'].' '.$_nombre['apellido']?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo $httpHostSitio?>utiles/ctrlLogout.php"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                        </li>
                    </ul>
                </li>
	</ul>
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
     <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Agregar Alumno Sin Netbook
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Agregar Alumno Sin Netbook
                            </li>
                        </ol>
                    </div>
                </div>       
						<p>
                 <button type="button" class="btn btn-primary" onclick="location = ('<?php echo $httpHostSitio?>modulos/back-end/alumnosSNetbook/agregarAlumnoSinNetbook.php')" > Agregar Alumnos Sin Netbook</button>
                 <button type="button" class="btn btn-success" onclick="location =('<?php echo $httpHostSitio?>modulos/back-end/alumnosSNetbook/listarAlumnosSinNetbook.php')" >Listar Alumnos Sin Netbook</button> 	                    
        </p>	
	   <!-- /.row -->
		<?php if($mensaje){?>
			<div class="alert alert-danger">
				<strong>Error </strong><?php echo $mensaje?>
			</div>
		<?php }?>		
		<form enctype="multipart/form-data" method="post" id="formAgregarAlumno" name="formAgregarAlumno">
	
		<!--bandera-->
		<input type="hidden" name="bandera" value="1">		
	
		<!--alumno-->
		<div class="form-group">
        <label>Nombre:*</label><input class="form-control"  name="nombre" value="<?php echo $_POST['nombre']?>">
        </div>
		
		<!--Apellido-->
		<div class="form-group">
        <label>Apellido:*</label><input class="form-control"  name="apellido" value="<?php echo $_POST['apellido']?>">
        </div>
		
		<!--Cuil-->
		<div class="form-group">
        <label>Cuil:*</label><input class="form-control"  name="cuil" value="<?php echo $_POST['cuil']?>">
        </div>
		
		<!--Direccion-->
		<div class="form-group">
        <label>Direccion:*</label><input class="form-control"  name="direccion" value="<?php echo $_POST['direccion']?>">
        </div>
		
		<!--Curso-->
		<label>Curso: *</label> 
		<select class="form-control" name="curso">
            <option selected value="<?php echo $_curso['id']?>"><?php echo $_curso['nombre']?></option>
			<?php for($i=1;$i<=count($_cursos);$i++){?>
			<option value="<?php echo $_cursos[$i]['id']?>"><?php echo $_cursos[$i]['nombre']?></option>
		<?php }?>
		</select>
	
		<!--escuela-->
		<label>Escuela: *</label> 
		<select class="form-control" name="escuela">
            <option selected value="<?php echo $_dato['id']?>"><?php echo $_dato['nombre']?></option>
			<?php for($i=1;$i<=count($_datos);$i++){?>
			<option value="<?php echo $_datos[$i]['numeroEscuela']?>"><?php echo $_datos[$i]['numeroEscuela'].' - '.$_datos[$i]['nombreEscuela']?></option>
		<?php }?>
		</select>
		
		<!--Turno-->
		<label>Turno: *</label> 
		<select class="form-control" name="turno">
            <option selected value="<?php echo $_turno['id']?>"><?php echo $_turno['nombre']?></option>
			<?php for($i=1;$i<=count($_turnos);$i++){?>
			<option value="<?php echo $_turnos[$i]['id']?>"><?php echo $_turnos[$i]['nombre']?></option>
		<?php }?>
		</select>
		
		<!--nombrePadre-->
		<div class="form-group">
        <label>Nombre Del Padre:*</label><input class="form-control"  name="nombrePadre" value="<?php echo $_POST['nombrePadre']?>">
        </div>
		
		<!--apellidoPadre-->
		<div class="form-group">
        <label>Apellido Del Padre:*</label><input class="form-control"  name="apellidoPadre" value="<?php echo $_POST['apellidoPadre']?>">
        </div>
		
		<!--Cuil padre-->
		<div class="form-group">
        <label>Cuil Del Padre:*</label><input class="form-control"  name="cuilPadre" value="<?php echo $_POST['cuilPadre']?>">
        </div>
		
		<!--submit-->
	<input type="submit" value="Agregar" class="btn btn-success"> * Campos obligatorios
		
		</form>				
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
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
