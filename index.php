<?php

    require_once __DIR__ . '/partials/constants.php';
    require_once __DIR__ . '/partials/variables.php';
    require_once __DIR__ . '/partials/getPlayersName.php';
    require_once __DIR__ . '/partials/buildBoard.php';
    require_once __DIR__ . '/partials/showBoard.php';
    require_once __DIR__ . '/partials/isPositionCorrect.php';
    require_once __DIR__ . '/partials/validate.php';
    require_once __DIR__ . '/partials/isBoardFull.php';
    require_once __DIR__ . '/partials/swapPlayer.php';
    require_once __DIR__ . '/partials/showWinner.php';
    require_once __DIR__ . '/partials/playAgain.php';

    do {
        $players = getPlayersName();

        $player = PLAYER_ONE_ICON;

        $board = buildBoard();

        $winner = null;

        while($winner === null) {
            echo showBoard($board);

            $position = (int) readline("Player {$player}, digite a sua posicão: ");

            if(!isPositionCorrect($position, $board)) {
                continue;
            }

            $board[$position] = $player;

            if(validate($board, PLAYER_ONE_ICON)) {
                $winner = PLAYER_ONE_ICON;
            } else if(validate($board, PLAYER_TWO_ICON)) {
                $winner = PLAYER_TWO_ICON;
            } else{
                $winner = null;
            }

            if(isBoardFull($board)) {
                break;
            }

            $player = swapPlayer($player);
        }

        echo showBoard($board);

        echo showWinner($winner, $players);

        $playAgain = playAgain();

        echo"\n";

    } while($playAgain === true);
?>