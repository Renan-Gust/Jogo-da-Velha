<?php

function playAgain(): bool {
    $result = readline("\nDeseja jogar novamente? (s/n): ");

    return $result === 's' ? true : false;
}

?>