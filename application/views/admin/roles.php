<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 ?>
<div class="col-md-9">
     <div class="main-color-bg">
        <h3 class="card-header">Roles</h3>
     </div>
         <?php for ($i=0; $i <count($resultado) ; $i++) {
         if( ($i % 2) == 0) {?>
         <div class="card-group tarjeta">
         <?php } ?>
            <div class="card">
                <div class="card-body">
                        <h2><span aria-hidden="true"></span><?php echo $resultado[$i]['total']; ?> </h2>
                        <h4><?php echo $resultado[$i]['descripcion'];?></h4>
                        <?php $title0 = "Presiona aqui para editar el nombre y los modulos asignados de este Rol." ?>
                        <button class="btn main-color-bg pop-up" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title0; ?>"  data-id="<?php echo $resultado[$i]['id_rol']?>" href="rol/editarRol" data-descripcion="<?php echo $resultado[$i]['descripcion'] ?>" >Editar Rol</button>
                        <?php $title1 = "Presiona aqui para eliminar este Rol." ?>
                        <button class="btn btn-peru pop-up" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title1; ?>"  data-id="<?php echo $resultado[$i]['id_rol']?>" href="rol/borrarRol">Eliminar Rol</button>
                </div>
            </div>
            <?php if((count($resultado)%2)!=0 && (count($resultado)-1)==$i){?>
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            <?php $i++; }?>
          <?php if( ( $i % 2) == 1 ){ ?>
          </div>
          <?php } } ?>
          <div class="row justify-content-center">
              <div class="col-md-3">
                  <?php $title = "Presiona aqui para añadir un nuevo Rol." ?>
                  <button class="btn pop-up main-color-bg" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="rol/anadirRol">Añadir Rol</button>
              </div>
          </div>
      <script type="text/javascript" src="<?php echo base_url()."js/consultas/roles.js";?>"></script>
</div>
