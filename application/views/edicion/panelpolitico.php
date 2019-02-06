<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id = "regPolitico" class="col-md-9">
    <div class="main-color-bg">
       <h3 class="card-header">Politicos</h3>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                <input id="bsq" class="form-control" type="text" placeholder="Filtrar Politico...">
                </div>
            </div>
            <br>
            <table class="table table-striped table-hover tarjeta">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Partido</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="buscar">
                    <?php for ($i=0; $i <count($resultado) ; $i++) { ?>
                    <tr>
                        <td><?php echo $resultado[$i]['nombres']; ?></td>
                        <td><?php echo $resultado[$i]['apellidos']; ?></td>
                        <td><?php echo $resultado[$i]['nombre']; ?></td>
                        <?php $title = "Presiona aqui para poder Editar lo siguiente:\n\n-Información Personal.\n-Formación Académica\n-Historial de Cargos Públicos\n-Historial de Casos de Corrupción\n\nde este político";?>
                        <td><button class="btn btn-peru pop-upP" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="politico/actualizarpolitico" data-id="<?php echo $resultado[$i]['id_politico']?>">Editar</button></td>
                        <?php if($resultado[$i]['estado'] == 1) {?>
                        <td><button class="btn btn-peru pop-up" href="politico/borrarpolitico" data-id="<?php echo $resultado[$i]['id_politico']?>">Eliminar</button></td>
                        <?php } ?>
                        <?php if($resultado[$i]['estado'] == 0) {?>
                        <td><button class="btn btn-success pop-up" href="politico/activarpolitico" data-id="<?php echo $resultado[$i]['id_politico']?>">Activar</button></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="row tarjeta">
                <div class="col-md-12">
                    <button type="button" class="btn btn-peru pop-upP" href="politico/panelregistrar">Añadir Político</button>
                </div>
            </div>
            <script type="text/javascript">
            $(document).ready(function(){
                $(".pop-upP").click(function(){
                    var btn = $(this);
                    $.post(btn.attr("href"), {"idObj":$(this).attr("data-id")},function(data){
                        $("#regPolitico").html("");
                        $("#regPolitico").html(data);
                    }).fail(function(){
                        alert( "Error de red" );
                    })
                });
            })
            </script>
        </div>
    </div>
</div>
