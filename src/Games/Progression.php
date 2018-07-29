<?php

namespace BrainGames\Games\Progression;

use function  BrainGames\GameEngine\init;

const PROGRESSION_LENGTH = 10;
const STEP_MIN = 1;
const STEP_MAX = 10;
const START_MIN = 0;
const START_MAX = 100;
const GAME_DESCRIPTION = 'What number is missing in this progression?';

function run()
{
    $questionFunction = function () {

        $step = rand(STEP_MIN, STEP_MAX);
        $startNumber = rand(START_MIN, START_MAX);
        $progression = makeProgression($startNumber, $step);
        $indexToHide = array_rand($progression);
        $rightAnswer = $progression[$indexToHide];
        $progression[$indexToHide] = '..';
        $question = implode(' ', $progression);

        return [$question, $rightAnswer];
    };
    init(GAME_DESCRIPTION, $questionFunction);
}

function makeProgression(int $startNumber, int $step): array
{
    $progression = [$startNumber];
    for ($i = 1; $i < PROGRESSION_LENGTH; $i++) {
        $progression[$i] = $progression[$i - 1] + $step;
    }

    return $progression;
}
