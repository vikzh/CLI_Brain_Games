<?php

namespace BrainGames\Games\Balance;

use function  BrainGames\GameStructure\init;

const MAX_NUMBER = 100;
const MIN_NUMBER = 1;
const GAME_DESCRIPTION = 'Balance the given number.';

function run()
{
    $questionFunction = function () {

        $number = rand(MIN_NUMBER, MAX_NUMBER);
        $question = $number;
        $rightAnswer = balanceNumber((string)$number);

        return [$question, $rightAnswer];
    };
    init(GAME_DESCRIPTION, $questionFunction);
}

function balanceNumber($number): int
{
    $numbersOfNumber = str_split($number);
    $countNumbers = count($numbersOfNumber);
    $sumOfNumbers = array_sum($numbersOfNumber);
    $balanceNumbers = array_fill(0, $countNumbers, 0);
    for ($i = 0; $sumOfNumbers > 0; $i++) {
        if ($i === $countNumbers) {
            $i = 0;
        }
        $balanceNumbers[$i]++;
        $sumOfNumbers--;
    }
    return implode('', array_reverse($balanceNumbers));
}
