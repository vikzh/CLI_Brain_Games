<?php

namespace BrainGames\Games\Even;

use function \cli\line;
use function \cli\prompt;

const ANSWERS_FOR_VICTORY = 3;
const MAX_NUMBER = 100;
const MIN_NUMBER = -1;

function run()
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if number even otherwise answer "no".');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($i = 0, $game = true; $i < ANSWERS_FOR_VICTORY && $game; $i++) {
        $game = question($name);
    }
    if ($game) {
        line('Congratulations, %s!', $name);
    }
}

function question(string $name): bool
{
    $questionNumber = rand(MIN_NUMBER, MAX_NUMBER);
    $rightAnswer = $questionNumber % 2 ? 'no' : 'yes';
    line("Question: %d", $questionNumber);
    $answer = prompt('Your answer');
    if ($answer === $rightAnswer) {
        line('Correct!');
        return true;
    } else {
        line('%s is wrong answer ;(. Correct answer was %s.', $answer, $rightAnswer);
        line('Let\'s try again, %s!', $name);
        return false;
    }
}

