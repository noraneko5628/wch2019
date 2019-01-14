<?php

// Load main css and that's it.
add_action( 'wp_enqueue_scripts', function() {
	$time = filemtime( __DIR__.'/dist/assets/css/style.css' );
	wp_enqueue_style( 'wch2019', get_stylesheet_directory_uri() . '/dist/assets/css/style.css', [], $time );
} );
