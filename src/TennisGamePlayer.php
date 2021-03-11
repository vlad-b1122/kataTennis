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
    private array $timesScoredToScoreRelation;


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
        $this->timesScoredToScoreRelation = [1=>15, 2=>30,3=>40];
        $this->scoreToTextRelation = [0=>"Love",15=>"Fifteen", 30=>"Thirty",40=>"Forty"];
    }
    public function getScore ()
    {
        if($this->firstPlayerTimesScored == $this->secondPlayerTimesScored)
        {
            if($this->firstPlayerTimesScored == 0)
            {
                return "Love all";
            }
            if($this->firstPlayerTimesScored == 1)
            {
                return "Fifteen all";
            }
            if($this->firstPlayerTimesScored == 2)
            {
                return "Thirty all";
            }
            if($this->firstPlayerTimesScored > 2)
            {
                return "Deuce";
            }
        }
        if($this->firstPlayerTimesScored != $this->secondPlayerTimesScored)
        {
            if($this->firstPlayerTimesScored > 2)
            {
                return  "Win " . $this->firstPlayerName;
            }
            if($this->secondPlayerTimesScored > 2)
            {
                return  "Win " . $this->secondPlayerName;
            }
        }

        $firstPlayerTemporalText = "";
        $secondPlayerTemporalText = "";
        foreach($this->scoreToTextRelation as $score => $text)
        {
            if($this->firstPlayerScore == $score)
            {
                $firstPlayerTemporalText = $text;
            }
            if($this->secondPlayerScore == $score)
            {
                $secondPlayerTemporalText = $text;
            }
        }
        return $firstPlayerTemporalText . " - " . $secondPlayerTemporalText;
    }

    public function wonPoint(String $playerWhoWonPointName)
    {
        if($playerWhoWonPointName == $this->firstPlayerName)
        {
            $this->firstPlayerTimesScored = $this->firstPlayerTimesScored + 1;
            foreach($this->timesScoredToScoreRelation as $timesScored => $actualScore)
            {
                if($this->firstPlayerTimesScored == $timesScored)
                {
                    $this->firstPlayerScore =  $actualScore;
                }
            }
        }
        if($playerWhoWonPointName == $this->secondPlayerName)
        {
            $this->secondPlayerTimesScored = $this->secondPlayerTimesScored + 1;
            foreach($this->timesScoredToScoreRelation as $timesScored => $actualScore)
            {
                if($this->secondPlayerTimesScored == $timesScored)
                {
                    $this->secondPlayerScore =  $actualScore;
                }
            }
        }
    }

}