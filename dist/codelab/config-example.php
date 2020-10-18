<?php
/*
    @package    Codelab
    @author     <dev@g3ck.com>
    @copyright  2020 G3ck.com
    @homepage   g3ck.com/codelab
*/
define('clConfig', array(
    'sql' => array(
        'engine' => 'mysqli',
        'config' => array(
            'prefix' => 'SomePrefix',
            'name' => 'DATABASE_NAME',
            'user' => 'USERNAME',
            'pass' => 'PASSWORD',
            'host' => 'DATABASE_HOST',
            'port' => '3306',
            'characters' => 'UTF-8'
        ),
	),
    'guard' => array(
        'wall' => array(
        //    'password' => 'spftest77'
        )
    ),
	'crypto' => array(
		'method' => 'AES-256-CBC',
		'key' => '2nf7v0g89032723q90f4870q237hn9f480',
		'iv' => 'gg43wtwsh4rh45y'
	),
    'media' => array(
        'path' => '/media',
	),
	'session' => array(
        'path' => '/storage/session9847598',					// Session storage path ex. '/storage/session' or false = auto
		'name' => 'CodelabTestSession43',
	),
	'php' => array(
		'errors' => true,
		'memoryLimit' => '128M',
	),

));
