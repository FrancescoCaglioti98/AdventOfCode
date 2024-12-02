<?php
/** @var array $instructions */
include_once "./InputData/Day6_InputData.php";

class Light
{
    private int $brightness = 0;

    public function turnOff(): void
    {
        $this->brightness = ( $this->brightness - 1 ) < 0 ? 0 : $this->brightness - 1;
    }
    public function turnOn(): void
    {
        $this->brightness =  $this->brightness + 1;
    }
    public function flipState(): void
    {
        $this->brightness =  $this->brightness + 2;
    }

    public function getBrightness(): int
    {
        return $this->brightness;
    }


}

class Grid {

    private array $grid = [];
    private int $gridSize = 1000;

    public function __construct()
    {
        for ( $i = 0; $i < $this->gridSize; $i++ ) {
            for ($j = 0; $j < $this->gridSize; $j++) {
                $this->grid[$i][$j] = new Light();
            }
        }
    }

    public function turnOn( int $startingX, int $startingY, int $endingX, int $endingY ): void
    {
        for ( $j = $startingX; $j <= $endingX; $j++ ) {
            for ( $k = $startingY; $k <= $endingY; $k++ ) {
                $this->grid[$j][$k]->turnOn();
            }
        }
    }

    public function turnOff( int $startingX, int $startingY, int $endingX, int $endingY ): void
    {
        for ( $j = $startingX; $j <= $endingX; $j++ ) {
            for ( $k = $startingY; $k <= $endingY; $k++ ) {
                $this->grid[$j][$k]->turnOff();
            }
        }
    }

    public function toggle( int $startingX, int $startingY, int $endingX, int $endingY ): void
    {
        for ( $j = $startingX; $j <= $endingX; $j++ ) {
            for ( $k = $startingY; $k <= $endingY; $k++ ) {
                $this->grid[$j][$k]->flipState();
            }
        }
    }

    public function getCounterLitLights(): int
    {
        $counter = 0;
        for( $i = 0; $i < $this->gridSize; $i++ ) {
            for ( $j = 0; $j < $this->gridSize; $j++ ) {
                $counter += $this->grid[$j][$j]->getBrightness();
            }
        }
        return $counter;
    }

}


$grid = new Grid();


//$instructions = [
//    "toggle 0,0 through 999,999",
//    "toggle 0,0 through 999,999",
//];
foreach ( $instructions as $instruction ) {

    // Usa una regex per trovare i numeri nella stringa
    preg_match_all('/\d+/', $instruction, $matches);

    // I risultati saranno un array di numeri
    $numbers = array_map('intval', $matches[0]);
    list($x1, $y1, $x2, $y2) = $numbers;


    preg_match('/^.*?(?=\d)/', $instruction, $matches);
    $action = trim( $matches[0] );


    switch( $action ) {
        case 'turn off':
            $grid->turnOff( $x1, $y1, $x2, $y2 );
        break;
        case 'turn on':
            $grid->turnOn( $x1, $y1, $x2, $y2 );
        break;
        case 'toggle':
            $grid->toggle( $x1, $y1, $x2, $y2 );
        break;
    }
//    var_dump( $grid->check() );
}

var_dump( $grid->getCounterLitLights() );