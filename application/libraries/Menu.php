<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Menu
{
  private $arr_menu;
  protected $CI;
  function __construct()
  {
    // We used to use this to integrate base_url, but we put  the helper url in config/autoload
    // $this->CI = get_instance();
    // $this->CI->load->helper('url');
  }
  function constructMenu(){
    $menu= '<div class="navbar-fixed">
              <nav class="navbar-fixed blue-grey darken-4 white-text fixed" role="navigation" >
                <div class="nav-wrapper container">
                  <a href="'.base_url().'index.php/main/"  class="button-collapse"><i class="material-icons">menu</i></a>

                  <a id="logo-container" href="#" style="color:black;"class="brand-logo"><b><h5 class="white-text middle-xs">University</h5></b></a>
                  <ul class="right hide-on-med-and-down">
                    <li><a href="'.base_url().'index.php/main/" style="color:white;">Tests</a></li>
                  </ul>


                </div>
            </nav>
        </div>
      ';
    return $menu;
  }
}
