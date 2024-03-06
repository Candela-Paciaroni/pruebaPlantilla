<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest[ 'name' ]			 	 = esc_html__( 'Logisfare', 'logisfare' );
$manifest[ 'uri' ]			 	 = esc_url( 'https://omanthemes.com/logisfare/wp/' );
$manifest[ 'description' ]       = esc_html__( 'Logisfare - Creative Agency WordPress Theme', 'logisfare' );
$manifest[ 'version' ]           = '1.0';
$manifest[ 'author' ]			 = 'themewar';
$manifest[ 'author_uri' ]		 = esc_url( 'https://themeforest.net/user/themewar' );
$manifest[ 'requirements' ]	 	 = array(
	'wordpress'     => array(
	'min_version' 	=> '5.0',
	),
);
$manifest[ 'id' ] = 'scratch';

$manifest[ 'supported_extensions' ] = array(
    'backups'               => array(),
);
