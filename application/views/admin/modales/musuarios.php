
 <div class="modal-header main-color-bg">
     <h4 class="modal-title " id="myModalLabel">Añadir Usuario</h4>
     <button type="button" class="btn close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 </div>
 <div class="modal-body">
     <?php echo form_open('usuarios/recibirdatos', array("id"=>"form-validado")); ?>
     <div class="form-group">

          <label>Rol</label><br>

          <div class="row offset-1">
              <div class="col-md-4 ">
                  <?php
                  $roles = getRol();
                  for ($i=0; $i < count($roles); $i++) {
                      if(($i % 3) == 0){?>
                 <div class="btn-group btn-group-toggle" data-toggle="buttons">
                 <?php } ?>

                     <label class="btn main-color-bg btn-danger">
                     <?php echo $roles[$i]['descripcion'];
                         $radiobutton = array('type'=>'radio','name'=> 'rol','value'=>$roles[$i]['id_rol']);
                         echo form_input($radiobutton);
                     ?>
                    </label>&nbsp&nbsp
                    <?php if(($i % 3) == 2){ ?>
                 </div>
             <?php }} ?>
              </div>
           </div>
           <?php echo form_error('rol','<div class="form-error">*', '</div>'); ?>
     </div>
     <div class="form-group">
         <label>Nombres</label>
         <?php
         $nombres = array('type'=>'text','name'=> 'nombres','placeholder'=>'Nombres','class'=>'form-control','value'=>set_value('nombres'));
         echo form_input($nombres);
         ?>
         <?php echo form_error('nombres','<div class="form-error">*', '</div>'); ?>
     </div>
     <div class="form-group">
         <label>Apellidos</label>
         <?php
         $apellidos = array('type'=>'text','name'=> 'apellidos','placeholder'=>'Apellidos','class'=>'form-control','value'=>set_value('apellidos'));
         echo form_input($apellidos);
         ?>
         <?php echo form_error('apellidos','<div class="form-error">*', '</div>'); ?>
     </div>
     <div class="form-group">
         <label>Password</label>
         <?php
         $pass = array('type'=>'password','name'=> 'pass','placeholder'=>'Password','class'=>'form-control','value'=>set_value('pass'));
         echo form_input($pass);
         ?>
         <?php echo form_error('pass','<div class="form-error">*', '</div>'); ?>
     </div>
     <div class="form-group">
         <label>Correo</label>
         <?php
         $correo = array('type'=>'email','name'=> 'correo','placeholder'=>'Correo','class'=>'form-control','value'=>set_value('correo'));
         echo form_input($correo);
         ?>
         <?php echo form_error('correo','<div class="form-error">*', '</div>'); ?>
     </div>
     <?php echo form_close(); ?>
 </div>
 <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
     <button type="button" class="btn main-color-bg send-form">Guardar</button> <!--send form clase para enviar el formulario form-validado -->
 </div>

 <script src="js/validations.js"></script>
