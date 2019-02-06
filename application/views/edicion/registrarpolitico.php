<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php

        $valueid =  " ";
        $valueimagen = " ";
        $valuenombre =  " ";
        $valueapellido = " ";
        $valuefecnacimiento =  " ";
        $valuedni = " ";
        $valuecargo =  " ";
        $valuerepresenta =  " ";
        $valuecondicion =  " ";
        $direccion = " ";

    if(isset($resultado)){

        $valueid = $resultado['id_politico'];
        $valueimagen = $resultado['imagen'];
        $valuenombre = $resultado['nombres'];
        $valueapellido = $resultado['apellidos'];
        $valuefecnacimiento = $resultado['fec_nacimiento'];
        $valuedni = $resultado['dni'];
        $valuecargo = $resultado['id_cargo'];
        $valuerepresenta = $resultado['representa'];
        $valuecondicion = $resultado['condicion'];
        $direccion = "politico/actualizar";
    }
    else
    {
        $valueimagen = set_value('imagenP');
        $valuenombre = set_value('nombreP');
        $valueapellido = set_value('apellidoP');
        $valuefecnacimiento = set_value('edadP');
        $valuerepresenta = set_value('representaP');
        $valuedni = set_value('dniP');
        $valuecondicion = set_value('condicionP');
        $direccion = "politico/recibirdatos";
    }
?>

    <div class="main-color-bg">
        <h2 class="card-header">Informacion Personal</h2>
    </div>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-10 tarjeta">
                    <figure class="figure">
                        <img id="img" src="<?php echo $valueimagen; ?>" alt="" height="150" width="136" >
                    </figure>
                </div>
                <div class="col-md-10 tarjeta">
                    <?php echo form_open($direccion,array('id'=>'form-validadop')); ?>
                        <input type="hidden" name="id" value=<?php echo $valueid; ?>>
                        <div class="form-group row">
                            <label for="imagenP" class="col-sm-2 col-form-label">Imagen</label>
                            <div class="col-sm-10">
                            <?php
                            $title = "Aqui debes ingresar la direccion de la imagen(URL) relacionada a este politico
                                     \nPor ejemplo: https://upload.wikimedia.org/wikipedia/commons/f/f9/Mart%C3%ADn_Vizcarra_Cornejo_%28cropped%29_%28cropped%29.png
                                      \nAsegurate de escribir el link correctamente";
                            $url = array('type'=>'text','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>$title,'class'=>'form-control','name'=>'imagenP','id'=>'url','placeholder'=>'URL de imagen', 'value' => $valueimagen );
                            echo form_input($url);
                            ?>
                            <?php echo form_error('imagenP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombreP" class="col-sm-2 col-form-label">Nombres</label>
                            <div class="col-sm-10">
                            <?php
                            $title = "Aqui debes ingresar el o los nombre(s) del politico\nPor ejemplo: Martin Alberto";
                            $nombre = array('type'=>'text','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>$title,'class'=>'form-control','name'=>'nombreP','placeholder'=>'Nombre', 'value'=>$valuenombre);
                            echo form_input($nombre);
                            ?>
                            <?php echo form_error('nombreP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombreP" class="col-sm-2 col-form-label">Apellidos</label>
                            <div class="col-sm-10">
                            <?php
                            $title = "Aqui debes ingresar los apellidos del politico\nPor ejemplo: Vizcarra Cornejo";
                            $apellidos = array('type'=>'text','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>$title,'class'=>'form-control','name'=>'apellidoP','placeholder'=>'Apellidos','value'=>$valueapellido);
                            echo form_input($apellidos);
                            ?>
                            <?php echo form_error('apellidoP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edadP" class="col-sm-2 col-form-label">Año de Nacimiento</label>
                            <div class="col-sm-10">
                            <?php
                            $title = "Aqui debes ingresar la fecha de nacimiento del politico\nPor ejemplo: 22/03/1963";
                            $edad = array('type'=>'date','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>$title,'class'=>'form-control','name'=>'edadP','placeholder'=>'Edad','value'=>$valuefecnacimiento);
                            echo form_input($edad);
                            ?>
                            <?php echo form_error('edadP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dniP" class="col-sm-2 col-form-label">DNI</label>
                            <div class="col-sm-10">
                            <?php
                            $title = "Aqui debes ingresar el número de DNI del politico\nPor ejemplo: 04412417
                                      \n Asegurate de que contenga 8 digitos";
                            $dni = array('type'=>'text','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>$title,'class'=>'form-control','name'=>'dniP','placeholder'=>'Documento Nacional de Identidad','value'=>$valuedni);
                            echo form_input($dni);
                            ?>
                            <?php echo form_error('dniP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sel" class="col-sm-2 col-form-label">Bancada</label>
                            <div class="col-sm-7"><?php $title = "Aqui debes elegir el partido político del total registrado al que pertenece.\nPor ejemplo: Peruanos por el cambio.\nEn caso de no pertenecer a ninguno sera No Alineados.
                                                                  \nEn caso de pertenecer a un partido y no aparezca en las opciones debes pinchar en el boton de la derecha Añadir Partido para registrarlo.";?>
                                <select class="form-control"  data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>"  name="bancadaP" id="sel" >
                                  <option name="bancadaP" value="<?php if(isset($resultado)){ echo $partidopolitico[0]['id_partido']; }else{ echo " ";}?>"> <?php if(isset($resultado)){ echo $partidopolitico[0]['nombre']; }else{ echo "Partidos";} ?></option>
                                  <?php for ($i=0; $i <count($partidos) ; $i++) {
                                      if(isset($resultado)){
                                          if($partidopolitico[0]['id_partido'] != $partidos[$i]['id_partido'] ){?>
                                       <option name="bancadaP" value="<?php echo $partidos[$i]['id_partido']; ?>"> <?php echo $partidos[$i]['nombre'] ?> </option>
                                  <?php }
                                }
                                    else{
                                        ?>
                                        <option name="bancadaP" value="<?php echo $partidos[$i]['id_partido']; ?>"> <?php echo $partidos[$i]['nombre'] ?> </option>
                                    <?php }
                                } ?>
                                </select>
                            <?php echo form_error('bancadaP','<div class="form-error">*', '</div>'); ?>
                            </div>
                            <div class="col-sm-3 align-self-center "><?php  $title = "Presiona aqui para añadir un nuevo partido político.";?>
                            <button type="button" class="btn btn-peru pop-up btn-sm" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="partido/anadirpartido">Añadir Partido</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="representaP" class="col-sm-2 col-form-label">Representa</label>
                            <div class="col-sm-10">
                            <?php
                            $title = "Aquí debes ingresar la region, si es que el cargo lo demanda, a la que representa el politico.";
                            $representa = array('type'=>'text','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>$title,'class'=>'form-control','name'=>'representaP','placeholder'=>'Lugar al que representa','value'=>$valuerepresenta);
                            echo form_input($representa);
                            ?>
                            <?php echo form_error('representaP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="condicionP" class="col-sm-2 col-form-label">Condicion</label>
                            <div class="col-sm-10">
                            <?php
                            $title = "Aquí debes ingresar el estado en el que es encuentra el político.\nPuede ser Activo,Inactivo o Suspendido según sea el caso.";
                            $condicion = array('type'=>'text','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>$title,'class'=>'form-control','name'=>'condicionP','placeholder'=>'Condicion','value'=>$valuecondicion);
                            echo form_input($condicion);
                            ?>
                            <?php echo form_error('condicionP','<div class="form-error">*', '</div>'); ?>
                            </div>
                        </div>
                        <!-- -->
                        <hr>
                        <h2>Formación académica</h2>
                        <hr>
                        <?php if( isset( $resultado ) ){
                            if( isset($estudiospolitico) ) {
                            for ($i=0; $i < count($estudiospolitico) ; $i++) {?>
                                <div class="form-group">
                                    <h5>Estudios Universitarios o Postgrado</h5>
                                    <div class="form-group row">
                                            <label for="gradoP" class="col-sm-2 col-form-label">Grado</label>
                                            <div class="col-sm-7">
                                                <select class="form-control" name="gradoP[]" id="sel" >
                                                  <option name="gradoP[]" value="<?php echo $estudiospolitico[$i]['id_grado'];?>"> <?php echo $estudiospolitico[$i]['nombre']?></option>
                                                  <?php for ($j=0; $j <count($grados) ; $j++) { ?>
                                                          <option name="gradoP[]" value="<?php echo $grados[$j]['id_grado']; ?>"> <?php echo $grados[$j]['nombre'];?> </option>
                                                  <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-3 align-self-center ">
                                            <button type="button" class="btn btn-peru pop-up btn-sm" href="grado">Añadir Grado</button>
                                            </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="carreraP" class="col-sm-2 col-form-label">Carrera</label>
                                         <div class="col-sm-10">
                                         <?php
                                         $carrera = array('type'=>'text','class'=>'form-control','name'=>'carreraP[]','placeholder'=>'Carrera Universitaria','value'=>$estudiospolitico[$i]['descripcion']);
                                         echo form_input($carrera);
                                         ?>
                                         <?php echo form_error('carreraP','<div class="form-error">*', '</div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="añoinicioP" class="col-sm-2 col-form-label">Fecha de inicio</label>
                                         <div class="col-sm-10">
                                         <?php
                                         $añoinicio = array('type'=>'date','class'=>'form-control','name'=>'añoinicioP[]','placeholder'=>'Año de Inicio','value'=>$estudiospolitico[$i]['fec_inicio']);
                                         echo form_input($añoinicio);
                                         ?>
                                         <?php echo form_error('añoinicioP','<div class="form-error">*', '</div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="añofinalP" class="col-sm-2 col-form-label">Fecha de termino</label>
                                         <div class="col-sm-10">
                                         <?php
                                         $añofinal = array('type'=>'date','class'=>'form-control','name'=>'añofinalP[]','placeholder'=>'Año de Culminación','value'=>$estudiospolitico[$i]['fec_fin']);
                                         echo form_input($añofinal);
                                         ?>
                                         <?php echo form_error('añofinalP','<div class="form-error">*', '</div>'); ?>
                                         </div>
                                     </div>
                                 </div>
                        <?php }
                        } ?>
                            <div class='form-group' id='formacademico'></div>
                            <div class="form-group row tarjeta justify-content-center">
                                <div class="col-sm-10"><?php $title = "Si el político tiene estudios registrados, presiona aqui para guardar esa información." ?>
                                <button type="button" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>"  href="politico/agregaracademico" class="btn pop-upaca main-color-bg">Agregar Historial Academico</button>
                                </div>
                            </div>
                        <?php }
                        else{?>
                        <div class="form-group" id="formacademico">
                        </div>
                         <div class="form-group row tarjeta justify-content-center">
                             <div class="col-sm-10"><?php $title = "Si el político tiene estudios registrados, presiona aqui para guardar esa información." ?>
                             <button type="button" class="btn main-color-bg pop-upaca" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="politico/agregaracademico">Agregar Historial Academico</button>
                             </div>
                         </div>
                        <?php } ?>
                         <hr>
                         <h2>Historial de cargos públicos</h2>
                         <hr>
                         <?php if( isset($resultado) ) {
                                if( isset($cargospolitico) ){
                                for ($i=0; $i < count($cargospolitico) ; $i++) { ?>
                         <div class="form-group" >
                             <h5>Cargo(s) actual(es) u ocupado(s)</h5>
                             <div class="form-group row">
                                 <label for="cargoP" class="col-sm-2 col-form-label">Cargo</label>
                                 <div class="col-sm-7">
                                     <select class="form-control" name="cargoP[]" id="sel" >
                                       <option name="cargoP[]" value="<?php echo $cargospolitico[$i]['id_cargo']; ?>"><?php echo $cargospolitico[$i]['descripcion']; ?></option>
                                       <?php for ($j=0; $j <count($cargos) ; $j++) { ?>
                                            <option name="cargoP" value="<?php echo $cargos[$j]['id_cargo']; ?>"><?php echo $cargos[$j]['descripcion'] ?></option>
                                       <?php } ?>
                                     </select>
                                 <?php echo form_error('cargoP','<div class="form-error">*', '</div>'); ?>
                                 </div>
                                 <div class="col-sm-3 align-self-center ">
                                 <button type="button" class="btn btn-peru pop-up btn-sm" href="<?php echo base_url()."cargo"; ?>">Añadir Cargo</button>
                                 </div>
                             </div>
                              <div class="form-group row">
                                  <label for="añoinicioP" class="col-sm-2 col-form-label">Fecha de inicio</label>
                                  <div class="col-sm-10">
                                  <?php
                                  $añoinicio = array('type'=>'date','class'=>'form-control','name'=>'añoiniciocP[]','placeholder'=>'Año de Inicio','value'=>$cargospolitico[$i]['fec_inicio']);
                                  echo form_input($añoinicio);
                                  ?>
                                  <?php echo form_error('añoinicioP','<div class="form-error">*', '</div>'); ?>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="añofinalP" class="col-sm-2 col-form-label">Fecha de termino</label>
                                  <div class="col-sm-10">
                                  <?php
                                  $añofinal = array('type'=>'date','class'=>'form-control','name'=>'añofinalcP[]','placeholder'=>'Año de Culminación','value'=>$cargospolitico[$i]['fec_fin']);
                                  echo form_input($añofinal);
                                  ?>
                                  <?php echo form_error('añofinalP','<div class="form-error">*', '</div>'); ?>
                                  </div>
                              </div>
                          </div>
                        <?php }
                            } ?>
                            <div class="form-group" id="formcargos">
                            </div>
                            <div class="form-group row tarjeta justify-content-center">
                                <div class="col-sm-10"><?php $title = "Si el político ha ocupado algun cargo, presiona aqui para guardar esa información." ?>
                                <button type="button"  data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>"  href="politico/agregarcargo" class="btn pop-upcar main-color-bg">Agregar Cargo Ocupado</button>
                                </div>
                            </div>
                        <?php }
                        else{?>
                            <div class="form-group" id="formcargos">
                            </div>
                             <div class="form-group row tarjeta justify-content-center">
                                 <div class="col-sm-10"><?php $title = "Si el político ha ocupado algun cargo, presiona aqui para guardar esa información." ?>
                                 <button type="button"  data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>"  href="politico/agregarcargo" class="btn main-color-bg pop-upcar">Agregar Cargo Ocupado</button>
                                 </div>
                             </div>
                        <?php } ?>
                         <hr>
                         <h2>Casos de corrupcion implicados</h2>
                         <hr>
                         <?php if( isset($resultado) ){
                                if( isset($delitospolitico) ){
                                    for ($i=0; $i <count($delitospolitico) ; $i++) { ?>
                         <div class="form-group">
                             <h5>Caso(s) involucrado(s)</h5>
                             <div class="form-group row">
                                 <label for="delitoP" class="col-sm-2 col-form-label">Grado</label>
                                 <div class="col-sm-7">
                                     <select class="form-control" name="delitoP[]" id="sel" >
                                       <option name="delitoP[]" value="<?php echo $delitospolitico[$i]['id_delito']; ?>"><?php echo $delitospolitico[$i]['nombre']; ?></option>
                                        <?php for ($j=0; $j <count($delitos) ; $j++) { ?>
                                               <option name="delitoP[]" value="<?php echo $delitos[$j]['id_delito']; ?>"> <?php echo $delitos[$j]['nombre']; ?> </option>
                                        <?php } ?>
                                     </select>
                                 </div>
                                 <div class="col-sm-3 align-self-center ">
                                 <button type="button" class="btn btn-peru pop-up btn-sm" href="delito">Añadir Delito</button>
                                 </div>
                              </div>
                              <div class="form-group row">
                                  <label for="descripciondP" class="col-sm-2 col-form-label">Caso</label>
                                  <div class="col-sm-10">
                                  <?php
                                  $descripciond = array('type'=>'text','class'=>'form-control autoExpand','name'=>'descripciondP[]','rows'=>5,'data-min-rows'=>5,'placeholder'=>'Descripcion de el hecho de corrupción',
                                                        'value'=>$delitospolitico[$i]['descripcion']);
                                  echo form_textarea($descripciond);
                                  ?>
                                  <?php echo form_error('descripciondP','<div class="form-error">*', '</div>'); ?>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="fechadP" class="col-sm-2 col-form-label">Fecha Registrada</label>
                                  <div class="col-sm-10">
                                  <?php
                                  $fecha = array('type'=>'date','class'=>'form-control','name'=>'fechadP[]','placeholder'=>'Fecha','value'=>$delitospolitico[$i]['fec']);
                                  echo form_input($fecha);
                                  ?>
                                  <?php echo form_error('fechadP','<div class="form-error">*', '</div>'); ?>
                                  </div>
                              </div>
                          </div>
                            <?php }
                            }
                            ?>
                            <div class="form-group" id="formdelitos"></div>
                            <div class="form-group row tarjeta justify-content-center">
                                <div class="col-sm-10"><?php $title = "Si el político registra un hecho de corrupción, presiona aqui para guardar esa información." ?>
                                <button type="button" href="politico/agregardelito" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" class="btn pop-updel main-color-bg">Agregar Caso Implicado</button>
                                </div>
                            </div>
                         <?php }
                          else{?>
                              <div class="form-group" id="formdelitos"></div>
                               <div class="form-group row tarjeta justify-content-center">
                                   <div class="col-sm-10"><?php $title = "Si el político registra un hecho de corrupción, presiona aqui para guardar esa información." ?>
                                   <button  type="button" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>" href="politico/agregardelito" class="btn pop-updel main-color-bg">Agregar Caso Implicado</button>
                                   </div>
                               </div>

                          <?php } ?>
                        <?php echo form_close(); ?>
                        <div class="form-group row tarjeta justify-content-center">
                            <div class="col-sm-10"><?php $title = "Despues de completar toda la información requerida, debes presionar para guardarla y sea mostrada." ?>
                            <button class="btn btn-peru send-formp" data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>">Guardar</button>
                            </div>
                        </div>
                    <script src=<?php echo base_url()."js/validations.js";?>></script>
                </div>
            </div>
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
        i = 0;
        j = 0;
        $(".pop-upaca").click(function(){
            var btn = $(this);
            $.post(btn.attr("href"), {"idObj":$(this).attr("data-id")},function(data){
                if( i == 0){
                j = i;
                $("#formacademico").html(data);
                $("#formacademico").after("<div class='form-group' id='formacademico"+i+"'></div>");
                i++;
                }
                else{
                    $("#formacademico"+j).html(data);
                    $("#formacademico"+j).after("<div class='form-group' id='formacademico"+i+"'></div>");
                    j=i;
                    i++;
                }
            }).fail(function(){
                alert( "Error de red" );
            })
        });

        l = 0;
        m = 0;
        $(".pop-upcar").click(function(){
            var btn = $(this);
            $.post(btn.attr("href"), {"idObj":$(this).attr("data-id")},function(data){
                if( l == 0){
                m = l;
                $("#formcargos").html(data);
                $("#formcargos").after("<div class='form-group' id='formcargos"+l+"'></div>");
                l++;
                }
                else{
                    $("#formcargos"+m).html(data);
                    $("#formcargos"+m).after("<div class='form-group' id='formcargos"+l+"'></div>");
                    m=l;
                    l++;
                }
            }).fail(function(){
                alert( "Error de red" );
            })
        });

        p = 0;
        q = 0;
        $(".pop-updel").click(function(){
            var btn = $(this);
            $.post(btn.attr("href"), {"idObj":$(this).attr("data-id")},function(data){
                if( p == 0){
                q = p;
                $("#formdelitos").html(data);
                $("#formdelitos").after("<div class='form-group' id='formdelitos"+p+"'></div>");
                p++;
                }
                else{
                    $("#formdelitos"+q).html(data);
                    $("#formdelitos"+q).after("<div class='form-group' id='formdelitos"+p+"'></div>");
                    q = p;
                    p++;
                }
            }).fail(function(){
                alert( "Error de red" );
            })
        });


        $('#url').change(function () {
            var campo = $(this);
            var url = campo.val();
            $('#img').attr('src',url)
        })

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
