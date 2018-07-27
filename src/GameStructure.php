<?php

namespace BrainGames\GameStructure;

use function \cli\line;
use function \cli\prompt;

const ANSWERS_FOR_VICTORY = 3;

function init($description, $question)
{
    line('Welcome to the Brain Games!');
    line('%s', $description);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $gameResult = $question();
    if ($gameResult) {
        line('Congratulations, %s!', $name);
    } else {
        line('Let\'s try again, %s!', $name);
    }
}
