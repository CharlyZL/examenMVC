<?php

require 'bd/conexion_bd.php';

class empleados extends BD_PDO
{
	function Insertar($nombre, $apellido, $puesto)
	{
		$this->Ejecutar_Instruccion("Insert into tblempleados(Nombre, apellido, puesto) values('$nombre','$apellido','$puesto')");
	}
	function Buscar($dato_buscar)
	{
		$result = $this->Ejecutar_Instruccion("Select * from tblempleados where nombre like '%$dato_buscar%' order by nombre");
		return $result;
	}
	function Eliminar($id)
	{
		$this->Ejecutar_Instruccion("delete from tblempleados where id = '$id'");
	}
	function Modificar($nombre, $apellido, $puesto, $id)
	{
		$this->Ejecutar_Instruccion("Update tblempleados set nombre='$nombre', apellido='$apellido', puesto='$puesto' where id ='$id'");
	}
	function Buscar_Mod($id)
	{
		 $cat_mod = $this->Ejecutar_Instruccion("Select * from tblempleados where id = '$id'");
		 return $cat_mod;  
	}

	function Tabla_buscar($result)
	{
		$tabla="";
		 foreach ($result as $renglon) 
		 {
            $tabla.='<tr>';
            $tabla.='<td>'.$renglon[0].'</td>';
            $tabla.='<td>'.$renglon[1].'</td>';
            $tabla.='<td>'.$renglon[2].'</td>';
            $tabla.='<td>'.$renglon[3].'</td>';
            $tabla.='<td><input type="button" class="btn btn-danger" id="btnbuscar" name="btnbuscar" value="Eliminar" onclick="javascript: eliminar('.$renglon[0].');"></td>';
        }
        return $tabla;
	}
}	


?>