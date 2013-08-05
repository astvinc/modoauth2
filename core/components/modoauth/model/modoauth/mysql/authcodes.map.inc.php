<?php
$xpdo_meta_map['AuthCodes']= array (
  'package' => 'modoauth',
  'version' => NULL,
  'table' => 'oauth_authorization_codes',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'user_id' => '',
    'client_id' => '',
    'authorization_code' => '',
    'redirect_uri' => '',
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
    'authorization_code' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '40',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'redirect_uri' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '2000',
      'phptype' => 'string',
      'null' => true,
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
    'authorization_code' => 
    array (
      'alias' => 'authorization_code',
      'primary' => true,
      'unique' => true,
      'type' => 'BTREE',
      'columns' => 
      array (
        'authorization_code' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
