<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
@session_start();
define('__BASE_DIR__', substr(__DIR__, 0, strpos(__DIR__, 'src') - 1) . DIRECTORY_SEPARATOR);
define('__SOURCE__', substr(__DIR__, 0, strpos(__DIR__, 'src') + 3) . DIRECTORY_SEPARATOR);
include __SOURCE__ . 'conf' . DIRECTORY_SEPARATOR . 'connection.php';
include __SOURCE__ . 'conf' . DIRECTORY_SEPARATOR . 'conf.php';
include __SOURCE__ . 'helpers' . DIRECTORY_SEPARATOR . 'helpers.php';
include __SOURCE__ . 'helpers' . DIRECTORY_SEPARATOR . 'fw.php';
include __SOURCE__ . 'helpers' . DIRECTORY_SEPARATOR . 'security.php';
include __SOURCE__ . 'dist' . DIRECTORY_SEPARATOR . 'php' . DIRECTORY_SEPARATOR . 'methods.php';
include __SOURCE__ . 'dist' . DIRECTORY_SEPARATOR . 'php' . DIRECTORY_SEPARATOR . 'Model.php';
include __SOURCE__ . 'dist' . DIRECTORY_SEPARATOR . 'php' .DIRECTORY_SEPARATOR . 'relations.php';
foreach (new RegexIterator(new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__SOURCE__.'models/')), '/\.php$/') as $phpFile) {
    include __SOURCE__ ."models/". explode("/models/", $phpFile->getRealPath())[1];
}