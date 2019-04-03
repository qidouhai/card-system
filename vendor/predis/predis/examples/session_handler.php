<?php
 require __DIR__.'/shared.php'; if (!interface_exists('SessionHandlerInterface')) { die('ATTENTION: the session handler implemented by Predis requires PHP >= 5.4.0 '. "or a polyfill for SessionHandlerInterface provided by an external package.\n"); } $client = new Predis\Client($single_server, array('prefix' => 'sessions:')); $handler = new Predis\Session\Handler($client, array('gc_maxlifetime' => 5)); $handler->register(); session_id('example_session_id'); session_start(); if (isset($_SESSION['foo'])) { echo "Session has `foo` set to {$_SESSION['foo']}", PHP_EOL; } else { $_SESSION['foo'] = $value = mt_rand(); echo "Empty session, `foo` has been set with $value", PHP_EOL; } 