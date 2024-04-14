<?php

function pocet_suborov($dir) {
    $pocet = 0;
    $files = glob($dir . "/*");
    foreach ($files as $value) {
        if (is_file($value)) {
            $pocet++;
        }
    }
    return $pocet;
}
?>
