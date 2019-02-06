<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>


<div class="col-md-9">
    <div class="main-color-bg">
       <h3 id="bsq" class="card-header">Partidos</h3>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                <input class="form-control" type="text" placeholder="Filtrar Partidos...">
                </div>
            </div>
            <br>
            <table class="table table-striped table-hover tarjeta">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="buscar">
                    <?php for ($i=0; $i <count($resultado) ; $i++) { ?>
                    <tr>
                        <td><?php echo $resultado[$i]['nombre']; ?></td>
                        <?php $title = "Presiona aqui para poder Editar el nombre o la direccion de la Imagen(URL) de este partido.";?>
                        <td><button class="btn btn-peru pop-up" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="partido/actualizarpartido" data-id="<?php echo $resultado[$i]['id_partido']?>">Editar</button></td>
                        <?php
                        $title = "Presiona aqui para ocultar este partido.";
                        if($resultado[$i]['estadop'] == 1) {?>
                        <td><button class="btn btn-peru pop-up"  data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="partido/borrarpartido" data-id="<?php echo $resultado[$i]['id_partido']?>">Eliminar</button></td>
                        <?php } ?>
                        <?php
                        $title = "Presiona aqui para mostrar este partido.";
                        if($resultado[$i]['estadop'] == 0) {?>
                        <td><button class="btn btn-success pop-up" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="partido/activarpartido" data-id="<?php echo $resultado[$i]['id_partido']?>">Activar</button></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="row tarjeta">
                <div class="col-md-12"><?php $title = "Presiona aqui para añadir un partido.\nPor ejemplo: Perú Posible,etc." ?>
                    <button class="btn pop-up btn-peru" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="partido/anadirpartido">Añadir Partido</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
