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
		include_once($docRootSitio."utiles/ctrlAcceso.php");	
		include_once($docRootSitio."modelo/Alumno.php");
	    include_once($docRootSitio."modelo/Marca.php");
	    include_once($docRootSitio."modelo/Curso.php");
	    include_once($docRootSitio."modelo/Turno.php");
	    include_once($docRootSitio."modelo/Tecnico.php");
	    include_once($docRootSitio."modelo/Prestamo.php");
		include_once($docRootSitio."modelo/Administrador.php");	
		
	    $stecnico = new Tecnico();
	    $mar1 = new Marca();
	    $prestamo = new Prestamo();
		$adm1 = new Administrador();
	    
		$_stecnicos = $stecnico->listarTecnicos($offset,$limit,$campoOrder,$order);
		$_prestamos = $prestamo->listarPrestamos($offset,$limit,$campoOrder,$order);
		$usuario = $_SESSION["nombreUsuario"];
		$_nombre = $adm1->listarAdministradorins2($usuario);
	
	?> 
	    <!-- Bootstrap Core CSS -->
    <script src="<?php echo $httpHostSitio?>js/nuevoAjax.js" type="text/javascript"></script>	
    <script src="<?php echo $httpHostSitio?>js/tecnico.js" type="text/javascript"></script>	

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $httpHostSitio?>plantilla/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script src="<?php echo $httpHostSitio?>js/bootstrap.js"></script>	
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
	
	            <!-- Page Heading -->
	            <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Alumnos
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Alumnos
                            </li>
                        </ol>
                    </div>
                </div>
	                <!-- /.row -->
	                
	                
	                  <p>
	
	                  
	                    <button type="button" class="btn btn-primary" onclick="location = ('<?php echo $httpHostSitio?>modulos/back-end/alumnos/listarAlumnos.php')" >  Alumnos</button>
	                    <button type="button" class="btn btn-success" onclick="location =('<?php echo $httpHostSitio?>modulos/back-end/alumnosSNetbook/listarAlumnosSinNetbook.php')" >Alumnos Sin Netbook</button> 	                    
	                                        
	                </p>
	                		
	         
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
