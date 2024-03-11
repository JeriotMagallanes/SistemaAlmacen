<?php
    require_once 'datatable.php';
    require_once 'acceso-seguro.php';
    if($_SESSION['nivelacceso'] == 'Médico'){
        echo "<strong>No tiene el nivel de acceso requerido</strong>";
        exit();
    }
?>

<style>
    .asignar{
        display: none !important;
    }
</style>

<div class="row">
    <div class="col-md-4">
        <div class=" card card-outline card-info">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-title mt-1" style="font-size: 22px" id="Aviso">Registro de Productos</p>
                    </div>
                    <div class="col-md-6">
                        <a data-toggle='modal' data-target="#modalrestock" href="#">
                            <button style="background-color: white; font-size: 18px" type="button" class="btn botones-card float-right"><i class="fas fa-tags"></i> &nbsp;Restock</button>
                        </a>
                    </div>
                </div>
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="" id="formularioFarmacia" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <label for="idcategoria">Categoría</label>
                                <select class="form-control form-control-border" name="idcategoria" id="idcategoria">
                                </select>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="nombreproducto">Producto:</label>
                                <input name="" id="nombreproducto" class="form-control form-control-border"  data-idproductomod="" class="form-control"></input>
                                <input type="text" id="idproductomod" class="form-control form-control-border asignar" disabled>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="stock">Stock:</label>
                                <input type="number" min="1" id="stock" class="form-control form-control-border">
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="fotografia">Fotografia:</label>
                                <input type="file" id="fotografia" class="form-control form-control-border">
                            </div>         
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-right bg-white">
                <button type="button" class="btn bg-gradient-secondary" id="cancelar">Cancelar</button>
                <button type="button" class="btn bg-gradient-info" id="registrar">Guardar</button>
                <button type="button" class="btn bg-gradient-info asignar" id="actualizar">Actualizar</button>
            </div>
            <!-- /.card-footer -->
        </div>
    </div>
    <div class="col-md-8">
        <div  class=" card card-outline card-info">
            <div class="card-header">
                <div class="row col-md-12">
                    <div class="col-md-9">
                        <p class="card-title" style="font-size: 22px">Lista de Productos</p>
                    </div>
                    <div class="col-md-3">
                        <select name="categoriaselect" id="categoriaselect" class="form-control float-right">
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table text-center" id="tablaProducto">
                    <thead>
                        <tr>
                            <th class="text-center">N°</th>
                            <th class="text-center">Categoría</th>
                            <th class="text-center">Producto</th>
                            <th class="text-center">Stock</th>
                            <th class="text-center">Fotografia</th>
                            <th class="text-center">Operaciones</th>
                        </tr>
                    </thead>
                    <tbody class="table" id="tablaProductolistar">
                        <!-- Se carga de manera dinamica -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalrestock" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrar un restock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset class="border p-2">
                                <legend  class="w-auto" style="font-size:12px">Complete los datos correctamente</legend>
                                <form action="" id="formularioRestock" class="p-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="idcategoriamodal">Categoría</label>
                                                <select class="form-control form-control-border" name="idcategoria" id="idcategoriamodal">
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="idproductomodal">Producto</label>
                                                <select class="form-control form-control-border" name="idproductomodal" id="idproductomodal">
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="cantidad">Cantidad</label>
                                                <input type="number" min="1" class="form-control form-control-border" id="cantidad">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="detallereestock">Detalle</label>
                                                <textarea class="form-control form-control-border" id="detallereestock"></textarea>
                                            </div>
                                        </div> 
                                    </div>
                                </form>
                                <div class="card-footer text-right bg-white">
                                    <button type="button" class="btn bg-gradient-secondary" id="cancelarRestock">Cancelar</button>
                                    <button type="button" class="btn bg-gradient-info" id="btnRegistrarRestock">Registrar</button>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/productos.js"></script>
