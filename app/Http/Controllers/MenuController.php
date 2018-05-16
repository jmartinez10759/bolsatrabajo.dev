<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
	
    
    /**
     *Metodo donde crea la estrutura del menu
     *@access public
     *@param array $data [description]
     *@return array
     */
      public function build_menu( $data = array() ){
            $base_url = base_url();
            $menu = "";
            $submenu = "";
            // $nombre = strtoupper("nombre");
            // $apellido = strtolower("apellido");
            // debug($apellido);
            foreach ($data as $menus) {
                if (strtoupper($menus->tipo) == "SIMPLE") {
                    $menu .= '<li><a href="'.$base_url.$menus->link.'"><i class="'.$menus->icon.'"></i> '.$menus->texto.'</a></li>';
                }
                if (strtoupper($menus->tipo) == "PADRE") {
                        $menu .= '<li><a><i class="'.$menus->icon.'"></i> '.$menus->texto.' <span class="fa fa-chevron-down"></span></a>';
                        $menu .= '<ul class="nav child_menu">';
                        $menu .= $this->_submenus($data,$menus->id_menu);
                        $menu .= '</ul>';
                        $menu .= '</li>';
                }
            }
            return $menu;
      }
    /**
     *Metodo para crear el seubmenu de cada menu padre
     *@access private
     *@param array data [description]
     *@param integer id_menu [description]
     *@return [type] [description]
     */
    private function _submenus( $data= array(), $id_menu = false ){
        
        if ($id_menu && $data) {
            $submenus = "";
            foreach ($data as $submenu) {
                if (strtoupper($submenu->tipo) == "HIJO" && $submenu->id_padre == $id_menu) {
                    $submenus .= '<li><a href="'.base_url().$submenu->link.'">'.$submenu->texto.'</a></li>';
                }
            }
            return $submenus;
        }
        return false;
    }

}
