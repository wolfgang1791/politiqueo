<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <div class="row" align='center'>
        <h1>Congresistas de <?php echo $nombrePartido[0]['nombre']?></h1>
    </div>
    <?php
    for($i=0; $i<count($listaPoliticos); $i++){
        if(($i % 2)==0){?>
        <div class="row justify-content-center">
    <?php } ?>
        <div class="col-md-5 tarjeta">
            <a href="<?php echo base_url()."politicos/?id=".$listaPoliticos[$i]['id_politico']?>">
                <div class="row">
                    <div class="col-4" align='center'>
                        <figure class="figure">
                            <img src="<?php echo $listaPoliticos[$i]['imagen']?>" alt="" height="100px">
                        </figure>
                    </div>
                    <div class="col-8" align='center'>
                        <h4><?php echo $listaPoliticos[$i]['nombres']?><br><?php echo $listaPoliticos[$i]['apellidos']?></h4>
                    </div>
                </div>
            </a>
        </div>
    <?php if(($i % 2)==1){?>
        </div>
    <?php } ?>
    <?php
    }?>
</div>
