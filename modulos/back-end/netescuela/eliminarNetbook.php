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
<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/principal.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/arsoftware/utiles/headerAdmin.php");		
include_once($docRootSitio."utiles/ctrlAcceso.php");	

if($_SESSION['Rol']!=1){
		echo "<h2>No tienes permisos para ingresar a esta p�gina.<h2>";
		exit();	
	}

if($_POST['Netbook']){	
	include_once($docRootSitio."modelo/Alumno.php");		

	$alu1 = new Alumno();	
	$delete = $alu1->eliminarAlumno($_POST['Netbook']);
	
	header("location: listarNetbooks.php?delete=$delete"); 	
	exit();
}
else{
	echo "<h2>No tienes permisos para ingresar a esta p�gina.<h2>";
	exit();	
}
?>