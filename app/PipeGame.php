<?php

require "Pipes.php";


while (!$pipesGame->compareFields()) {
    $pipesGame->showField();

    $x = readline("X coordinate (0-3):");
    $y = readline("Y coordinate (0-3):");
    if ($x > 3 || $x < 0) {
        echo "wrong X input!" . PHP_EOL;
    }
    if ($y > 3 || $y < 0) {
        echo "wrong Y input!" . PHP_EOL;
    }
    
    $pipesGame->rotate($x, $y);
}

echo "YOU WON";
