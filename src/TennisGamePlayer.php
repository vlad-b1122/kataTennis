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
    private bool $hadDeuce;
    private array $timesScoredToActualScoreRelation;
    private array $scoreToTextRelation;

    /**
     * TennisGamePlayer constructor.
     * @param string $firstPlayerName
     * @param string $secondPlayerName
     */
    public function __construct(string $firstPlayerName, string $secondPlayerName)
    {
        $this->firstPlayerName = $firstPlayerName;
        $this->secondPlayerName = $secondPlayerName;
        $this->firstPlayerScore = 0;
        $this->secondPlayerScore = 0;
        $this->firstPlayerTimesScored = 0;
        $this->secondPlayerTimesScored = 0;
        $this->timesScoredToActualScoreRelation = [1=>15, 2=>30,3=>40];
        $this->scoreToTextRelation = [0=>"Love",15=>"Fifteen", 30=>"Thirty",40=>"Forty"];
        $this->hadDeuce = false;
    }
    public function getScore (): string
    {
        if($this->hadDeuce == false)
        {
            return $this->beforeDeuceScoreHandler();
        }
        if(($this->hadDeuce == true))
        {
            return $this->afterDeuceScoreHandler();
        }
    }
    private function beforeDeuceScoreHandler(): string
    {
        if($this->firstPlayerTimesScored == $this->secondPlayerTimesScored)
        {
            return $this->beforeDeuceEqualsScoreHandler();
        }
        if(($this->firstPlayerTimesScored != $this->secondPlayerTimesScored) && (($this->firstPlayerTimesScored > 2) || ($this->secondPlayerTimesScored > 2)))
        {
            return $this->beforeDeuceWinnerScoreHandler();
        }
        return $this->beforeDeuceNumeralScoreHandler();
    }
    private function beforeDeuceEqualsScoreHandler(): string
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
    }
    private function beforeDeuceWinnerScoreHandler(): string
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
    private function beforeDeuceNumeralScoreHandler(): string
    {
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
    private function afterDeuceScoreHandler(): string
    {
        if($this->firstPlayerTimesScored == ($this->secondPlayerTimesScored + 1))
        {
            return "Advantage " . $this->firstPlayerName;
        }
        if($this->secondPlayerTimesScored == ($this->firstPlayerTimesScored + 1))
        {
            return "Advantage " . $this->secondPlayerName;
        }
        if($this->firstPlayerTimesScored == ($this->secondPlayerTimesScored + 2))
        {
            return "Win " . $this->firstPlayerName;
        }
        if($this->secondPlayerTimesScored == ($this->firstPlayerTimesScored + 2))
        {
            return "Win " . $this->secondPlayerName;
        }
        if($this->firstPlayerTimesScored == $this->secondPlayerTimesScored)
        {
            return "Deuce";
        }
    }

    public function wonPoint(String $playerWhoWonPointName)
    {
        if($playerWhoWonPointName == $this->firstPlayerName)
        {
            $this->firstPlayerTimesScored = $this->firstPlayerTimesScored + 1;
            foreach($this->timesScoredToActualScoreRelation as $timesScored => $actualScore)
            {
                if($this->firstPlayerTimesScored == $timesScored)
                {
                    $this->firstPlayerScore =  $actualScore;
                }
            }
        }
        else if($playerWhoWonPointName == $this->secondPlayerName)
        {

            $this->secondPlayerTimesScored = $this->secondPlayerTimesScored + 1;
            foreach($this->timesScoredToActualScoreRelation as $timesScored => $actualScore)
            {
                if($this->secondPlayerTimesScored == $timesScored)
                {
                    $this->secondPlayerScore =  $actualScore;
                }
            }
        }
        else
        {
            print ("The players name doesn't match to any registered player.");
        }
        if(($this->firstPlayerTimesScored == $this->secondPlayerTimesScored) && ($this->firstPlayerTimesScored > 2))
        {
            $this->hadDeuce = true;
        }
    }

}