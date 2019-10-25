<?php
/*
 * Plugin Name: API Docdoc
 * Description: Плагин для работы с API Docdoc.ru
 * Author:      SVteam
 * Version:     1.0
 */

require_once plugin_dir_path(__FILE__) . 'includes/models/Docdoc.php';

add_action('admin_menu', 'createLinkOnMainMenuDoc');

register_setting('docdoc-group', 'username');
register_setting('docdoc-group', 'password');

function createLinkOnMainMenuDoc()
{
    add_submenu_page(
        'options-general.php',
        'API Docdoc.ru', 
        'API Docdoc.ru', 
        'manage_options',
        'docdoc_plugin/includes/params.php'
    );
}

add_action('rest_api_init', function () {
  register_rest_route( 'doctor', 'cities',array(
                'methods'  => 'GET',
                'callback' => 'getCities'
      ));
});

add_action('rest_api_init', function () {
  register_rest_route( 'doctor', 'specialisations/(?P<city_id>\d+)',array(
                'methods'  => 'GET',
                'callback' => 'getSpecialisations'
      ));
});

add_action('rest_api_init', function () {
  register_rest_route( 'doctor', 'district/(?P<city_id>\d+)',array(
                'methods'  => 'GET',
                'callback' => 'getDistrict'
      ));
});

function getCities() {
    $docdoc = new Docdoc();
    return $docdoc->cityList();
}

function getSpecialisations($data) {
    $docdoc = new Docdoc();
    return $docdoc->specialisations($data['city_id']);
}

function getDistrict($data) {
    $docdoc = new Docdoc();
    return $docdoc->district($data['city_id']);
}