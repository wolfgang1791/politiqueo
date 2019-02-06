<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="col-md-9">
    <div class="main-color-bg">
       <h3 class="card-header">Organos</h3>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                <input id="bsq" class="form-control" type="text" placeholder="Filtrar Organo...">
                </div>
            </div>
            <br>
            <table class="table table-striped table-hover tarjeta">
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Titulo</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="buscar">
                    <?php for ($i=0; $i <count($resultado) ; $i++) { ?>
                    <tr>
                        <td><?php echo $resultado[$i]['descripcion']; ?></td>
                        <td><?php echo $resultado[$i]['titulo']; ?></td>
                        <?php $title = "Presiona aqui para poder Editar el nombre o la direccion de la Imagen(URL) de este órgano." ?>
                        <td><button class="btn pop-up main-color-bg" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="organo/actualizarorgano" data-id="<?php echo $resultado[$i]['id_organo'];?>">Editar</button></td>
                        <?php
                            $title = "Presiona aqui para ocultar este órgano.";
                            if($resultado[$i]['estado'] == 1) {?>
                        <td><button class="btn btn-peru pop-up" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="organo/borrarorgano" data-id="<?php echo $resultado[$i]['id_organo']?>">Eliminar</button></td>
                        <?php } ?>
                        <?php
                            $title = "Presiona aqui para mostrar este órgano.";
                            if($resultado[$i]['estado'] == 0) {?>
                        <td><button class="btn btn-success pop-up" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="organo/activarorgano" data-id="<?php echo $resultado[$i]['id_organo']?>">Activar</button></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="row tarjeta">
                <div class="col-md-12"><?php $title = "Presiona aqui para añadir un órgano.\nPor ejemplo: Municipio de Lima,etc." ?>
                <button class="btn pop-up main-color-bg" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="organo/anadirorgano">Añadir Organo</button>
                </div>
            </div>
        </div>
    </div>
</div>
