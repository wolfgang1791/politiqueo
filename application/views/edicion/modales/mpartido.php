        <?php
            $valueid = "";
            $valuenombre = "";
            $valueurl = "";
            $direccion = "";
            $titulo = "";
            if(isset($resultado)){
                $valueid = $resultado[0]['id_partido'];
                $valuenombre = $resultado[0]['nombre'];
                $valueurl = $resultado[0]['imagen'];
                $direccion = base_url().'partido/actualizar';
                $titulo = "Editar";
            }
            else{
                $valuenombre = set_value('titulo');
                $valueurl = set_value('url');
                $direccion = base_url().'partido/recibirdatos';
                $titulo = "Añadir";
            }
        ?>
        <div class="modal-header main-color-bg">
            <h4 class="modal-title " id="titleorgano"><?php echo $titulo; ?> Partido</h4>
            <button type="button" class="btn close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <?php echo form_open($direccion,array('id'=>'form-validado')); ?>
            <input type="hidden" name="id" value="<?php echo $valueid; ?>">
            <div class="form-group">
                <label>Nombre</label>
                <?php
                $nombre = array('type'=>'text','placeholder'=>'Nombre de partido','class'=>'form-control','name'=>'nombre','value'=>$valuenombre);
                echo form_input($nombre);
                ?>
                <?php echo form_error('nombre','<div class="form-error">*', '</div>'); ?>
            </div>
            <div class="form-group">
                <label>Imagen o Logo</label>
                <?php
                $url = array('type'=>'text','name'=> 'url','placeholder'=>'URL de Imagen','class'=>'form-control','value'=>$valueurl);
                echo form_input($url);
                ?>
                <?php echo form_error('url','<div class="form-error">*', '</div>'); ?>
            </div>
            <?php echo form_close(); ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn main-color-bg send-form">Guardar</button> <!--send form clase para enviar el formulario form-validado -->
        </div>

        <script src="<?php echo base_url()."js/validations.js";?>"></script>
