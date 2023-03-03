# examenMVC
pagina con funcion basica con modelo, vista y controlador.

como funciona:

un index simple  con dos formularios el formulario uno es solo para insertar, y el formularo dos es para las funiones de buscar y elim,
los formularios mandan a llamar al index que en el MVC seria el ontrolador.
```php
<form action="index.php" method="POST" id="frminsertar" name="frminsertar" >
```

toda informacion ingresada en el formulario se mandara al controlador donde la informacion se guardara en variables, el controlador tiene todas las funciones que puedes hacer con la informaion que obtiene y tambien se usa como intermediario para llegar al modelo.
```php
$dato_buscar = @$_POST['txtnombrebuscar'];
    $nombre = @$_POST['txtnombre'];
    $apellido = @$_POST['txtapellido'];
    $puesto = @$_POST['txtpuesto'];

    //este archivo ocupa un require hacia el modelo
    require 'modelos/modelo.php';

    $obj_empleados = new empleados();

    if (isset($_POST['btninsertar']))
            {
                if ($_POST['btninsertar']=="Insertar") 
                {
                    $obj_empleados->Insertar($nombre,$apellido,$puesto);
                    header("Location: index.php");
                }
            }
            else if (isset($_GET['id_eliminar']))
            {
                $id = $_GET['id_eliminar'];

                 $obj_empleados->Eliminar($id);
            }
            $result = $obj_empleados->Buscar($dato_buscar);
            $tabla_result = $obj_empleados->Tabla_buscar($result);

            //este archivo ocupa un require hacia la vista
            require 'vistas/vista.php';
```
Ahora toda la informacion ingresada en el formulario y que ya paso por el controlador ahora pasara al modelo, el modelo tiene todas las funciones que puedes hacer con la informacion para poderla ejecutar con bases de datos.
```php
require 'bd/conexion_bd.php';

class empleados extends BD_PDO
{
	function Insertar($nombre, $apellido, $puesto) {
		$this->Ejecutar_Instruccion("Insert into tblempleados(Nombre, apellido, puesto) values('$nombre','$apellido','$puesto')");
	}
	function Buscar($dato_buscar) {
		$result = $this->Ejecutar_Instruccion("Select * from tblempleados where nombre like '%$dato_buscar%' order by nombre");
		return $result;
	}
	function Eliminar($id) {
		$this->Ejecutar_Instruccion("delete from tblempleados where id = '$id'");
	}
	function Buscar_Mod($id) {
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
```
el modelo ocupa de ontro archivo mas que seria la coneccion a la base de datos  y asi  sea funcional nuestro formulario con bases de datos.
