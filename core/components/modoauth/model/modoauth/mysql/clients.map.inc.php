<?php
$xpdo_meta_map['Clients']= array (
  'package' => 'modoauth',
  'version' => NULL,
  'table' => 'oauth_clients',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'client_id' => '',
    'client_secret' => '',
    'redirect_uri' => '',
  ),
  'fieldMeta' => 
  array (
    'client_id' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '80',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'client_secret' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '80',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'redirect_uri' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '2000',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
  ),
  'indexes' => 
  array (
    'client_id' => 
    array (
      'alias' => 'id',
      'primary' => true,
      'unique' => true,
      'type' => 'BTREE',
      'columns' => 
      array (
        'client_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
