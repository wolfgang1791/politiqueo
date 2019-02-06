<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="section-organo">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
            <div class="row sec-titulo">
                <div class="col-md-2 col-sm-12 text-center">
                    <h1><b>Congreso</b></h1>
                </div>
            </div>
                <?php
                for($i=0; $i<count($dataPartidos); $i++){
                    if(($i % 4)==0){?>
                    <div class="row justify-content-center">
                <?php } ?>
                    <div class="col-md-3 col-sm-6 col-12 align-self-center tarjeta">
                        <a href="<?php echo base_url()."partidos/?id_partido=".$dataPartidos[$i]['id_partido'] ?>">
                            <figure class="figure">
                                <img class="img-fluid rounded" src="<?php echo $dataPartidos[$i]['imagen'] ?>" height="100" width="100" alt="">
                                <h5 class="text-center"><?php echo $dataPartidos[$i]['nombre'] ?></h5>
                            </figure>
                        </a>
                    </div>
                <?php if(($i % 4)==3){?>
                    </div>
                <?php } ?>
                <?php
                }?>
            </div>
        </div>
    </div>
</section>
