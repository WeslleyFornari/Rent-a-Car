$("#tableConferencistas").on('click','.editarConferencista',function(e){
    e.preventDefault();
    var idConferencista = $(this).data('conferencista');
    $.get('/painel/conferencista/editar/'+idConferencista,function(data){
      console.log(data.texto);
      $("#formConferencistaEditar").attr('action','/painel/conferencista/update/'+idConferencista)
      $("#editarCongressista input[name='nome']").val(data.nome);
      $("#editarCongressista .froala-editor2").html(data.texto);
      $("#editarCongressista .froala-editor2").froalaEditor('html.set', data.texto);
      var html = '';
      html +='<li>';
      html +='<input type="hidden" name="foto" value="'+data.foto+'" />';
      html +='<a href="#" class="remove" data-file="'+data.foto+'">';
      html +='<i class="fa fa-close" aria-hidden="true"></i> ';
      html += '</a>';
      html +='<img src="{{URL::to('/')}}/img_perfil/'+data.foto+'" alt="">';
      html +='</li>';
      $('#editarCongressista #preview ul').html(html);
      $('#editarCongressista').modal('show')
    })
  })
  $("#formConferencistaEditar").submit(function(e) {   
            var url =  $("#formConferencistaEditar").attr('action'); // the script where you handle the form input.
            $.ajax({
             type: "POST",
             url: url,
                   data: $("#formConferencistaEditar").serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                    
                    getConferencistas();
                    $('#editarCongressista').modal('hide')
                  }
                });
            e.preventDefault(); // avoid to execute the actual submit of the form.
          });
  $('.uploadCongressista' ).on('change', function() {
    $(".carregandoForm").show(0);
    
    var data = new FormData();
    var target = $(this).data('target');
    var modalTarget = '';
    if(target == 'editar'){
      modalTarget = '#editarCongressista';
    }else{
      modalTarget = '#novoCongressista';
    }
    $.each($(modalTarget +" input[type='file']")[0].files, function(i, file) {
      data.append(modalTarget +' file[]', file);
    });


    $.ajax({
      url: '{{route("painel.ajax.upload-foto-perfil")}}',
      type: 'POST',
      
      cache: false,
      contentType: false,
      processData: false,
      data : data,
      success: function(result){
       $.each(result, function (index, value) {
        var html = '';
        html +='<li>';
        html +='<input type="hidden" name="foto" value="'+value+'" />';
        html +='<a href="#" class="remove" data-file="'+value+'">';
        html +='<i class="fa fa-close" aria-hidden="true"></i> ';
        html += '</a>';
        html +='<img src="{{URL::to('/')}}/img_perfil/'+value+'" alt="">';
        html +='</li>';
        $(modalTarget +' #preview ul').html(html);
                //console.log(value);
              });
       $(modalTarget +" .carregandoForm").hide(0);
     }
   } );
    
  });