<?php


namespace Deg540\PHPTestingBoilerplate;


class TennisGamePlayer
{
    private string $firstPlayerName;
    private string $secondPlayerName;
    private int $firstPlayerScore;
    private int $secondPlayerScore;
    private int $firstPlayerTimesScored;
    private int $secondPlayerTimesScored;
    private array $timesScoredToScoreRelation = ["1"=>15, "2"=>30,"3"=>40];


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
        $this->firstPlayerTimesScored = 0;
        $this->secondPlayerTimesScored = 0;
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
            $this->firstPlayerTimesScored = $this->firstPlayerTimesScored + 1;
        }
    }

}