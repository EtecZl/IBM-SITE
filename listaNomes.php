<?php

$directory = 'assets/Imagens/Produtos';
$files = scandir($directory);

if ($files !== false) {
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo $file . "<br>";
        }
    }
}

?>
