<?php

namespace BrainGames\Games\Gcd;

use function \cli\line;
use function \cli\prompt;
use BrainGames\GameStructure as Init;

const MAX_NUMBER = 100;
const MIN_NUMBER = 1;
const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function run()
{
    $questionFunction = function () {
        $game = true;
        for ($i = 0; $i < Init\ANSWERS_FOR_VICTORY; $i++) {
            if ($game) {
                $firstNumber = rand(MIN_NUMBER, MAX_NUMBER);
                $secondNumber = rand(MIN_NUMBER, MAX_NUMBER);
                $question = "$firstNumber $secondNumber";
                $rightAnswer = gcd($firstNumber, $secondNumber);
                line("Question: %s", $question);
                $answer = prompt('Your answer');
                if ($answer == $rightAnswer) {
                    line('Correct!');
                } else {
                    line('%s is wrong answer ;(. Correct answer was %s.', $answer, $rightAnswer);

                    return false;
                }
            }
        }
        return true;
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
