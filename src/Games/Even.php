<?php

namespace BrainGames\Games\Even;

use function  BrainGames\GameStructure\init;

const MAX_NUMBER = 100;
const MIN_NUMBER = -1;
const GAME_DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function run()
{
    $questionFunction = function () {

        $number = rand(MIN_NUMBER, MAX_NUMBER);
        $question = "$number";
        $rightAnswer = isEven($number) ? 'yes' : 'no';

        return [$question, $rightAnswer];
    };
    init(GAME_DESCRIPTION, $questionFunction);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
