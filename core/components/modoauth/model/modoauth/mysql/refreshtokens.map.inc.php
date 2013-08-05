<?php
$xpdo_meta_map['RefreshTokens']= array (
  'package' => 'modoauth',
  'version' => NULL,
  'table' => 'oauth_refresh_tokens',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'user_id' => '',
    'client_id' => '',
    'refresh_token' => '',
    'scope' => '',
    'expires' => NULL,
  ),
  'fieldMeta' => 
  array (
    'user_id' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'client_id' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '80',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'refresh_token' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '40',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'scope' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '2000',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'expires' => 
    array (
      'dbtype' => 'timestamp',
      'phptype' => 'timestamp',
      'null' => false,
    ),
  ),
  'indexes' => 
  array (
    'refresh_token' => 
    array (
      'alias' => 'refresh_token',
      'primary' => true,
      'unique' => true,
      'type' => 'BTREE',
      'columns' => 
      array (
        'refresh_token' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
