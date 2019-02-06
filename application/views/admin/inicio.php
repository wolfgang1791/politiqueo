<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>


<div class="col-md-9">
    <div class="main-color-bg">
        <h3 class="card-header">Bienvenido</h3>
    </div>
    <?php
    $result = totalModulos($this->session->userdata('id_rol'));
    for ($i=0; $i <count($resultado) ; $i++) {
        if( ( $i % 3 ) == 0){ ?>
    <div class="card-group tarjeta"> <?php } ?>
        <div class="card">
            <div class="card-body">
                    <?php if($resultado[$i]['id_modulo'] < 3) {?>
                        <h2><span aria-hidden="true"></span><?php echo $result[$i]; ?> </h2>
                    <?php }
                    else{?>
                        <h1><span aria-hidden="true"><ion-icon name="people"></ion-icon></span></h1>
                    <?php } ?>
                    <h4><?php echo $resultado[$i]['nombre']?></h4>
             </div>
        </div>
         <?php if(( $i % 3 ) == 2){ ?>
    </div>
    <?php }} ?>
</div>
