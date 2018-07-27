<?php

namespace BrainGames\GameStructure;

use function \cli\line;
use function \cli\prompt;

const ANSWERS_FOR_VICTORY = 3;

function init($description, $questionFunction)
{
    line('Welcome to the Brain Games!');
    line('%s', $description);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $game = true;
    for ($i = 0; $i < ANSWERS_FOR_VICTORY; $i++) {
        if ($game) {
            [$question, $rightAnswer] = $questionFunction();
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
    isSuccess($game, $name);
    return 0;
}

function isSuccess($game, $name)
{
    if ($game) {
        line('Congratulations, %s!', $name);
    } else {
        line('Let\'s try again, %s!', $name);
    }
}
