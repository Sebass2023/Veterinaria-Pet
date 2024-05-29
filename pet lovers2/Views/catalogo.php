 

 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <p><a href="UsuariosController.php?accion=home">Home</a> -> <a href="ProductosController.php?accion=catalogo">Catálogo</a></p>

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
                                                    <div style="width: 70%;" class='input-group mb-3'>
                                                        <div class='input-group-prepend'>
                                                            <span class='input-group-text'>Cantidad</span>
                                                        </div>
                                                        <input type='number' id='typeNumber' name="cantidad" class='form-control' required />
                                                    </div>
                                                
                                                <?php
                                                if (isset($_SESSION['carrito'])) {
                                                    $busqueda = array_search($producto->Nom_producto, $_SESSION['Nombre_carrito']);
                                                    if ($busqueda) {
                                                        echo "<input type='submit' class='btn btn-info' value='Producto agregado' disabled>";
                                                    }else{
                                                        echo "  
                                                                <button type='submit' class='btn btn-info'>
                                                                    <i class='fa fa-cart-plus' aria-hidden='true'></i> 
                                                                    Agregar al carrito
                                                                </button>";
                                                    }
                                                }else{
                                                    echo "<input type='submit' class='btn btn-info' value='Agregar al carrito'>";
                                                }
                                                ?>
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
