    <h5>Cargo(s) actual(es) u ocupado(s)</h5>
    <div class="form-group row">
        <label for="cargoP" class="col-sm-2 col-form-label">Cargo</label>
        <div class="col-sm-7"><?php $title = "Aqui debes elegir el cargo ocupado por el político del total registrados.\nPor ejemplo: Presidente de la Comision de Ética,etc. Según sea el caso.
                                              \nEn caso de no existir el cargo en las opciones debes pinchar en el boton de la derecha Añadir Cargo para registrarlo."; ?>
            <select class="select-cargo form-control" name="cargoP[]"  data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" id="sel" >
              <option name="cargoP[]" value=" ">Cargos Registrados</option>
              <?php for ($i=0; $i <count($cargos) ; $i++) { ?>
                   <option name="cargoP[]" value="<?php echo $cargos[$i]['id_cargo']; ?>"><?php echo $cargos[$i]['descripcion'] ?></option>
              <?php } ?>
            </select>
        <?php echo form_error('cargoP','<div class="form-error">*', '</div>'); ?>
        </div>
        <div class="col-sm-3 align-self-center "><?php $title = "Presiona aqui para añadir un cargo nuevo."; ?>
        <button type="button" class="btn btn-peru pop-up btn-sm"  data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="<?php echo base_url()."cargo"; ?>">Añadir Cargo</button>
        </div>
    </div>
     <div class="form-group row">
         <label for="añoiniciocP" class="col-sm-2 col-form-label">Fecha de inicio</label>
         <div class="col-sm-10">
         <?php
         $title = "Aqui debes ingresar la fecha en que inicio a ejercer el cargo\nPor ejemplo: 28/07/2016.";
         $añoinicio = array('type'=>'date','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>$title,'class'=>'form-control','name'=>'añoiniciocP[]','placeholder'=>'Año de Inicio','value'=>'');
         echo form_input($añoinicio);
         ?>
         <?php echo form_error('añoinicioP','<div class="form-error">*', '</div>'); ?>
         </div>
     </div>
     <div class="form-group row">
         <label for="añofinalcP" class="col-sm-2 col-form-label">Fecha de termino</label>
         <div class="col-sm-10">
         <?php
         $title = "Aqui debes ingresar la fecha en que dejo de ejercer el cargo\nPor ejemplo: 28/07/2017.";
         $añofinal = array('type'=>'date','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>$title,'class'=>'form-control','name'=>'añofinalcP[]','placeholder'=>'Año de Culminación','value'=>'');
         echo form_input($añofinal);
         ?>
         <?php echo form_error('añofinalP','<div class="form-error">*', '</div>'); ?>
         </div>
     </div>
    </div>

    <script type="text/javascript">
    $(".pop-up").click(function(){
        var btn = $(this);;
        $.post(btn.attr("href"), {"idObj":$(this).attr("data-id")},function(data){
            $("#modal-target .modal-content").html("");
            $("#modal-target .modal-content").html(data);
            $("#modal-pop-up").modal();
        }).fail(function(){
            alert( "Error de red" );
        })
    });
    </script>
