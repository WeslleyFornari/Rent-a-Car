<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\ItensMenuRepository;
use RW940cms\Models\ItensMenu;
use RW940cms\Validators\ItensMenuValidator;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;;
/**
 * Class ItensMenuRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class ItensMenuRepositoryEloquent extends BaseRepository implements ItensMenuRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ItensMenu::class;
    }

    public function menuEsquerdo(){
      /*  $menu =  DB::table('menu')->where(['tipo_menu_id'=>'4','status'=>'1'])->orderby('ordem','asc')->get();
        $html = '';
        foreach ($menu as $key => $item) {
               $html .= '<li><a href="/site-novo/'.$item->slug_menu.'">';
                  if($item->ocultar_texto == 1){
                  $html .= '<i class="fa fa-home"></i>';
                }else {
                  $html .=  $item->titulo;

                }
            $html .= ' </a>';
        }
        return $html;*/
    }
    public function menuDireito(){
       /* $menu =  DB::table('menu')->where(['tipo_menu_id'=>'5','status'=>'1'])->orderby('ordem','asc')->get();
        $html = '';
        foreach ($menu as $key => $item) {
               $html .= '<li><a href="/site-novo/'.$item->slug_menu.'">';
                  if($item->ocultar_texto == 1){
                  $html .= '<i class="fa fa-home"></i>';
                }else {
                  $html .=  $item->titulo;

                }
            $html .= ' </a>';
        }
        return $html;
        */
    }
    public function menuPrincipal($request){
     
       $menu =  DB::table('menu')->where(['tipo_menu_id'=>'1','status'=>'1'])->orderby('ordem','asc')->get();
        $html = '';

        foreach ($menu as $key => $item) {
          if($item->link_custom != ""){
            $url = $item->link_custom;
          }else{
            $url = $request->root()."/".$item->slug_menu;
          }
          ($item->slug_menu ==  $request->path() )? $active = 'active':$active = '';


               $html .= '<li><a href="'.$url.'" class="'.$active.' '.$item->class_custom.'">';

              
                  if($item->ocultar_texto == 1){
                  $html .= '<i class="fa '.$item->icone_texto.'"></i>';
                }else {
                  if($item->icone_texto != ""){
                     $html .= '<i class="fa '.$item->icone_texto.'"></i> ';
                  }
                  $html .=  $item->titulo;

                }
            $html .= ' </a>';
        }
        return $html;
    }
     public function menuRodape($request){
     
       $menu =  DB::table('menu')->where(['tipo_menu_id'=>'2','status'=>'1'])->orderby('ordem','asc')->get();
        $html = '';

        foreach ($menu as $key => $item) {
          if($item->link_custom != ""){
            $url = $item->link_custom;
          }else{
            $url = $request->root()."/".$item->slug_menu;
          }
          ($item->slug_menu ==  $request->path() )? $active = 'active':$active = '';


               $html .= '<li><a href="'.$url.'" class="'.$active.' '.$item->class_custom.'">';

              
                  if($item->ocultar_texto == 1){
                  $html .= '<i class="fa '.$item->icone_texto.'"></i>';
                }else {
                  if($item->icone_texto != ""){
                     $html .= '<i class="fa '.$item->icone_texto.'"></i> ';
                  }
                  $html .=  $item->titulo;

                }
            $html .= ' </a>';
        }
        return $html;
    }
   
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
