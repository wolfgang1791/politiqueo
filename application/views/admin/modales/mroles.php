
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel"><?php echo (isset($edicion))? ('Editar Rol') : ('Añadir Rol')?></h4>
    <button type="button" class="btn close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
    <?php echo form_open(isset($edicion)? ('rol/recibirdatos/?id_rol='.$id_rol) : ('rol/recibirdatos'), array("id"=>"form-validado")); ?>
    <div class="form-group">
        <label>Descripción</label>
        <?php
        $descripcion = array('type'=>'text','name'=> 'descripcion','id'=>'descripcion','placeholder'=>'Descripción','class'=>'form-control','value'=>(isset($dataRol)? (set_value('descipcion',$dataRol['descripcion'])) : (set_value('descipcion'))));
        echo form_input($descripcion);
        ?>
        <?php echo form_error('descripcion','<div class="form-error">*', '</div>'); ?>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
            <label>Modulos Asignados</label><br>
            </div>
        </div>
		<div class="row">
			<div class="col-md-6">
				<?php
				$modulos = getModulos();
				$aux = count($modulos);
				for ($i=0; $i < $aux; $i++) {
					if($i <= ($aux/2)){?>
						<div class="row">
							<div class="col-md-8"><?= $modulos[$i]['nombre'];?></div>
							<label class="switch">
							<?php
							$checkbox = array('type'=>'checkbox','name'=> 'modulos[]','id'=>'modulos','value'=>$modulos[$i]['id_modulo']);
							if(isset($dataRol)){
								if($dataRol['modulos'][$i]['asignado'] == 1){
									$checkbox['checked'] = '';
								}
							}
							echo form_input($checkbox);
							?>
							<span class="slider round"></span>
							</label>
						</div>
					<?php
					}
					else {
						if($i-$aux/2 <= 1 && $i-$aux/2 >= 0){?>
						</div>
						<div class="col-md-6">
						<?php
						}?>
						<div class="row">
							<div class="col-md-8"><?= $modulos[$i]['nombre'];?></div>
							<label class="switch">
							<?php
							$checkbox = array('type'=>'checkbox','name'=> 'modulos[]','id'=>'modulos','value'=>$modulos[$i]['id_modulo']);
							if(isset($dataRol)){
								if($dataRol['modulos'][$i]['asignado'] == 1){
									$checkbox['checked'] = '';
								}
							}
							echo form_input($checkbox);
							?>
							<span class="slider round"></span>
							</label>
						</div>
					<?php
					}
				}
				?>
			</div>
		</div>
		<?php echo form_error('modulos[]','<div class="form-error">*', '</div>');?>
    </div>
    <?php echo form_close(); ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <button type="button" id="act" class="btn main-color-bg send-form"><?echo isset($edicion)? ('Actualizar') : ('Guardar') ?></button>
</div>
<script src="js/validations.js"></script>
