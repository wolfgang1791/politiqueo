<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="modal-header main-color-bg">
    <h5 class="modal-title" id="exampleModalLongTitle">Quiero Contribuir</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <?=form_open(base_url()."Login/acceso",$atributos)?>
	<?=form_close()?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-peru" data-dismiss="modal">Cancelar</button>
    <button id="delete" type="button" idobjeto="" href="" class="btn btn-peru">Sí</button>
</div>
