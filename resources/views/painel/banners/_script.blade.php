<script type="text/javascript">
  $(document).ready(function() {
    $(document).ready(function() {
    $("#form").submit(function(e) {

var url =  $("#form").attr('action'); // the script where you handle the form input.
$.ajax({
 type: "POST",
 url: url,
       data: $("#form").serialize(), // serializes the form's elements.
       success: function(data)
       {   
        swal("Sucesso!", data.msg, "success");
       

        @if(null === @$banner)
            $(".preview li").html('');
            $(".container-upload").removeClass('hidden');
            $("#form")[0].reset();
        @endif
      },error:function(data){
        console.log(data);
        swal("Erro!", data.msg, "info");
      }

    });

e.preventDefault(); // avoid to execute the actual submit of the form.

});



    $('#uploadArquivos' ).on('change', function() {
      $(this).closest('.container-upload').find(".carregandoDestaque").show(0);
      var data = new FormData();
     

          $.each($("input[id='uploadArquivos']")[0].files, function(i, file) {
            data.append('file', file);
          });


          $.ajax({
          url: '{{ route("admin.ajax.banner-upload-foto") }}',
          type: 'POST',
          cache: false,
          contentType: false,
          processData: false,
          data : data,
          success: function(result){
          $.each(result, function (index, value) {
          var urlBase = "{{ URL::to('/') }}";
          var html = '';

          html +='<li>';

              html +='<input type="hidden" name="media_desktop" value="'+value+'" />';

              html +='<a href="#" class="remove" data-file="'+value+'">';

              html +='<i class="fa fa-close" aria-hidden="true"></i> ';

              html += '</a>';

              html +='<img src="'+urlBase+'/img/banners/'+value+'" alt="">';

              html +='</li>';

              $('#preview ul').html(html);
          });
          $(".carregandoDestaque").hide(0);
          $("#containerUpload").addClass('hidden')
          }

          });



    });

    $("#preview").on('click','.remove',function(e){

          e.preventDefault();
          $(this).parent().addClass("del")

          $.get("{{ route('admin.ajax.banner-delete-foto') }}",{name: $(this).data("file"),collum:'media_desktop'},function(data){

                  if(data == 1){
                      $(".del").remove();
                     
                      $("#containerUploadMobile").removeClass('hidden')
                  }

          })

    })
    $('#uploadArquivosMobile' ).on('change', function() {
      $(this).closest('.container-upload').find(".carregandoDestaque").show(0);
      var data = new FormData();
     

          $.each($("input[id='uploadArquivosMobile']")[0].files, function(i, file) {
            data.append('file', file);
          });


          $.ajax({
          url: '{{ route("admin.ajax.banner-upload-foto") }}',
          type: 'POST',
          cache: false,
          contentType: false,
          processData: false,
          data : data,
          success: function(result){
          $.each(result, function (index, value) {
          var urlBase = "{{ URL::to('/') }}";
          var html = '';

          html +='<li>';
          html +='<input type="hidden" name="media_mobile" value="'+value+'" />';
          html +='<a href="#" class="remove" data-file="'+value+'">';
          html +='<i class="fa fa-close" aria-hidden="true"></i> ';
          html += '</a>';
          html +='<img src="'+urlBase+'/img/banners/'+value+'" alt="">';
          html +='</li>';

              $('#previewMobile ul').html(html);
          });
          $(".carregandoDestaque").hide(0);
          $("#containerUploadMobile").addClass('hidden')
          }

          });



    });

    $("#previewMobile").on('click','.remove',function(e){

          e.preventDefault();
          $(this).parent().addClass("del")

          $.get("{{ route('admin.ajax.banner-delete-foto') }}",{name: $(this).data("file"),collum:'media_mobile'},function(data){

                  if(data == 1){
                      $(".del").remove();
                     
                      $("#containerUploadMobile").removeClass('hidden')
                  }

          })

    })
})
})
</script>