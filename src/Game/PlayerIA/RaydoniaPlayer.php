<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class RaydoniaPlayers
 * @package Hackathon\PlayerIA
 * @author YOUR NAME HERE
 */
class RaydoniaPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {

        $last_choice = $this->result->getLastChoiceFor($this->mySide);
        $last_opp_choice = $this->result->getLastChoiceFor($this->opponentSide);

        $last_score = $this->result->getLastScoreFor($this->mySide);
        $last_opp_score = $this->result->getLastScoreFor($this->opponentSide);

        $all_choices = $this->result->getChoicesFor($this->mySide);
        $opp_last_choice = $this->result->getChoicesFor($this->opponentSide);

        $my_last_score = $this->result->getLastScoreFor($this->mySide);
        $opp_last_score = $this->result->getLastScoreFor($this->opponentSide);

        $stats = $this->result->getStats();
        $my_stats = $this->result->getStatsFor($this->mySide);
        $opp_stats = $this->result->getStatsFor($this->opponentSide);

        $number_of_rounds = $this->result->getNbRound();

        //$this->prettyDisplay();
        //var_dump($opp_stats);
        var_dump($stats);
        //var_dump($my_stats);

        var_dump($last_opp_score);



        $null_opp_stats = array_keys($opp_stats, 0);
        $null_opp_stats = array($null_opp_stats[1], $null_opp_stats[2]);
        //var_dump($null_opp_stats);
        $array_scissors = array_keys($null_opp_stats, 'scissors');
        $array_rock = array_keys($null_opp_stats, 'rock');
        $array_paper = array_keys($null_opp_stats, 'paper');
        //echo 'array_scissors';
        //var_dump($array_scissors);
        if ((!strcmp($last_opp_choice,'rock')) && count($array_scissors) == 1) {
            return parent::paperChoice();
        }
        elseif (!strcmp($last_opp_choice,'paper') && count($array_rock) == 1){
            return parent::scissorsChoice();
        }
        elseif (!strcmp($last_opp_choice,'scissor') && count($array_paper) == 1){
            return parent::rockChoice();
        }

        if (!strcmp($last_opp_choice,'rock') && $opp_last_score != 0) {
            return parent::rockChoice();
        }
        elseif (!strcmp($last_opp_choice,'paper') && $opp_last_score != 0){
            return parent::paperChoice();
        }
        elseif (!strcmp($last_opp_choice,'scissor') && $opp_last_score != 0){
            return parent::scissorsChoice();
        }

        //var_dump($all_choices);

        if (!strcmp($last_opp_choice,'rock')) {
            return parent::paperChoice();
        }
        elseif (!strcmp($last_opp_choice,'paper')){
            return parent::scissorsChoice();
        }
        elseif (!strcmp($last_opp_choice,'scissor')){
            return parent::rockChoice();
        }

        return parent::paperChoice();

    }
};
