<?php

return [
  'database' =>[
      'name' => 'gate_cms',
      'username' => 'gate_cms_user',
      'password' => 'gate_cms',
      'connection' => 'mysql:host=127.0.0.1',
      'options' => [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]
  ]

];