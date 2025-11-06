<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\MenuRepository;
use RW940cms\Models\Menu;
use RW940cms\Validators\MenuValidator;
use DB;
/**
 * Class MenuRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class MenuRepositoryEloquent extends BaseRepository implements MenuRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Menu::class;
    }

   
    public function menu(){
        $menu =  DB::table('menu')->where(['id_menu_pai'=>null,'status'=>'1'])->orderby('ordem','asc')->get();
         
        $html = '<ul>';
        foreach ($menu as $key => $m) {

            $html .= '<li><a href="/'.$m->slug_menu.'" class="'.$m->class_custom.'" id="'.$m->id_custom.'">';
                $html .= $m->icone_texto;
                        if($m->ocultar_texto != "1"){
                            $html .=$m->titulo;
                        }
                        
                $html .='</a>';
                        $SubMenu =  DB::table('menu')->where(['id_menu_pai'=>$m->id_menu,'status'=>'1'])->orderby('ordem','asc')->get();

                        if(count($SubMenu) > 0){
                            $html .= '<ul>'; 
                            foreach ($SubMenu as $key => $m) {
                                $html .= '<li><a href="/'.$m->slug_menu.'" class="'.$m->class_custom.'" id="'.$m->id_custom.'">';
                                        $html .= $m->icone_texto;
                                            if($m->ocultar_texto != "1"){
                                                            $html .=$m->titulo;
                                            }
                                                        
                                        $html .='</a>';

                                        /*TERCEIRO NIVEL **/
                                              $SubMenu2 =  DB::table('menu')->where(['id_menu_pai'=>$m->id_menu,'status'=>'1'])->orderby('ordem','asc')->get();

                                                    if(count($SubMenu2) > 0){
                                                        $html .= '<ul>'; 
                                                        foreach ($SubMenu2 as $key2 => $m2) {
                                                            $html .= '<li><a href="/'.$m2->slug_menu.'" class="'.$m2->class_custom.'" id="'.$m2->id_custom.'">';
                                                                    $html .= $m2->icone_texto;
                                                                        if($m->ocultar_texto != "1"){
                                                                                        $html .=$m2->titulo;
                                                                        }
                                                                                    
                                                                    $html .='</a>';
                                                                $html .='</li>';
                                                            }
                                                        $html .= '</ul>';  

                                                    }
                                        /*FINAL TERCEIRO NIVEL*/
                                    $html .='</li>';
                                }
                            $html .= '</ul>';  

                        }
                $html .='</li>';
        }
         $html .= '</ul>';
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
