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
        //var_dump($stats);
        //var_dump($my_stats);

        $null_opp_stats = array_keys($opp_stats, 0);
        $null_opp_stats = array($null_opp_stats[1], $null_opp_stats[2]);
        //var_dump($null_opp_stats);
        $array_scissors = array_keys($null_opp_stats, 'scissors');
        $array_rock = array_keys($null_opp_stats, 'rock');
        $array_paper = array_keys($null_opp_stats, 'paper');
        //echo 'array_scissors';
        //var_dump($array_scissors);
        if ((!strcmp($last_opp_choice,'rock')) && (sizeof($array_scissors) != sizeof($null_opp_stats))) {
            return parent::paperChoice();
        }
        elseif (!strcmp($last_opp_choice,'paper') && (sizeof($array_rock) != sizeof($null_opp_stats))){
            return parent::scissorsChoice();
        }
        elseif (!strcmp($last_opp_choice,'scissor') && (sizeof($array_paper) != sizeof($null_opp_stats))){
            return parent::rockChoice();
        }

        if (!strcmp($last_opp_choice,'rock')) {
            return parent::rockChoice();
        }
        elseif (!strcmp($last_opp_choice,'paper')){
            return parent::paperChoice();
        }
        elseif (!strcmp($last_opp_choice,'scissor')){
            return parent::scissorsChoice();
        }

        //var_dump($all_choices);


        return parent::paperChoice();

    }
};
