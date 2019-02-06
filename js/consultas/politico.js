$( document ).ready(function() {
        $('#modalpolitico').on('show.bs.modal', function (event) {
         var button = $(event.relatedTarget)
         var id = button.data('id')
         var modal = $(this)
         modal.find('#idpolitico').val(id)
       })

       $( "#confirmacion" ).submit(function( event ) {
           event.preventDefault();
           var id = $("#idpolitico").attr("value");alert(id);

           $.post("politico/borrar", {"idpolitico": id}, function(data){
               if(data.result !== "success"){
                   alert("Error: No se pudo concretar");
               }
           });
       })

       $('#regpolitico').submit(function(event){
       event.preventDefault();

       var parametros = $(this).serialize();
       alert(data);
               $.ajax({
                   type: "POST",
                   url: "politico/registrar",
                   dataType:'json',
                   data: parametros,
                   success: function(data)
                   {
                       $('#resp').html(data);
                   }
               })
               .done(function(){
                   alert("OK! Político Borrado");
               })
               .fail(function(){
                   alert("Error: No se pudo concretar");
               })
           })
   });
