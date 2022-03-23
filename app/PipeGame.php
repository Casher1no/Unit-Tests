<?php
namespace App;

$pipes=[
    ["--","||"],
    ["L_","|‾","‾|","_|"],
    ["O=","P ","=O","b "],
    ["T ","=|","⊥ ","|="],
    ["==","╏╏"]
];

$field=[
    [["P "],["=O"],["b "],["|‾"]],
    [["T "],["⊥ "],["P "],["T "]],
    [["O="],["T "],["╏╏"],["|‾"]],
    [["O="],["T "],["||"],["b "]]
];
$completedField=[
    [["P "],["P "],["O="],["‾|"]],
    [["|="],["=|"],["O="],["=|"]],
    [["b "],["|="],["=="],["_|"]],
    [["O="],["⊥ "],["--"],["=O"]]
];
class Pipes
{
    private $pipes=[];

    private $field=[];
    private $completedField=[];

    public function __construct(array $pipes, array $field, array $completedField)
    {
        $this->pipes = $pipes;
        $this->field = $field;
        $this->completedField = $completedField;
    }

    public function showField():void
    {
        foreach ($this->field as $y) {
            foreach ($y as $x) {
                echo $x[0];
            }
            echo "\n";
        }
    }
    public function rotate(int $x, int $y):void
    {
        $select = $this->field[$y][$x][0];
        $pipePos = 0;
        $pipeRot = 0;
        foreach ($this->pipes as $key => $pipe) {
            foreach ($pipe as $k => $rotation) {
                if ($select == $rotation) {
                    $pipePos = $key;
                    $pipeRot = $k;
                }
            }
        }

        $pipeRot++;
        if ($pipeRot == count($this->pipes[$pipePos])) {
            $pipeRot = 0;
        }

        $this->field[$y][$x][0] = $this->pipes[$pipePos][$pipeRot];
    }
    public function compareFields():bool
    {
        return $this->field == $this->completedField ? true : false;
    }
}




$pipesGame = new Pipes($pipes, $field, $completedField);



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
