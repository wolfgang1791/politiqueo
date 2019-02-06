    <h5>Caso(s) involucrado(s)</h5>
    <div class="form-group row">
        <label for="delitoP" class="col-sm-2 col-form-label">Grado</label>
        <div class="col-sm-7"><?php $title = "Aqui debes elegir el tipo de delito cometido por el político del total registrados.\nPor ejemplo: Lavado de Activos,etc. Según sea el caso.
                                              \nEn caso de no existir el delito en las opciones debes pinchar en el boton de la derecha Añadir Delito para registrarlo."; ?>
            <select class="select-delito form-control" name="delitoP[]" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" id="sel" >
              <option name="delitoP[]" value=" ">Delitos Registrados</option>
               <?php for ($j=0; $j <count($delitos) ; $j++) { ?>
                      <option name="delitoP[]" value="<?php echo $delitos[$j]['id_delito']; ?>"> <?php echo $delitos[$j]['nombre']; ?> </option>
               <?php } ?>
            </select>
        </div>
        <div class="col-sm-3 align-self-center "><?php $title = "Presiona aqui para añadir un tipo de delito nuevo."; ?>
        <button type="button" class="btn btn-peru pop-up btn-sm" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="delito">Añadir Delito</button>
        </div>
     </div>
     <div class="form-group row">
         <label for="descripciondP" class="col-sm-2 col-form-label">Caso</label>
         <div class="col-sm-10">
         <?php
         $title = "Aqui debes escribir los detalles del hecho de corrupcion en el que se vio implicado el politico.";
         $descripciond = array('type'=>'text','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>$title,'class'=>'form-control autoExpand','name'=>'descripciondP[]','rows'=>5,'data-min-rows'=>5,'placeholder'=>'Descripción del caso de corrupción','value'=>'');
         echo form_textarea($descripciond);
         ?>
         <?php echo form_error('descripciondP','<div class="form-error">*', '</div>'); ?>
         </div>
     </div>
     <div class="form-group row">
         <label for="fechaP" class="col-sm-2 col-form-label">Fecha Registrada</label>
         <div class="col-sm-10">
         <?php
         $title = "Aqui debes ingresar la fecha en que se cometio el hecho de corrupción\nPor ejemplo: 28/07/2016.";
         $fecha = array('type'=>'date','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>$title,'class'=>'form-control','name'=>'fechadP[]','placeholder'=>'Fecha','value'=>'');
         echo form_input($fecha);
         ?>
         <?php echo form_error('fechadP','<div class="form-error">*', '</div>'); ?>
         </div>
     </div>

    <script type="text/javascript">
    $(".pop-up").click(function(){
        var btn = $(this); alert(btn.attr("href"));
        $.post(btn.attr("href"), {"idObj":$(this).attr("data-id")},function(data){
            $("#modal-target .modal-content").html("");
            $("#modal-target .modal-content").html(data);
            $("#modal-pop-up").modal();
        }).fail(function(){
            alert( "Error de red" );
        })
    });

        $(document)
        .one('focus.autoExpand', 'textarea.autoExpand', function(){
        var savedValue = this.value;
        this.value = '';
        this.baseScrollHeight = this.scrollHeight;
        this.value = savedValue;
        })
        .on('input.autoExpand', 'textarea.autoExpand', function(){
        var minRows = this.getAttribute('data-min-rows')|0, rows;
        this.rows = minRows;
        rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 16);
        this.rows = minRows + rows;
    });
    </script>
