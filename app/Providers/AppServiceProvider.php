<?php

namespace RW940cms\Providers;

use Illuminate\Support\ServiceProvider;
use RW940cms\Repositories\ItensMenuRepository;
use RW940cms\Repositories\TipoMenuRepository;
use RW940cms\Repositories\ConfiguracoesRepository;
use RW940cms\Repositories\ConteudoRepository;
use Illuminate\Support\Facades\View;
use RW940cms\Models\ItensMenu;
use Illuminate\Http\Request;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot( ItensMenuRepository $menuRepository,
        TipoMenuRepository $tipoMenuRepository,
        ConfiguracoesRepository $configuracoesRepository,
       
        Request $request)
    {
         if (!app()->runningInConsole()) {
            $menuPrincipal = $menuRepository->menuPrincipal($request);
            $menuRodape = $menuRepository->menuRodape($request);
            
           
            $config = $configuracoesRepository->all();
           $configSite = [];
            foreach ($config as $key => $value) {
               $configSite[$value->parametro] = $value->value;

            }
          
         
            View::share('configSite', $configSite);
            View::share('menuPrincipal', $menuPrincipal);
          
            
           
            
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RepositoryServiceProvider::class);
    }
}
