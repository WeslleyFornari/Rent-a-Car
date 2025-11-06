
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>A Bibib | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('/AdminLTE/css/AdminLTE.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <meta http-equiv="Cache-Control" content="no-store" />
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('/AdminLTE/plugins/iCheck/flat/blue.css')}}">
  <!-- Morris chart 
  <link rel="stylesheet" href="{{asset('/AdminLTE/plugins/morris/morris.css')}}">-->
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('/AdminLTE/plugins/datepicker/datepicker3.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('/AdminLTE/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('/AdminLTE/plugins/iCheck/all.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  @yield('pre-assets')
  <link rel="stylesheet" href="{{asset('AdminLTE/assets/froala_editor/css/plugins/codemirror.min.css')}}">
  <link href="{{asset('AdminLTE/assets/froala_editor/css/froala_editor.pkgd.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('AdminLTE/assets/froala_editor/css/froala_style.min.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/sweetalert-master/dist/sweetalert.css')}}">
</head>
<body class="hold-transition skin-black sidebar-mini">
  <div class="wrapper">
    <header class="main-header">

      <!-- Logo -->
      <a href="{{route('painel.index')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="{{asset('/AdminLTE/img/logo.png')}}" width="auto" height="30px" alt=""></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="{{asset('/AdminLTE/img/logo.png')}}" width="auto" height="30px" alt=""></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <a href="{{URL::to('/')}}" target="_blank" class="bt-visitarsite" data-toggle="tooltip" data-placement="bottom" title="Ir para o Site" >
          <i class="fa fa-globe"></i>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu" id="appendNotificacoes">
              
            </li>

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
                <span class="hidden-xs">{{ucfirst(Auth::user()->name)}}</span>
              </a>
              <ul class="dropdown-menu">
                <!--  -->
               
               <!-- Menu Body -->

               <!-- Menu Footer-->
               <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('painel.associado.editar',['id'=>Auth::user()->id])}}" class="btn btn-default btn-flat">Minha Conta</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('painel.logout')}}" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>


  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
  
      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">NAVEGAÇÃO</li>
        <li class="active treeview">
          <a href="{{route('painel.index')}}">
            <i class="fa fa-dashboard"></i> <span>Tela Inicial</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Páginas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('painel.quemsomos')}}"><i class="fa fa-circle-o"></i>Quem Somos</a></li>
            <li><a href="{{route('painel.diretoria')}}"><i class="fa fa-circle-o"></i>Diretoria</a></li>
            <li><a href="{{route('painel.regionais')}}"><i class="fa fa-circle-o"></i> Regionais</a></li>
            <li><a href="{{route('painel.seja-associado')}}"><i class="fa fa-circle-o"></i> Seja Associado</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-suitcase" aria-hidden="true"></i>
            <span>Congressos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('painel.congressos.lista')}}"><i class="fa fa-circle-o"></i> Todos os congressos</a></li>
            <li><a href="{{route('painel.congressos.novo')}}"><i class="fa fa-circle-o"></i> Adicionar congresso</a></li>
              <li><a href="{{route('painel.inscricoes.lista')}}"><i class="fa fa-circle-o"></i> Inscrições</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
           <i class="fa fa-book" aria-hidden="true"></i>
           <span>Livros</span>
           <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('painel.livros.lista')}}"><i class="fa fa-circle-o"></i> Todos os livros</a></li>
          <li><a href="{{route('painel.livros.novo')}}"><i class="fa fa-circle-o"></i> Adicionar livro</a></li>
          <li><a href="{{route('painel.categoria-livros.lista')}}"><i class="fa fa-circle-o"></i> Categorias</a></li>
          <li><a href="{{route('painel.categoria-livros.novo')}}"><i class="fa fa-circle-o"></i> Adicionar Categoria</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-file-text"></i>
          <span>Noticias</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('painel.noticias.lista')}}"><i class="fa fa-circle-o"></i> Todas as nóticias</a></li>
          <li><a href="{{route('painel.noticias.novo')}}"><i class="fa fa-circle-o"></i> Adicionar nova</a></li>
          <li><a href="{{route('painel.categorias-conteudo.lista')}}"><i class="fa fa-circle-o"></i> Categorias</a></li>
          
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
          <span>Agenda</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('painel.agenda.lista')}}"><i class="fa fa-circle-o"></i> Todos os Eventos</a></li>
          <li><a href="{{route('painel.agenda.novo')}}"><i class="fa fa-circle-o"></i> Adicionar Evento</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users" aria-hidden="true"></i>
          <span>Associados</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('painel.associado.lista')}}"><i class="fa fa-circle-o"></i> Todos os Associados</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i> Adicionar Associados</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users" aria-hidden="true"></i>
          <span>Material</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('painel.material.lista')}}"><i class="fa fa-circle-o"></i> Todos os Materiais</a></li>
          <li><a href="{{route('painel.material.novo')}}"><i class="fa fa-circle-o"></i> Adicionar Material</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-envelope" aria-hidden="true"></i>
          <span>Email</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('painel.mailbox.index')}}"><i class="fa fa-circle-o"></i> Novo</a></li>
       
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<div class="content-wrapper">
  <section class="content">
   @yield('content')
 </section>
</div>
<footer class="main-footer">
  <div class="hidden-xs text-right">
   <img src="{{asset('AdminLTE/img/rw940.png')}}" height="20px" width="auto" alt="">
 </div>
</footer>


<!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- AdminLTE App-->
<script src="{{asset('/AdminLTE/js/all.js')}}"></script> 
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
  $('[data-toggle="tooltip"]').tooltip();
</script>
<!-- Bootstrap 3.3.6 -->
<!--<script src="bootstrap/js/bootstrap.min.js"></script>-->
<!-- Morris.js charts 
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('/AdminLTE/plugins/morris/morris.min.js')}}"></script>-->
<!-- Sparkline -->
<script src="{{asset('/AdminLTE/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/AdminLTE/plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{asset('/AdminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('/AdminLTE/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/AdminLTE/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) 
<script src="{{asset('/AdminLTE/js/pages/dashboard.js')}}"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/AdminLTE/js/demo.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('/AdminLTE/plugins/iCheck/icheck.min.js')}}"></script>
<script type="text/javascript" src="{{asset('AdminLTE/assets/froala_editor/js/plugins/codemirror.min.js')}}"></script>
<script type="text/javascript" src="{{asset('AdminLTE/assets/froala_editor/js/plugins/xml.min.js')}}"></script>
<script type="text/javascript" src="{{asset('AdminLTE/assets/froala_editor/js/froala_editor.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset('AdminLTE/assets/froala_editor/js/languages/pt_br.js')}}"></script>
<script type="text/javascript" src="{{asset('AdminLTE/assets/js/jquery.mask.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  //iCheck for checkbox and radio inputs
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue'
  });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
    $(function () {
      

      $.get('{{route("painel.ajax.notificacoes")}}',function(data){
          $("#appendNotificacoes").html(data)        
      })

        
          var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 0 0000-0000' : '(00) 0000-00009';
          },
          spOptions = {
            onKeyPress: function(val, e, field, options) {
              field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
          };
          $(".cepMask").mask('00000-000');
          $(".dataMask").mask('00/00/0000');
          $('.telMask').mask(SPMaskBehavior, spOptions);
          $(".cpfMask").mask('000.000.000-00');
          $(".cnpjMask").mask('00.000.000/0000-00');
          $(".timepicker").mask('00:00');

          $(".cepMask").change(function(){
             $.post( "{{URL::to('/')}}/webservice-cep/cep.php", { cep: $(this).val()}, function( dados ) {
             var obj = jQuery.parseJSON(dados);
               $('#endereco').val(obj.rua);
               $('#bairro').val(obj.bairro);  
               $('#cidade').val(obj.cidade);
               $('#estado').val(obj.uf);
             });
          })
    })
  </script>
  @yield('pos-script')
</body>
</html>