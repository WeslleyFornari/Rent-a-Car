<?php

namespace RW940cms\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->bind(
            'RW940cms\Repositories\MenuRepository', 
            'RW940cms\Repositories\MenuRepositoryEloquent'
        );
        $this->app->bind(
            'RW940cms\Repositories\ConteudoRepository', 
            'RW940cms\Repositories\ConteudoRepositoryEloquent'
        );
        $this->app->bind(
            'RW940cms\Repositories\CategoriasRepository', 
            'RW940cms\Repositories\CategoriasRepositoryEloquent'
        );
        $this->app->bind(
            'RW940cms\Repositories\ImagemDestaqueRepository', 
            'RW940cms\Repositories\ImagemDestaqueRepositoryEloquent'
        );
        $this->app->bind(
            'RW940cms\Repositories\FormContatoRepository', 
            'RW940cms\Repositories\FormContatoRepositoryEloquent'
        );
        $this->app->bind(
            'RW940cms\Repositories\BannerRepository', 
            'RW940cms\Repositories\BannerRepositoryEloquent'
        );
        $this->app->bind(
            'RW940cms\Repositories\UserRepository', 
            'RW940cms\Repositories\UserRepositoryEloquent'
        );
        $this->app->bind(
            'RW940cms\Repositories\ItensMenuRepository', 
            'RW940cms\Repositories\ItensMenuRepositoryEloquent'
        );
        $this->app->bind(
            'RW940cms\Repositories\TipoMenuRepository', 
            'RW940cms\Repositories\TipoMenuRepositoryEloquent'
        );
        $this->app->bind(
            'RW940cms\Repositories\SessaoConteudoRepository', 
            'RW940cms\Repositories\SessaoConteudoRepositoryEloquent'
        );
        $this->app->bind(
            'RW940cms\Repositories\ConfiguracoesRepository', 
            'RW940cms\Repositories\ConfiguracoesRepositoryEloquent'
        );

        $this->app->bind(
            'RW940cms\Repositories\GaleriaRepository', 
            'RW940cms\Repositories\GaleriaRepositoryEloquent'
        );
$this->app->bind(
            'RW940cms\Repositories\StatusPagamentoRepository', 
            'RW940cms\Repositories\StatusPagamentoRepositoryEloquent'
        );

        
       
        
        
        
        
    }
}
