<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Auth::routes();




Route::group(['prefix'=>'admin','middleware'=>'auth', 'as'=>'admin.'],function(){
	
	Route::get('',['as'=>'index','uses'=>'Painel\indexController@index']);
	
	
	Route::group(['prefix'=>'paginas','as'=>'paginas.'],function(){
			Route::get('/',['as'=>'lista','uses'=>'Painel\PaginasController@lista']);
			
			Route::get('novo', ['as'=>'novo','uses'=>'Painel\PaginasController@novo']);
			Route::get('editar/{id}', ['as'=>'editar','uses'=>'Painel\PaginasController@editar']);
			Route::post('update/{id}',['as'=>'update','uses'=>'Painel\PaginasController@updatePaginas']);
			Route::post('store',['as'=>'store','uses'=>'Painel\PaginasController@storePaginas']);
			Route::get('delete/{id}',['as'=>'delete','uses'=>'Painel\PaginasController@delete']);
	});

	Route::group(['prefix'=>'categorias', 'as'=>'categorias.'],function(){
		Route::get('lista/{tipo?}', ['as'=>'lista','uses'=>'Painel\CategoriasController@lista']);
		Route::get('editar/{id}', ['as'=>'editar','uses'=>'Painel\CategoriasController@editar']);
		Route::post('update/{id}',['as'=>'update','uses'=>'Painel\CategoriasController@update']);
		Route::get('novo', ['as'=>'novo','uses'=>'Painel\CategoriasController@novo']);
		Route::post('store', ['as'=>'store','uses'=>'Painel\CategoriasController@store']);
		
		Route::get('delete/{id}/{tipo?}',['as'=>'delete','uses'=>'Painel\CategoriasController@delete']);
	});
	Route::group(['prefix'=>'banners','as'=>'banners.'],function(){
        Route::get('/', ['as'=>'lista','uses'=>'Painel\BannerController@lista']);
        Route::get('novo', ['as'=>'novo','uses'=>'Painel\BannerController@novo']);
        Route::get('editar/{id}', ['as'=>'editar','uses'=>'Painel\BannerController@editar']);
        Route::get('delete/{id}', ['as'=>'delete','uses'=>'Painel\BannerController@destroy']);
        Route::post('update/{id}', ['as'=>'update','uses'=>'Painel\BannerController@update']);
        Route::post('store', ['as'=>'store','uses'=>'Painel\BannerController@store']);
        Route::post('order', ['as'=>'order','uses'=>'Painel\BannerController@order']);
});

	Route::group(['prefix'=>'grupo_veiculos','as'=>'grupo_veiculos.'],function(){
			Route::get('/',['as'=>'lista','uses'=>'Painel\GrupoVeiculosController@index']);
			Route::get('novo', ['as'=>'novo','uses'=>'Painel\GrupoVeiculosController@novo']);
			Route::get('editar/{id}', ['as'=>'editar','uses'=>'Painel\GrupoVeiculosController@editar']);
			Route::post('update/{id}',['as'=>'update','uses'=>'Painel\GrupoVeiculosController@update']);
			Route::post('store',['as'=>'store','uses'=>'Painel\GrupoVeiculosController@store']);
			Route::get('delete/{id}',['as'=>'delete','uses'=>'Painel\GrupoVeiculosController@delete']);
			Route::get('promo/{id?}',['as'=>'promo','uses'=>'Painel\GrupoVeiculosController@promo']);
			
	});

	Route::group(['prefix'=>'opcionais','as'=>'opcionais.'],function(){
		Route::get('/',['as'=>'index','uses'=>'Painel\OpcionaisController@index']);
		Route::get('/getOpcionais',['as'=>'getOpcionais','uses'=>'Painel\OpcionaisController@getOpcionais']);
		Route::post('update/{id}',['as'=>'update','uses'=>'Painel\OpcionaisController@update']);
		Route::get('novo',['as'=>'novo','uses'=>'Painel\OpcionaisController@novo']);
		Route::get('edit/{id}',['as'=>'edit','uses'=>'Painel\OpcionaisController@edit']);
		Route::post('store',['as'=>'store','uses'=>'Painel\OpcionaisController@store']);
		Route::get('delete/{id}',['as'=>'delete','uses'=>'Painel\OpcionaisController@delete']);

	});
	Route::group(['prefix'=>'veiculos','as'=>'veiculos.'],function(){
			Route::get('/',['as'=>'lista','uses'=>'Painel\VeiculosController@index']);
			Route::get('novo', ['as'=>'novo','uses'=>'Painel\VeiculosController@novo']);
			Route::get('editar/{id}', ['as'=>'editar','uses'=>'Painel\VeiculosController@editar']);
			Route::get('show/{id?}', ['as'=>'show','uses'=>'Painel\VeiculosController@show']);
			Route::post('update/{id}',['as'=>'update','uses'=>'Painel\VeiculosController@update']);
			Route::post('store',['as'=>'store','uses'=>'Painel\VeiculosController@store']);
			Route::get('cliente/{id?}', ['as'=>'cliente','uses'=>'Painel\VeiculosController@cliente']);		
			Route::get('delete/{id}',['as'=>'delete','uses'=>'Painel\VeiculosController@delete']);
	});
	Route::group(['prefix'=>'reservas','as'=>'reservas.'],function(){
			Route::get('/',['as'=>'lista','uses'=>'Painel\ReservasController@index']);
			Route::get('novo', ['as'=>'novo','uses'=>'Painel\ReservasController@novo']);
			Route::get('show/{id?}', ['as'=>'show','uses'=>'Painel\ReservasController@show']);
			Route::get('print/{id?}', ['as'=>'print','uses'=>'Painel\ReservasController@print']);
			Route::post('update/{id}', ['as'=>'update','uses'=>'Painel\ReservasController@update']);
			Route::post('descrypt/{id}', ['as'=>'decrypt','uses'=>'Painel\ReservasController@descrypt']);
	});

	

	
	Route::group(['prefix'=>'users','as'=>'users.'],function(){
		Route::get('',['as'=>'lista','uses'=>'Painel\UserController@index']);

		Route::get('novo',['as'=>'novo','uses'=>'Painel\UserController@create']);
		Route::get('{id}',['as'=>'edit','uses'=>'Painel\UserController@edit']);
		
		Route::get('destroy',['as'=>'destroy','uses'=>'Painel\UserController@destroy']);
		Route::get('delete/{id}',['as'=>'delete','uses'=>'Painel\UserController@delete']);
		Route::post('store',['as'=>'store','uses'=>'Painel\UserController@store']);
		Route::post('update/{id}',['as'=>'update','uses'=>'Painel\UserController@update']);
	});
	Route::group(['prefix'=>'ajax','as'=>'ajax.'],function(){			
		Route::post('upload-fotos', ['as'=>'upload-foto','uses'=>'Painel\PaginasController@moveImgDestaque']);
		Route::get('delete-fotos', ['as'=>'delete-foto','uses'=>'Painel\PaginasController@deleteImgDestaque']);	
		Route::post('upload-galeria', ['as'=>'upload-galeria','uses'=>'Painel\PaginasController@moveGaleria']);
		Route::get('delete-galeria', ['as'=>'delete-galeria','uses'=>'Painel\PaginasController@deleteGaleria']);
		Route::post('banner-upload-foto', ['as'=>'banner-upload-foto','uses'=>'Painel\BannerController@moveImg']);
		Route::get('banner-delete-foto', ['as'=>'banner-delete-foto','uses'=>'Painel\BannerController@deleteImg']);
		
	

		Route::group(['prefix'=>'ordem','as'=>'ordem.'],function(){		
			Route::post('menu', ['as'=>'menu','uses'=>'Painel\ItensMenuController@ordem']);
		});	
		
		

		 Route::post('upload-media', ['as'=>'upload-media','uses'=>'Painel\MediaController@moveFile']);
   		 Route::post('delete-media', ['as'=>'delete-media','uses'=>'Painel\MediaController@deleteFile']); 

	});
	Route::group(['prefix'=>'suporte','as'=>'suporte.'],function(){	
		Route::get('', ['as'=>'index','uses'=>'Painel\SuporteController@index']);	
		Route::post('enviar', ['as'=>'enviar','uses'=>'Painel\SuporteController@enviarEmail']);	
	});
	Route::group(['prefix'=>'tiposMenu','as'=>'tiposMenu.'],function(){	
		Route::get('/{id?}', ['as'=>'index','uses'=>'Painel\MenuController@index']);
		Route::get('editar/{id}', ['as'=>'editar','uses'=>'Painel\MenuController@editar']);
		Route::post('store', ['as'=>'store','uses'=>'Painel\MenuController@store']);
		Route::get('delete/{id}',['as'=>'delete','uses'=>'Painel\MenuController@delete']);
		Route::post('update/{id}',['as'=>'update','uses'=>'Painel\MenuController@update']);
	});
	Route::group(['prefix'=>'menu','as'=>'menu.'],function(){
		Route::get('/{id?}', ['as'=>'index','uses'=>'Painel\ItensMenuController@index']);
		Route::post('store', ['as'=>'store','uses'=>'Painel\ItensMenuController@store']);
		Route::post('/{idMenu}/update/{idItemMenu}', ['as'=>'update','uses'=>'Painel\ItensMenuController@update']);
		Route::get('/{idMenu?}/editar/{idItemMenu}', ['as'=>'editar','uses'=>'Painel\ItensMenuController@editar']);
		Route::get('/{idMenu}/delete/{idItemMenu}',['as'=>'delete','uses'=>'Painel\ItensMenuController@delete']);
	});
	
	
	Route::group(['prefix'=>'fale-conosco','as'=>'fale-conosco.'],function(){

		Route::get('/{id?}', ['as'=>'index','uses'=>'Painel\FaleConoscoController@index']);
		Route::post('store', ['as'=>'store','uses'=>'Painel\FaleConoscoController@store']);
		Route::post('/{id}/update', ['as'=>'update','uses'=>'Painel\FaleConoscoController@update']);
		Route::get('/{id?}/ler', ['as'=>'ler','uses'=>'Painel\FaleConoscoController@ler']);
		Route::post('delete',['as'=>'delete','uses'=>'Painel\FaleConoscoController@delete']);
		Route::get('del/{id}',['as'=>'del','uses'=>'Painel\FaleConoscoController@deleteItem']);
	});
	
	
	

	Route::group(['prefix'=>'media', 'as'=>'media.'],function(){
    
     Route::get('popUp/{folder?}', ['as'=>'popUp','uses'=>'Painel\MediaController@popUp']);
     Route::post('/lista-folder/{folder?}', ['as'=>'lista-files','uses'=>'Painel\MediaController@listaFiles']);
     Route::get('/getFile/{id?}', ['as'=>'getFile','uses'=>'Painel\MediaController@getFile']);

      Route::get('/{folder?}', ['as'=>'index','uses'=>'Painel\MediaController@index']);
  	});
	Route::group(['prefix'=>'configuracoes','as'=>'configuracoes.'],function(){
		Route::get('/', ['as'=>'index','uses'=>'Painel\ConfiguracoesController@index']);
		
		Route::get('/lista', ['as'=>'lista','uses'=>'Painel\ConfiguracoesController@lista']);
		Route::get('editar/{id}', ['as'=>'editar','uses'=>'Painel\ConfiguracoesController@editar']);
		Route::post('store', ['as'=>'store','uses'=>'Painel\ConfiguracoesController@store']);
		Route::get('delete/{id}',['as'=>'delete','uses'=>'Painel\ConfiguracoesController@delete']);
		Route::post('update/{id}',['as'=>'update','uses'=>'Painel\ConfiguracoesController@update']);


	});
	
	
});

    Route::group(['prefix'=>'pagseguro','as'=>'pagseguro.','middleware' => 'cors'],function(){

		Route::get('/iniciaSessao',['as'=>'inicia.sessao','uses'=>'Pagseguro\PagSeguroController@iniciaPagamentoAction']);
		Route::post('/pagamentoBoleto',['as'=>'pagamento.boleto','uses'=>'Pagseguro\PagSeguroController@efetuaPagamentoBoleto']);
		Route::post('/pagamentoCartao',['as'=>'pagamento.cartao','uses'=>'Pagseguro\PagSeguroController@efetuaPagamentoCartao']);
		Route::post('/status', 'Pagseguro\StatusPagSeguroController@status');
		Route::get('/rotinaVerificacao', 'Pagseguro\StatusPagSeguroController@rotinaVerificacao');
    });

    Route::group(['prefix'=>'rede','as'=>'rede.','middleware' => 'cors'],function(){

		Route::post('/calcula-parcela',['as'=>'calcula-parcela','uses'=>'Rede\RedeController@calcParcelaJuros']);
		Route::post('/efeturaPagamento',['as'=>'efeturaPagamento','uses'=>'Rede\RedeController@efeturaPagamento']);
    });


		Route::get('/', 'Site\HomeController@index')->name('home');
		Route::get('/home', 'Site\HomeController@index')->name('home');
		Route::get('/veiculos', 'Site\GrupoVeiculosController@index')->name('veiculos');
		Route::get('/contato', 'Site\PaginasController@contato')->name('contato');
		Route::post('/contato/send',['as'=>'contato.send','uses'=>'Site\FormContatoController@Email']);
		Route::post('/veiculos', 'Site\GrupoVeiculosController@search')->name('site.search');
		Route::post('/selectGrupo', 'Site\GrupoVeiculosController@selectGrupo')->name('site.selectGrupo');
		
		Route::post('/reserva', 'Site\GrupoVeiculosController@reserva')->name('site.reserva');
		
		Route::post('/uploadComprovante', 'Site\ReservaController@uploadComprovante')->name('reserva.uploadComprovante');
		Route::get('/reserva/comprovante/{id?}', 'Site\ReservaController@comprovante')->name('reserva.comprovante');
		Route::post('/reserva/avista', 'Site\ReservaController@pagamentoAvista')->name('reserva.pagamentoAvista');
		Route::get('/reserva/obrigado', 'Site\ReservaController@reservaObrigado')->name('site.reservaObrigado');
		Route::post('/clienteStore', 'Site\ReservaController@clienteStore')->name('site.clienteStore');
		Route::post('/condutorStore', 'Site\ReservaController@condutorStore')->name('site.condutorStore');
		
		
		Route::get('/alugue-mensal/{dataInicio?}/{dataTermino?}', 'Site\PaginasController@alugueMensal')->name('alugue.mensal');
		Route::post('/mensal/send',['as'=>'mensal.send','uses'=>'Site\FormContatoController@Mensal']);

		Route::get('/{slug}',['as'=>'paginas','uses'=>'Site\PaginasController@Paginas']);	

	
