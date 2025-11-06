<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vestro - @yield('title')</title>
  <title>Vestro Administrativo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('adminLTE/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/iCheck/all.css')}}">
    <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/select2/select2.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/skins/skin-green-light.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/estilo.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/PaymentFont/css/paymentfont.min.css')}}">
   <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/sweetalert-master/dist/sweetalert.css')}}">
  <!-- daterange picker -->

  <link href="{{asset('adminLTE/plugins/air-datepicker-master/dist/css/datepicker.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('vendor/print.js/src/print.min.css')}}" rel="stylesheet" type="text/css">
   
<meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('pre-assets')
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{route('admin.index')}}" class="logo" style="background: #fff;">
       <img src="{{asset('img/logo-g.png')}}" alt="">
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <div class="toggleSideBar">
      <a href="#" class="abrir"  data-alvo="aside.main-sidebar" >
        <i class="fa fa-bars"></i>
      </a>
      <a href="" class="fecharSidebar" data-alvo="aside.main-sidebar"><i class="fa fa-times" aria-hidden="true"></i></a>
          <a href="{{URL::to('/')}}" target="_blank" class="bt-visitarsite" data-toggle="tooltip" data-placement="bottom" title="Ir para o Site" >
          <i class="fa fa-globe"></i>
        </a>
      </div>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         <li>
          <a href="{{route('admin.suporte.index')}}"  data-toggle="tooltip" data-placement="bottom" title="Suporte">
             <i class="fa fa-life-ring" aria-hidden="true"></i>
           </a>
         </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
             
             
             
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('admin.users.edit',['id'=>Auth::user()->id])}}" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                {{ csrf_field() }}
                 <button type="submit" class="btn btn-default btn-flat">Sair</button>
            </form>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="padding: 0;">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

   

      <!-- search form (Optional) -->
      <!--
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" >
        <li class="header" style="color: #f7f7f7">NAVEGAÇÃO</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="">
             <a href="{{route('admin.paginas.lista')}}"  >
              <i class="fa fa-file-text-o" aria-hidden="true"></i>
               Páginas
             </a>
           </li>
           
            <li class="">
             <a href="{{route('admin.tiposMenu.index')}}"   >
              <i class="fa fa-bars" aria-hidden="true"></i>
               Menu
             </a>
           </li>
           <li class="">
             <a href="{{route('admin.banners.lista')}}"  >
              <i class="fa fa-picture-o" aria-hidden="true"></i>
               Banner
             </a>
           </li>
           <li class="">
             <a href="{{route('admin.media.index')}}"  >
              <i class="fa fa-video-camera" aria-hidden="true"></i>
               Midia
             </a>
           </li>
           <li class="">
             <a href="{{route('admin.grupo_veiculos.lista')}}"  >
              <i class="fa fa-folder-open" aria-hidden="true"></i>
               Grupos Veículos
             </a>
           </li>
           <li class="">
             <a href="{{route('admin.veiculos.lista')}}"  >
              <i class="fa fa-car" aria-hidden="true"></i>
               Veículos
             </a>
           </li>           
           <li class="">
             <a href="{{route('admin.reservas.lista')}}"  >
             <i class="fa fa-address-card-o" aria-hidden="true"></i>
               Reservas
             </a>
           </li>

          <li class="">
             <a href="{{route('admin.fale-conosco.index')}}"  >
             <i class="fa fa-comment-o" aria-hidden="true"></i>
               Contato
             </a>
           </li>



           
           <li class="">
             <a href="{{route('admin.users.lista')}}"  >
              <i class="fa fa-users" aria-hidden="true"></i>
               Usuários
             </a>
           </li>
         
           <li class="">
             <a href="{{route('admin.configuracoes.index')}}" >
              <i class="fa fa-cogs" aria-hidden="true"></i>
               Configurações
             </a>
           </li>
           <li class="">
             <a href="{{route('admin.suporte.index')}}"  >
             <i class="fa fa-life-ring" aria-hidden="true"></i>

               Suporte
             </a>
           </li>
          
       
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content container">
@yield('content')
      <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
   
  </footer>

  
  
  <div class="control-sidebar-bg"></div>
</div>




<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('adminLTE/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>

<!-- Bootstrap 3.3.6 -->
<script src="{{asset('adminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminLTE/dist/js/app.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('adminLTE/plugins/select2/select2.full.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('adminLTE/plugins/iCheck/icheck.min.js')}}"></script>

<script src="{{asset('adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.14/jquery.mask.min.js"></script>
<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>
   <script src="{{asset('adminLTE/plugins/air-datepicker-master/dist/js/datepicker.min.js')}}"></script>

         <script src="{{asset('adminLTE/plugins/air-datepicker-master/dist/js/i18n/datepicker.pt-BR.js')}}"></script>
         <script src="{{asset('vendor/print.js/src/print.min.js')}}"></script>
     <script>

 $(function () {
$('.calendar').datepicker({
    language: 'pt-BR',
    
});
   $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
     $('.timeMask').mask('00:00');
  $('.dataMask').mask('00/00/0000');
  $('.cepMask').mask('00000-000');
  $('.mixed').mask('AAA 000-S0S');
  $('.cpfMask').mask('000.000.000-00', {reverse: true});
  $('.moneyMask').mask('000.000.000.000.000,00', {reverse: true});
    var SPMaskBehavior = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
spOptions = {
  onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};

$('.telMask').mask(SPMaskBehavior, spOptions);


    //Initialize Select2 Elements
    $(".select2").select2();

     //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-red',
      radioClass: 'iradio_flat-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-orange, input[type="radio"].flat-orange').iCheck({
      checkboxClass: 'icheckbox_flat-orange',
      radioClass: 'iradio_flat-orange'
    });

$('.abrir').on('click', function(e) {
      e.preventDefault();
    
      var target = $(this).data('alvo');
      $(this).fadeOut('500','linear',function(){
        $('.fecharSidebar').show('fast','linear');
      });
      
      $(target).animate({
        left: '0',
      })  
    });
$('.fecharSidebar').on('click', function(e){
      e.preventDefault();
      $(this).fadeOut('500','linear',function(){
        $('.abrir').show('fast','linear');
      });
     
      var x = screen.width;
      var target = $(this).data('alvo');
      $(target).animate({
        left: '-100%',
      },500)
})
    $(".btn-destroy").click(function(e){
      var url = $(this).attr('href');
      e.preventDefault();
      $(this).closest('tr').addClass("remove-row");
      $(this).closest('.box').addClass("remove-row");
      swal({
        title: "Tem certeza?",
        text: "Você irá remover definitivamente este item",
        icon: "warning",
        dangerMode: true,
          buttons:{
              cancel: {
                text: "Cancel",
                value: null,
                visible: true,
                className: "",
                closeModal: true,
              },
              confirm: {
                text: "OK",
                value: true,
                visible: true,
                className: "",
                closeModal: true
              }
            }
      }) .then(willDelete => {
         if (willDelete) {
           $.get(url,function(data){
               $(".remove-row").remove();
               if (willDelete) {
                swal("Sucesso!", "Item removido com sucesso.", "success");
              }
            });
         }
     });
    })
    $(".openPopUpMedia").click(function(e){
      e.preventDefault();
      $.get('{{route("admin.media.popUp")}}',function(data){
        $("#contentMedia").html(data);
        $('#modalMedia').modal('show')

      })
    })
  });
</script>
<div class="modal fade" id="modalMedia" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" >
     <div id="contentMedia"></div>
     <div class="clearfix"></div>
    </div>
  </div>
</div>
@yield('pos-script')
</body>
</html>
