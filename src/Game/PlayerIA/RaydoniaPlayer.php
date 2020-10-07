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

        if (!strcmp($last_opp_choice,'rock')) {
            return parent::paperChoice();
        }
        elseif (!strcmp($last_opp_choice,'paper')){
            return parent::scissorsChoice();
        }
        else{
            return parent::rockChoice();
        }
        //var_dump($all_choices);

    }
};
