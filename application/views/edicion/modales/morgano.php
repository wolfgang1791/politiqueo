        <?php
            $valueid = "";
            $valuedescripcion = "";
            $valuetitulo = "";
            $valueurl = "";
            $direccion = "";
            $titulo = "";
            if(isset($resultado)){
                $valueid = $resultado[0]['id_organo'];
                $valuedescripcion = $resultado[0]['descripcion'];
                $valuetitulo = $resultado[0]['titulo'];
                $valueurl = $resultado[0]['imagen'];
                $direccion = base_url().'organo/actualizar';
                $titulo = "Editar";
            }
            else{
                $valuedescripcion = set_value('descripcion');
                $valuetitulo = set_value('titulo');
                $valueurl = set_value('url');
                $direccion = base_url().'organo/recibirdatos';
                $titulo = "Añadir";
            }
        ?>
        <div class="modal-header main-color-bg">
            <h4 class="modal-title " id="titleorgano"><?php echo $titulo; ?> Organo</h4>
            <button type="button" class="btn close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <?php echo form_open($direccion,array('id'=>'form-validado')); ?>
            <input type="hidden" name="id" value="<?php echo $valueid; ?>">
            <div class="form-group">
                <label>Descripción</label>
                <?php
                $title = "Aqui debes ingresar una descripcion general de la organización.\nPor ejemplo: Municipalidad de Lima.";
                $descripcion = array('type'=>'text','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>$title,'placeholder'=>'Descripcion','class'=>'form-control','name'=>'descripcion','value'=>$valuedescripcion);
                echo form_input($descripcion);
                ?>
                <?php echo form_error('descripcion','<div class="form-error">*', '</div>'); ?>
            </div>
            <div class="form-group">
                <label>Titulo</label>
                <?php
                $title = "Aqui debes ingresar el título del órgano.\nPor ejemplo: Municipio de Lima.";
                $titulo = array('type'=>'text','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>$title,'name'=> 'titulo','placeholder'=>'Titulo','class'=>'form-control','value'=>$valuetitulo);
                echo form_input($titulo);
                ?>
                <?php echo form_error('titulo','<div class="form-error">*', '</div>'); ?>
            </div>
            <div class="form-group">
                <label>Imagen o Logo</label>
                <?php
                $title = "Aqui debes ingresar la dirección de la imagen(URL) del logo del órgano.\nPor ejemplo: https://yt3.ggpht.com/a-/ACSszfEOWO_CqeQ10sMdLF-93CTMKi6bV1mJR9UQEQ=s900-mo-c-c0xffffffff-rj-k-no.";
                $url = array('type'=>'text','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>$title,'name'=> 'url','placeholder'=>'URL de Imagen','class'=>'form-control','value'=>$valueurl);
                echo form_input($url);
                ?>
                <?php echo form_error('url','<div class="form-error">*', '</div>'); ?>
            </div>
            <?php echo form_close(); ?>
        </div>
        <div class="modal-footer"><?php $title = "Luego de escribir todos los campos requeridos, presiona para guardar la información."; ?>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" class="btn main-color-bg send-form">Guardar</button>
        </div>

<script src="js/validations.js"></script>
