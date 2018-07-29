<?php

namespace BrainGames\GameEngine;

use function \cli\line;
use function \cli\prompt;

const ANSWERS_FOR_VICTORY = 3;

function init($description, $getGameData)
{
    $userName = greeting($description);
    $isWin = game($getGameData);
    if ($isWin) {
        line('Congratulations, %s!', $userName);
    } else {
        line('Let\'s try again, %s!', $userName);
    }
}

function game($getGameData): bool
{
    for ($i = 0; $i < ANSWERS_FOR_VICTORY; $i++) {
        [$question, $rightAnswer] = $getGameData();
        line("Question: %s", $question);
        $answer = prompt('Your answer');
        if ($answer == $rightAnswer) {
            line('Correct!');
        } else {
            line('%s is wrong answer ;(. Correct answer was %s.', $answer, $rightAnswer);
            return false;
        }
    }
    return true;
}

function greeting($description)
{
    line('Welcome to the Brain Games!');
    line('%s', $description);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}