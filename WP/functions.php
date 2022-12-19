<?php

if (!defined('ABSPATH')) die();

function ds_ct_enqueue_parent() { wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); }

function ds_ct_loadjs() {
	wp_enqueue_script( 'ds-theme-script', get_stylesheet_directory_uri() . '/ds-script.js',
        array( 'jquery' )
    );
}

add_action( 'wp_enqueue_scripts', 'ds_ct_enqueue_parent' );

add_action( 'wp_enqueue_scripts', 'ds_ct_loadjs' );

include('login-editor.php');

/**
 * @author imstaked
 * @copyright 2020
 * 
 * Near Shortcodes
 */
 
function near_get_mainnet_seat_price()
{
    $ch = curl_init();
    $URL = 
    curl_setopt($ch, CURLOPT_URL, '$URL');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);
    
    if (curl_errno($ch)) 
    {
        echo 'Error:' . curl_error($ch);
    }
    
    curl_close($ch);
    $price_array = json_decode($result, true);

    return $seat = $price_array["data"]["result"][0]["value"][1];

}
add_shortcode('near_main_seat', 'near_get_mainnet_seat_price');



/**
 *
 *
 * @author imstaked
 * @copyright 2022
 * 
 * Mina Shortcodes
 */
 
function MINA_get_uptime()
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'http://uptime.minaprotocol.com/uptimescore/B62qjWchpjVwmbEazciy3VSBZhJNVF28RcDQirLFpH2rvfmDrtXL382');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);
    if (curl_errno($ch)) 
    {
      echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    $array = json_decode($result);
    $uptime_percent = $array[0]->score_percent;
    return $uptime_percent;
  }

add_shortcode('mina_uptime', 'MINA_get_uptime');

