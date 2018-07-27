<?php

namespace BrainGames\Games\Prime;

use function  BrainGames\GameStructure\init;

const MAX_NUMBER = 100;
const MIN_NUMBER = 1;
const GAME_DESCRIPTION = 'Answer "yes" if number prime otherwise answer "no".';

function run()
{
    $questionFunction = function () {

        $number = rand(MIN_NUMBER, MAX_NUMBER);
        $question = $number;
        $rightAnswer = isPrime($number) ? 'yes' : 'no';

        return [$question, $rightAnswer];
    };
    init(GAME_DESCRIPTION, $questionFunction);
}

function isPrime(int $number): bool
{
    if ($number <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
