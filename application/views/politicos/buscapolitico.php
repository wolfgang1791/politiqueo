<?php if( isset( $filtrar ) ){
        for ($i=0; $i <count($filtrar) ; $i++) { ?>
            <a class="home-link" href="<?php echo base_url()."politicos/?id=".$filtrar[$i]['id_politico']?>">
                <div class="display_box" align="left">
                    <div style="float:left; margin-right:6px;">
                        <img src="<?php echo $filtrar[$i]['imagen'];?>" width="60" height="60">
                    </div>
                    <div style="margin-right:6px;">
                        <b><?php echo $filtrar[$i]['nombres']." ".$filtrar[$i]['apellidos'];?></b>
                    </div>
                    <div style="margin-right:6px; font-size:14px;" class="desc">
                        <?php echo "";?>
                    </div>
                </div>
            </a>
        <?php }
    } ?>
