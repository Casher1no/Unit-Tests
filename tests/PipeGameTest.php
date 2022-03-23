<?php
declare(strict_types=1);

use App\Pipes;
use PHPUnit\Framework\TestCase;

class PipeGameTest extends TestCase
{
    public function testRotation_1()
    {
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

        $game = new Pipes($pipes, $field, $completedField);

        $game->rotate(0, 0);
        $this->assertEquals("=O", $game->getSpecificPipe(0, 0));
    }
    public function testRotation_2()
    {
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

        $game = new Pipes($pipes, $field, $completedField);

        $game->rotate(3, 3);
        $this->assertEquals("O=", $game->getSpecificPipe(3, 3));
    }
    public function testRotation_3()
    {
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

        $game = new Pipes($pipes, $field, $completedField);

        $game->rotate(2, 2);
        $this->assertEquals("==", $game->getSpecificPipe(2, 2));
    }
    public function testRotation_4()
    {
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

        $game = new Pipes($pipes, $field, $completedField);

        $game->rotate(3, 2);
        $this->assertEquals("‾|", $game->getSpecificPipe(3, 2));
    }
    public function testWin()
    {
        $pipes=[
            ["--","||"],
            ["L_","|‾","‾|","_|"],
            ["O=","P ","=O","b "],
            ["T ","=|","⊥ ","|="],
            ["==","╏╏"]
        ];
        
        $field=[
            [["O="],["P "],["O="],["‾|"]],
            [["|="],["=|"],["O="],["=|"]],
            [["b "],["|="],["=="],["_|"]],
            [["O="],["⊥ "],["||"],["=O"]]
        ];
        $completedField=[
            [["P "],["P "],["O="],["‾|"]],
            [["|="],["=|"],["O="],["=|"]],
            [["b "],["|="],["=="],["_|"]],
            [["O="],["⊥ "],["--"],["=O"]]
        ];

        $game = new Pipes($pipes, $field, $completedField);

        $game->rotate(0, 0);
        $game->rotate(2, 3);
        $this->assertTrue($game->compareFields());
    }
    public function testGameInProgress()
    {
        $pipes=[
            ["--","||"],
            ["L_","|‾","‾|","_|"],
            ["O=","P ","=O","b "],
            ["T ","=|","⊥ ","|="],
            ["==","╏╏"]
        ];
        
        $field=[
            [["O="],["P "],["O="],["‾|"]],
            [["|="],["=|"],["O="],["=|"]],
            [["b "],["|="],["=="],["_|"]],
            [["O="],["⊥ "],["||"],["=O"]]
        ];
        $completedField=[
            [["P "],["P "],["O="],["‾|"]],
            [["|="],["=|"],["O="],["=|"]],
            [["b "],["|="],["=="],["_|"]],
            [["O="],["⊥ "],["--"],["=O"]]
        ];

        $game = new Pipes($pipes, $field, $completedField);


        $this->assertFalse($game->compareFields());
    }
    public function testGame()
    {
        $pipes=[
            ["--","||"],
            ["L_","|‾","‾|","_|"],
            ["O=","P ","=O","b "],
            ["T ","=|","⊥ ","|="],
            ["==","╏╏"]
        ];
        
        $field=[
            [["O="],["P "],["O="],["‾|"]],
            [["|="],["=|"],["O="],["=|"]],
            [["b "],["|="],["=="],["_|"]],
            [["O="],["⊥ "],["||"],["=O"]]
        ];
        $completedField=[
            [["P "],["P "],["O="],["‾|"]],
            [["|="],["=|"],["O="],["=|"]],
            [["b "],["|="],["=="],["_|"]],
            [["O="],["⊥ "],["--"],["=O"]]
        ];

        $game = new Pipes($pipes, $field, $completedField);

        echo PHP_EOL;
        $game->showField();
        $game->rotate(0, 0);
        echo PHP_EOL;
        $game->showField();
        $game->rotate(2, 3);
        echo PHP_EOL;
        $game->showField();
        echo PHP_EOL;
        echo "You won!";

        
        $this->assertTrue($game->compareFields());
    }
}
