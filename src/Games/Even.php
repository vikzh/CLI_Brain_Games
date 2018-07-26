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

    $game = true;
    for ($i = 0; $i < ANSWERS_FOR_VICTORY; $i++) {
        if ($game) {
            $game = question($name);
        } else {
            return;
        }
    }
    if ($game) {
        line('Congratulations, %s!', $name);
    }
}

function question(string $name): bool
{
    $question = rand(MIN_NUMBER, MAX_NUMBER);
    $rightAnswer = isEven($question) ? 'yes' : 'no';
    line("Question: %d", $question);
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

function isEven(int $number): bool
{
    return $number % 2 === 1 ? false : true;
}
