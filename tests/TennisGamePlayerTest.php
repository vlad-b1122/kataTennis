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

    /**
     * @test
     */
    public function shouldWonOnePointPlayerTwo()
    {
        $gamePlayer = new TennisGamePlayer("Player1","Player2");
        $gamePlayer->wonPoint("Player2");
        $resultScore = $gamePlayer->getScore();
        $this->assertEquals("Love - Fifteen", $resultScore);
    }

    /**
     * @test
     */
    public function shouldShowIfAll15()
    {
        $gamePlayer = new TennisGamePlayer("Player1","Player2");
        $gamePlayer->wonPoint("Player1");
        $gamePlayer->wonPoint("Player2");
        $resultScore = $gamePlayer->getScore();
        $this->assertEquals("Fifteen all", $resultScore);
    }
    /**
     * @test
     */
    public function shouldShowIfAll30()
    {
        $gamePlayer = new TennisGamePlayer("Player1","Player2");
        $gamePlayer->wonPoint("Player1");
        $gamePlayer->wonPoint("Player1");
        $gamePlayer->wonPoint("Player2");
        $gamePlayer->wonPoint("Player2");
        $resultScore = $gamePlayer->getScore();
        $this->assertEquals("Thirty all", $resultScore);
    }
    /**
     * @test
     */
    public function shouldShowIfDeuce()
    {
        $gamePlayer = new TennisGamePlayer("Player1","Player2");
        $gamePlayer->wonPoint("Player1");
        $gamePlayer->wonPoint("Player2");
        $gamePlayer->wonPoint("Player1");
        $gamePlayer->wonPoint("Player2");
        $gamePlayer->wonPoint("Player1");
        $gamePlayer->wonPoint("Player2");
        $resultScore = $gamePlayer->getScore();
        $this->assertEquals("Deuce", $resultScore);
    }
    /**
     * @test
     */
    public function shouldShowIfSomeoneWins()
    {
        $gamePlayer = new TennisGamePlayer("Player1","Player2");
        $gamePlayer->wonPoint("Player1");
        $gamePlayer->wonPoint("Player2");
        $gamePlayer->wonPoint("Player1");
        $gamePlayer->wonPoint("Player2");
        $gamePlayer->wonPoint("Player1");
        $gamePlayer->wonPoint("Player1");
        $resultScore = $gamePlayer->getScore();
        $this->assertEquals("Win Player1", $resultScore);
    }
    /**
     * @test
     */
    public function shouldShowAdvantage()
    {
        $gamePlayer = new TennisGamePlayer("Player1","Player2");
        $gamePlayer->wonPoint("Player1");
        $gamePlayer->wonPoint("Player2");
        $gamePlayer->wonPoint("Player1");
        $gamePlayer->wonPoint("Player2");
        $gamePlayer->wonPoint("Player1");
        $gamePlayer->wonPoint("Player2");
        $gamePlayer->wonPoint("Player1");

        $resultScore = $gamePlayer->getScore();
        $this->assertEquals("Advantage Player1", $resultScore);
    }
}
