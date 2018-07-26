<?php

namespace BrainGames\Games\Calc;

use function \cli\line;
use function \cli\prompt;

const ANSWERS_FOR_VICTORY = 3;
const MAX_NUMBER = 100;
const MIN_NUMBER = -1;
const OPERATIONS = ['+', '-', '*'];

function run()
{
    line('Welcome to the Brain Games!');
    line('What is the result of the expression?');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $gameResult = question();
    if ($gameResult) {
        line('Congratulations, %s!', $name);
    } else {
        line('Let\'s try again, %s!', $name);
    }
}

function question(): bool
{
    $game = true;
    for ($i = 0; $i < ANSWERS_FOR_VICTORY; $i++) {
        if ($game) {
            $firstOperand = rand(MIN_NUMBER, MAX_NUMBER);
            $secondOperand = rand(MIN_NUMBER, MAX_NUMBER);
            $operator = OPERATIONS[array_rand(OPERATIONS)];
            $rightAnswer = calculate($firstOperand, $secondOperand, $operator);
            line("Question: %d %s %d", $firstOperand, $operator, $secondOperand);
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
}

function calculate(int $firstOperand, int $secondOperand, $operator): int
{
    $result = 0;
    switch ($operator) {
        case "+":
            $result = $firstOperand + $secondOperand;
            break;
        case "-":
            $result = $firstOperand - $secondOperand;
            break;
        case "*":
            $result = $firstOperand * $secondOperand;
            break;
    }
    return $result;
}
