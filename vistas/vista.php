<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Administrador</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        <script>
    function eliminar(id)
    {
        if(confirm("¿ Estás seguro de eliminar el registro ? "))
        {
            window.location = "index.php?id_eliminar=" + id;
        }
    }

    function modificar(id)
    {
        window.location = "index.php?id_mod=" + id;        
    }

    function validar()
    {
        var nombre = document.getElementById("txtnombre").value;
        var btnmod = document.getElementById("btninsertar").value;

        if (nombre.trim() == "")
        {
            alert("Faltan datos");
            return false;
        }

        if (btnmod == 'Modificar') 
        {
            if(!confirm("¿ Estas seguro de modificar el archivo ?"))
            {
                return false;
            }
        }         
        return true;
    }
</script>


    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">vista admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <br><br>
        <section class="masthead">
                <div class="container p-3 bg-primary text-white">
                    <p class="text-center">REGISTRAR EMPLEADOS</p>
                    <form action="index.php" method="POST" id="frminsertar" name="frminsertar" onsubmit="return validar();" >
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nombre" name="txtnombre" id="txtnombre" value="<?php echo @$cat_mod[0][1]; ?>">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Apellido" name="txtapellido" id="apellido" value="<?php echo @$cat_mod[0][2]; ?>">
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Puesto" name="txtpuesto" id="txtpuesto" value="<?php echo @$cat_mod[0][3]; ?>">
                        </div> 
                        </div>
                        <br>
                        <div style="text-align: center;">
                          <input type="submit" class="btn btn-dark" name="btninsertar" id="btninsertar" value="<?php 
                        if(isset($_GET['id_mod']))
                        { 
                            echo 'Modificar';
                        } 
                        else
                        {
                            echo 'Insertar';
                        }
                        ?>"> 
                        </div>
                    </form>
                </div>
        </section>
        <br>
        <br>
        <section class="masthead">
                <div class="container p-3 bg-primary text-white">
                    <p class="text-center">BUSCAR</p>
                    <form action="index.php" method="POST" id="frmbuscar" name="frmbuscar" >
                    <div class="row">
                        <div class="col">
                        <input type="text" class="form-control" id="txtnombrebuscar" name="txtnombrebuscar" placeholder="Nombre a buscar">
                        </div>
                        <div class="col-sm-1">  
                        <input type="submit" class="btn btn-dark" id="btnbuscar" name="btnbuscar" value="Buscar">           
                    </div>
                    <br><br><br>
                    <table class="table table-dark table-striped">
                    <tr>
                        <td>id</td>
                        <td>Nombre</td>
                        <td>apellido</td>
                        <td>puesto</td>
                        <td>accion</td>
                    </tr>
                   <?php echo $tabla_result; ?>
                </table>
        </section>  
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
