$( document ).ready(function() {
        $('#addRol').on('show.bs.modal', function (event) {
         var button = $(event.relatedTarget) // Botón que activó el modal

         var id = button.data('id') // Extraer la información de atributos de datos
         var descripcion = button.data('descripcion')

         var modal = $(this)
             if( id == undefined)
             {
                modal.find('#act').hide()
             }
             else{
                 modal.find('#act').show()
             }
             modal.find('#descripcion').val(descripcion)
       })
/*
       $( "#confirmacion" ).submit(function( event ) {
           event.preventDefault();
           var id = $("#idrol").attr("value");
          $.ajax({
                 type: "POST",
                 url: "<?php echo base_url()."rol/borrar" ?>",
                   dataType:'json',
                   data: { idrol:id }
           })

           .done(function(){
               alert("OK! Usuario Borrado");
           })
           .fail(function(){
               alert("Error: No se pudo concretar");
           })
       })
       */
       $('#modalrol').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('#idrol').val(id)
      })

      $( "#confirmacion" ).submit(function( event ) {
          event.preventDefault();
          var id = $("#idrol").attr("value");
        //var parametros = $(this).serialize();
        $.post("rol/borrar", {"idrol": id}, function(data){
            if(data.result !== "success"){
                alert("Error: No se pudo concretar");
            }
        });
      })
   });
