<div class="modal-header main-color-bg">
    <h5 class="modal-title" id="exampleModalLongTitle">Confirmación</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <h3>¿Estás seguro de <?php echo $accion; ?> este <?php echo $objeto?>?</h3>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-peru" data-dismiss="modal">Cancelar</button>
    <button id="delete" type="button" idobjeto="<?php echo $id;?>" href="<?php echo $direccion?>" class="btn btn-peru"><?php echo ucfirst($accion); ?></button>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#delete").click(function(){
            var boton = $(this);
            $.post(boton.attr("href"), {"id": boton.attr("idobjeto")}, function(data){
                if(data.result == "success"){
                    $('#modal-pop-up').modal('hide');
                    location.reload();
                }
                else if (data.result == "warning") {
                    alert("Existen elementos inculados");
                }
                else {
                    alert("Ups, no se pudo concretar la accion, error del sistema");
                }
            }).fail(function(){
                alert("Error de red!!!");
            });
        })
    })
</script>
