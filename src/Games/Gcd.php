<?php

namespace BrainGames\Games\Gcd;

use BrainGames\GameStructure as Init;

const MAX_NUMBER = 100;
const MIN_NUMBER = 1;
const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function run()
{
    $questionFunction = function () {

        $firstNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $secondNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $question = "$firstNumber $secondNumber";
        $rightAnswer = gcd($firstNumber, $secondNumber);

        return [$question, $rightAnswer];
    };
    Init\init(GAME_DESCRIPTION, $questionFunction);
}

function gcd(int $firstNumber, int $secondNumber): int
{
    while ($firstNumber !== $secondNumber) {
        if ($firstNumber > $secondNumber) {
            $firstNumber = $firstNumber - $secondNumber;
        } else {
            $secondNumber = $secondNumber - $firstNumber;
        }
    }
    return $firstNumber;
}
