<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include('modales/musuarios.php');
 ?>
 <div class="col-md-9">
     <div class="main-color-bg">
        <h3 class="card-header">Usuarios</h3>
     </div>

     <div class="card">
         <div class="card-body">
             <div class="row">
                 <div class="col-md-12">
                 <input id="bsq" class="form-control" type="text" placeholder="Filtrar Usuarios...">
                 </div>
             </div>
             <br><!-- for -->
             <table id="tablausuarios" class="table table-striped table-hover">
                 <thead>
                     <tr>
                         <th class="tarjeta">Nombres</th>
                         <th class="tarjeta">Apellidos</th>
                         <th class="tarjeta">Correo</th>
                         <th></th>
                     </tr>
                 </thead>
                 <tbody class="buscar"><?php $title = "Presiona aqui para eliminar este Usuario." ?>
                     <?php for ($i=0; $i <count($resultado) ; $i++) { ?>
                     <tr>
                         <td class="tarjeta"><?php echo $resultado[$i]['nombres']; ?></td>
                         <td class="tarjeta"><?php echo $resultado[$i]['apellidos']; ?></td>
                         <td class="tarjeta"><?php echo $resultado[$i]['correo']; ?></td>
                         <td class="tarjeta"> <button class="btn pop-up btn-peru" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="usuarios/borrarUsuario" data-id="<?php echo $resultado[$i]['id_usuario']?>" ?>Borrar</button></td>
                     </tr>
                     <?php } ?>
                 </tbody>
             </table>
             <div class="row tarjeta">
                 <div class="col-md-12"><?php  $title = "Presiona aqui para añadir un nuevo usuario."  ?>
                     <button class="btn pop-up main-color-bg"  data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="usuarios/anadirUsuario">Añadir Usuario</button>
                 </div>
             </div>
        </div>
      </div>
</div>
