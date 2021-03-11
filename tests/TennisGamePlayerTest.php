<?php


declare(strict_types=1);

namespace Deg540\PHPTestingBoilerplate\Test;


use Deg540\PHPTestingBoilerplate\TennisGamePlayer;
use PHPUnit\Framework\TestCase;

final class TennisGamePlayerTest extends TestCase
{
    /**
     * @test
     */
    public function shouldShow_0_0_Score()
    {
        $gamePlayer = new TennisGamePlayer("Player1","Player2");
        $resultScore = $gamePlayer->getScore();
        $this->assertEquals("Love all", $resultScore);
    }
    /**
     * @test
     */
    public function shouldWonOnePointPlayerOne()
    {
        $gamePlayer = new TennisGamePlayer("Player1","Player2");
        $gamePlayer->wonPoint("Player1");
        $resultScore = $gamePlayer->getScore();
        $this->assertEquals("Fifteen - Love", $resultScore);
    }
}
