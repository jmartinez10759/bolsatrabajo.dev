<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
	
	private static $_base_url;

	public function __construct(){

		self::$_base_url = domain();
	} 
    /**
     *Metodo donde crea la estrutura del menu
     *@access public
     *@param array $data [description]
     *@return array
     */
      public static function build_menu( $data = array() ){

            $menu = "";
            $submenu = "";

            foreach ($data as $menus) {
                if (strtoupper($menus->tipo) == "SIMPLE" && $menus->estatus == 1) {
                    $menu .= '<li><a href="'.self::$_base_url.$menus->link.'"><i class="'.$menus->icon.'"></i> '.$menus->texto.'</a></li>';
                }
                if (strtoupper($menus->tipo) == "PADRE" && $menus->estatus == 1 ) {
                        $menu .= '<li><a><i class="'.$menus->icon.'"></i> '.$menus->texto.' <span class="fa fa-chevron-down"></span></a>';
                        $menu .= '<ul class="nav child_menu">';
                        $menu .= self::_submenus( $data,$menus->id );
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
    private static function _submenus( $data= array(), $id_menu = false ){
        
        if ($id_menu && $data) {
            $submenus = "";
            foreach ($data as $submenu) {
                if (strtoupper($submenu->tipo) == "HIJO" && $submenu->id_padre == $id_menu && $menus->estatus == 1) {
                    $submenus .= '<li><a href="'.self::$_base_url.$submenu->link.'">'.$submenu->texto.'</a></li>';
                }
            }
            return $submenus;
        }
        return false;
    }

}
