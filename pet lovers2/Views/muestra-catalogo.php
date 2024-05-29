<!DOCTYPE html>
<html lang="en">



<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PetLovers</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
<img width="100%" style="position: fixed; z-index: 1000;" src="../assets/img/barra.png">         
        
      </div>
      <!--/.nav-collapse -->
    </div>

<!-- Begin Page Content -->
                <div style="position: relative; top: 100px;" class="container-fluid">

                    <p><a href="UsuariosController.php?accion=inicio">Home</a> -> <a href="UsuariosController.php?accion=catalogo">Catálogo</a></p>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Catálogo</h1>
                    </div>

                    <?php 
                        $productos = $this->model->ConsultarProductos();
                     ?>


                    <!-- Content Row -->
                    <div class="row">
                        <?php foreach ($productos as $producto) { ?>
                            <div class="col-lg-3 mb-4">
                                <div class="card shadow mb-4">
                                    <img src="../assets/img/catalogo/<?php echo $producto->Img_producto ?>">
                                        <div class="card-body">
                                            <form method="POST" action="ProductosController.php" enctype="multipart/form-data">
                                                    <input type="hidden" name="accion" value="carrito">
                                                <h4 class="text-info"><b><?php echo $producto->Nom_producto ?></b></h4>
                                                    <input type="hidden" name="nombre" value="<?php echo $producto->Nom_producto ?>">
                                                <h5>$ <?php echo $producto->Valor_producto ?></h5>
                                                    <input type="hidden" name="valor" value="<?php echo $producto->Valor_producto ?>">
                                                <br>
                                                    <input type="hidden" name="imagen" value="<?php echo $producto->Img_producto ?>">

                                                <p><i><?php echo $producto->Desc_producto ?></i></p>
                                                <br>
    
                                                <a href="UsuariosController.php?accion=home" type='submit' class='btn btn-info'>Agregar al carrito</a>
                                              
                                            </form>
                                        </div>
                                </div>
                            </div>
                     <?php  } ?>
                    </div>

            
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
