<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style-congresistas.css">
<div class="container">
    <div class="row" align='center'>
        <h1>CONGRESISTAS DE <?php echo $partido?></h1>
    </div>
    <?php for($i=0;$i<10;$i++){?>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="celda row">
                    <figure class="figure">
                        <img src="<?php echo base_url()?>img/congreso/congresistas/fotaso.png">
                    </figure>
                    <div class="celda-nombre col-md-8" align='center'>
                        <h3>Erick Rafael Camilo Taipe Carrion</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-5 offset-md-1">
                <div class="celda row">
                    <figure class="figure">
                        <img src="<?php echo base_url()?>img/congreso/congresistas/fotaso.png">
                    </figure>
                    <div class="celda-nombre col-md-8" align='center'>
                        <h3>Erick Rafael Camilo Taipe Carrion</h3>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
</div>
