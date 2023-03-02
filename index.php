<?php

    $dato_buscar = @$_POST['txtnombrebuscar'];
    $nombre = @$_POST['txtnombre'];
    $apellido = @$_POST['txtapellido'];
    $puesto = @$_POST['txtpuesto'];

    require 'modelos/modelo.php';

    $obj_empleados = new empleados();

    if (isset($_POST['btninsertar']))
            {
                if ($_POST['btninsertar']=="Insertar") 
                {
                    $obj_empleados->Insertar($nombre,$apellido,$puesto);
                    header("Location: index.php");
                }
                else
                {
                    $id = @$_GET['id_mod'];
                     $obj_empleados->Modificar($nombre, $apellido, $puesto, $id);
                }
            }
            else if (isset($_GET['id_eliminar']))
            {
                $id = $_GET['id_eliminar'];

                 $obj_empleados->Eliminar($id);
            }
            else if (isset($_GET['id_mod']))
            {
                $id = $_GET['id_mod'];
                $cat_mod = $obj_empleados->Buscar_Mod($id);  
            }

            $result = $obj_empleados->Buscar($dato_buscar);
            $tabla_result = $obj_empleados->Tabla_buscar($result);

            require 'vistas/vista.php';

?>