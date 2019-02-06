    <h5>Estudios Universitarios o Postgrado</h5>
    <div class="form-group row">
            <label for="gradoP" class="col-sm-2 col-form-label">Grado</label>
            <div class="col-sm-7"><?php $title = "Aqui debes elegir el grado academico de pregrado o postgrado del total registrados.\nPor ejemplo: Bachiller, Magister, etc. Según sea el caso.
                                                  \nEn caso de no existir el grado academica en las opciones debes pinchar en el boton de la derecha Añadir Grado para registrarlo."; ?>
                <select class="select-grado form-control" name="gradoP[]" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" id="sel" >
                  <option name="gradoP[]" value=" ">Grados Academicos</option>

                  <?php for ($i=0; $i <count($grados) ; $i++) { ?>
                              <option name="gradoP[]" value="<?php echo $grados[$i]['id_grado']; ?>"> <?php echo $grados[$i]['nombre']; ?> </option>
                          <?php } ?>
                </select>
            </div>
            <div class="col-sm-3 align-self-center "><?php $title = "Presiona aqui para añadir un grado nuevo"; ?>
            <button type="button" class="btn btn-peru pop-up btn-sm" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="grado">Añadir Grado</button>
            </div>
     </div>
     <div class="form-group row">
         <label for="carreraP" class="col-sm-2 col-form-label">Carrera</label>
         <div class="col-sm-10">
         <?php
         $title = "Aqui debes ingresar la carrera, en el caso de pregrado, que siguio el politico.\nSi es de postgrado debes ingresar el nombre de la especialidad.";
         $carrera = array('type'=>'text','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>$title,'class'=>'form-control','name'=>'carreraP[]','placeholder'=>'Carrera Universitaria','value'=>'');
         echo form_input($carrera);
         ?>
         <?php echo form_error('carreraP','<div class="form-error">*', '</div>'); ?>
         </div>
     </div>
     <div class="form-group row">
         <label for="añoinicioP" class="col-sm-2 col-form-label">Fecha de inicio</label>
         <div class="col-sm-10">
         <?php
         $title = "Aqui debes ingresar la fecha en que inicio sus estudios\nPor ejemplo: 24/03/2015";
         $añoinicio = array('type'=>'date','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>$title,'class'=>'form-control','name'=>'añoinicioP[]','placeholder'=>'Año de Inicio','value'=>'');
         echo form_input($añoinicio);
         ?>
         <?php echo form_error('añoinicioP','<div class="form-error">*', '</div>'); ?>
         </div>
     </div>
     <div class="form-group row">
         <label for="añofinalP" class="col-sm-2 col-form-label">Fecha de termino</label>
         <div class="col-sm-10">
         <?php
         $title = "Aqui debes ingresar la fecha en que inicio sus estudios\nPor ejemplo: 24/03/2019";
         $añofinal = array('type'=>'date','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>$title,'class'=>'form-control','name'=>'añofinalP[]','placeholder'=>'Año de Culminación','value'=>'');
         echo form_input($añofinal);
         ?>
         <?php echo form_error('añofinalP','<div class="form-error">*', '</div>'); ?>
         </div>
     </div>

     <script type="text/javascript">
     $(".pop-up").click(function(){
         var btn = $(this);
         $.post(btn.attr("href"), {"idObj":$(this).attr("data-id")},function(data){
             $("#modal-target .modal-content").html("");
             $("#modal-target .modal-content").html(data);
             $("#modal-pop-up").modal();
         }).fail(function(){
             alert( "Error de red" );
         })
     });
     </script>
