        <div class="modal-header main-color-bg">
            <h4 class="modal-title " id="titleorgano">Añadir Cargo</h4>
            <button type="button" class="btn close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <?php echo form_open(base_url()."cargo/recibirdatos",array('id'=>'form-validado')); ?>
            <div class="form-group">
                <label>Descripción</label>
                <?php
                $descripcion = array('type'=>'text','placeholder'=>'Descripcion','class'=>'form-control','name'=>'descripcion','value'=>'');
                echo form_input($descripcion);
                ?>
                <?php echo form_error('descripcion','<div class="form-error">*', '</div>'); ?>
            </div>
            <div class="form-group">
                <label>Periodo</label>
                <?php
                $periodo = array('type'=>'text','name'=> 'periodo','placeholder'=>'Periodo','class'=>'form-control','value'=>'');
                echo form_input($periodo);
                ?>
                <?php echo form_error('periodo','<div class="form-error">*', '</div>'); ?>
            </div>
            <div class="form-group">
                <label>Tipo de Periodo</label>
                <?php
                $tipoperiodo = array('type'=>'text','name'=> 'tipoperiodo','placeholder'=>'Tipo de periodo','class'=>'form-control','value'=>'');
                echo form_input($tipoperiodo);
                ?>
                <?php echo form_error('tipoperiodo','<div class="form-error">*', '</div>'); ?>
            </div>
            <?php echo form_close(); ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn main-color-bg recv-form">Guardar</button> <!--send form clase para enviar el formulario form-validado -->
        </div>

        <script>
        $('.recv-form').click(function(){
                var form = $("#form-validado");
                $.post(form.attr('action'), form.serialize(), function(data){
                    if(data.result == "success"){
                        $('#modal-pop-up').modal('hide');
                        $(".select-cargo").append('<option name="'+data.option.name+'[]" value="'+data.option.valor+'">'+data.option.opcion+'</option>');
                    }
                    else {
                        $("#modal-target .modal-content").html(data);

                    }
                }).fail(function(){
                    alert( "Error en la red" );
                });
            }
        );

        </script>
