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
class Iterador{

	private $_array;
			
	public function Iterador(){}
	
	public function iterarObjeto($_array){
	$this->_array = $_array;
	
	$_objeto = mysql_fetch_array($this->_array);
		
	return $_objeto;
	}
	
	
	public function iterarObjetos($_array){
	$this->_array = $_array;
		
	$tupla=1;       		
            while($_objeto=mysql_fetch_array($this->_array)) {
								
				$_atributos = array_keys($_objeto);
												
				for($i=1;$i<=count($_atributos);$i++){
				
					if($i%2!=0){
						$_objetos[$tupla][$_atributos[$i]] = $_objeto[$_atributos[$i]];				
					}				
				}	
                $tupla++;
			}  
			
	return $_objetos;	
}
	
	
	
}	
?>

