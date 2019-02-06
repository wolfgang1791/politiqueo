<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="section-principal">
    <div class="container">
        <?php
        for($i=0; $i<count($dataOrganos); $i++){
            if(($i % 2)==0){?>
            <div class="row justify-content-center">
        <?php } ?>
            <div class="tarjeta col-md-3">
                <a href="organos/?id=<?php echo $dataOrganos[$i]['id_organo']?>">
                    <img src="<?php echo $dataOrganos[$i]['imagen']?>" alt="<?php echo $dataOrganos[$i]['descripcion']?>" class="imagen">
                    <h3><?php echo $dataOrganos[$i]['titulo']?></h3>
                </a>
            </div>
        <?php if(($i % 2)==1){?>
            </div>
        <?php } ?>
        <?php
        }?>
    </div>
</section>
