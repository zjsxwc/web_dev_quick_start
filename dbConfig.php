<?php
/**
 * Created by IntelliJ IDEA.
 * User: wangchao
 * Date: 11/22/16
 * Time: 2:51 PM
 */

return $conn = array(
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
);

//return array(
//    'dbname'   => 'testdb',
//    'user'     => 'root',
//    'password' => 'rootpass',
//    'host'     => 'localhost',// or if encountered `SQLSTATE[HY000] [2002] No such file or directory` error,
//                              // then try 127.0.0.1
//    'driver'   => 'pdo_mysql',
//);