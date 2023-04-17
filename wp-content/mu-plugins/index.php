<?php
/*
Plugin Name: Vélorution Metz
Description: Fonction diverses 
Version: 1.0
Author: Gilles FRANCOIS
Author URI: 
*/

include 'send-email.php';

/* vérification de la configuration wordpress (en cas de migration) */
function check_current_config(){
    $config = isset($_GET['config']) ? $_GET['config'] : false;
    if($config) {
      if($config == 'force' && !isset($_GET['old']) && !isset($_GET['siteurl'])){
        $new = get_option('siteurl');
  /*      if(strstr($new, '.fr')!==false) {
          $new = str_replace('.fr','.local', $new);
        } else if(strstr($new, '.local')!==false) {
          $new = str_replace('.local','.fr', $new);
        }*/
  
        $new = current_site_url();
  
        ?>
        <form method="get">
          <input type="hidden" name=config value=force>
          <p>Ancienne Url<br><input type="text" name="old" size="100" placeholder="Ancienne url" value="<?php echo get_option('siteurl');?>"></p>
  
          <p>Nouvelle Url<br><input type="text" name="siteurl" size="100" placeholder="Nouvelle url" value="<?php echo $new;?>"></p>
          <input type="submit">
        </form>
        <?php
        exit;
      }
  
      $path = realpath('.');
  
      $siteurl = addslashes($_GET['siteurl']) ;
      $old = addslashes($_GET['old']) ;
  
      if($config == 'force' && $old && $siteurl){
        $smartmag_theme_options = get_option('smartmag_theme_options');
  
        foreach($smartmag_theme_options as $k=>$v) {
          $smartmag_theme_options[$k] = str_replace($old, $siteurl, $v);
        }
        update_option('smartmag_theme_options',$smartmag_theme_options);
  
        /* mise à jour de l'url du site dans les options */
        update_option('home',$siteurl);
        update_option('siteurl',$siteurl);
  
  
        /* mise à jour de l'url du site dans les posts */
        $GLOBALS['wpdb']->get_results('UPDATE '.$GLOBALS['wpdb']->prefix.'options SET option_value = REPLACE(option_value,"'.$old.'","'.$siteurl.'")');
  
        $GLOBALS['wpdb']->get_results('UPDATE '.$GLOBALS['wpdb']->prefix.'posts SET post_content = REPLACE(post_content,"'.$old.'","'.$siteurl.'")');
  
        $GLOBALS['wpdb']->get_results('UPDATE '.$GLOBALS['wpdb']->prefix.'posts SET guid = REPLACE(guid,"'.$old.'","'.$siteurl.'")');
  
        ?><p>update terminated : <?php echo $old;?> -> <?php echo $siteurl;?></p><a href="/wp-admin/">Continue</a><?php 
        exit;
      }
    }
  }
  add_action( 'init', 'check_current_config' );


  function current_site_url($host=false,$request=false) {
	$host = $host ? $host : $_SERVER['HTTP_HOST'];
	$https = false;
	if(isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
		$https=true;
	}

	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
		$https = true;
	}
	$url = ($https ? 'https' : 'http') . '://'.$host;
	if($request) {
		$url.=$_SERVER['REQUEST_URI'];
	}
	return $url;
}


