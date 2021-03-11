<?php


namespace Deg540\PHPTestingBoilerplate;


class TennisGamePlayer
{
    private string $firstPlayerName;
    private string $secondPlayerName;
    private int $firstPlayerScore;
    private int $secondPlayerScore;

    /**
     * TennisGamePlayer constructor.
     * @param string $firstPlayerName
     * @param string $secondPlayerName
     * @param int $firstPlayerScore
     * @param int $secondPlayerScore
     */
    public function __construct(string $firstPlayerName, string $secondPlayerName)
    {
        $this->firstPlayerName = $firstPlayerName;
        $this->secondPlayerName = $secondPlayerName;
        $this->firstPlayerScore = 0;
        $this->secondPlayerScore = 0;
    }
    public function getScore ()
    {
        if($this->firstPlayerScore == $this->secondPlayerScore)
        {
            if($this->firstPlayerScore == 0)
            {
                return "Love all";
            }
        }
        if($this->firstPlayerScore != $this->secondPlayerScore)
        {
            if(($this->firstPlayerScore == 15) && ($this->secondPlayerScore == 0))
            {
                return("Fifteen - Love");
            }
        }

    }

    public function wonPoint(String $playerWhoWinName)
    {
        if($playerWhoWinName == $this->firstPlayerName)
        {
            $this->firstPlayerScore = $this->firstPlayerScore + 15;
        }
    }

}