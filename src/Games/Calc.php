<?php

namespace BrainGames\Games\Calc;

use function  BrainGames\GameStructure\init;

const MAX_NUMBER = 100;
const MIN_NUMBER = -1;
const OPERATIONS = ['+', '-', '*'];
const GAME_DESCRIPTION = 'What is the result of the expression?';

function run()
{
    $questionFunction = function () {

        $firstNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $secondNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $operator = OPERATIONS[array_rand(OPERATIONS)];
        $question = "$firstNumber $operator $secondNumber";
        $rightAnswer = calculate($firstNumber, $secondNumber, $operator);

        return [$question, $rightAnswer];
    };
    init(GAME_DESCRIPTION, $questionFunction);
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
