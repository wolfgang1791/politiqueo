$( document ).ready(function() {
        $('#modalorgano').on('show.bs.modal', function (event) {
         var button = $(event.relatedTarget)
         var id = button.data('id')
         var modal = $(this)
         modal.find('#idorgano').val(id)
       })

       $( "#confirmacion" ).submit(function( event ) {
           event.preventDefault();
           var id = $("#idorgano").attr("value");
           $.post("organo/borrar", {"idorgano": id}, function(data){
               if(data.result !== "success"){
                   alert("Error: No se pudo concretar");
               }
           });
       })

       $('#updateo').click(function(){
            event.preventDefault();
            var descripcion = $("#updateo").data('descripcion');
            var titulo = $("#updateo").data('titulo');
            var imagen = $("#updateo").data('imagen');

            var form = $('regorgano')

            form.find('#descripcion').val(descripcion)
            form.find('#titulo').val(titulo)
            form.find('#url').val(url)    


                // modal.find('#descripcion').val(descripcion)
       })

       $('#regorgano').submit(function(event){
       event.preventDefault();
       var descripcion = $("input#descripcion").val();
       var titulo = $("input#titulo").val();
       var url = $("input#url").val();

       if(descripcion == " " || titulo == " " || url == " " )
       {
           alert("Hay algunos campos vacios");
           $("input#descripcion").focus();
           $("input#titulo").focus();
           $("input#url").focus();
           return false;
       }

       console.log(descripcion+titulo+url);
       $.post("registrar", {"descripcion": descripcion,"titulo":titulo,"url":url}, function(data){
           if(data.result !== "success"){
               alert("Error: No se pudo concretar");
           }
       })
   })
 })
