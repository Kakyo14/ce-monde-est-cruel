<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class RaydoniaPlayers
 * @package Hackathon\PlayerIA
 * @author Elodie Léger
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


        //find keys for moves never used
        $null = array_keys($opp_stats, 0);

        //new array
        $null_opp_stats = [];

        //remove name and put result in $null_opp_stats
        if (!is_null($null) || !is_null($null[1]) || !is_null($null[2])) {
            array_push($null_opp_stats, $null[1], $null[2]);
        }

        //var_dump($null_opp_stats);
        //create array with null moves if move not null, array contains all elements of $null_opt_stats
        $array_scissors = array_keys($null_opp_stats, 'scissors');
        $array_rock = array_keys($null_opp_stats, 'rock');
        $array_paper = array_keys($null_opp_stats, 'paper');

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



        if (!strcmp($last_choice ,'rock')) {
            if (strcmp($last_opp_choice,'scissor')) {
                return parent::scissorsChoice();
            }
            return parent::paperChoice();
        }
        elseif (!strcmp($last_choice,'paper')){
            if (strcmp($last_opp_choice,'rock')) {
                return parent::rockChoice();
            }
            return parent::scissorsChoice();
        }
        elseif (!strcmp($last_choice,'scissor')){
            if (strcmp($last_opp_choice,'paper')) {
                return parent::paperChoice();
            }
            return parent::rockChoice();
        }

        //$this->prettyDisplay();

        return parent::paperChoice();

    }
};
