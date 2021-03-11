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
        $result = $gamePlayer->getScore();
        $this->assertEquals("Love all", $result);
    }
}
