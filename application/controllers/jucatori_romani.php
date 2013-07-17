<?php
/**
 * Created by IntelliJ IDEA.
 * User: cristiandrincu
 * Date: 7/8/13
 * Time: 2:51 PM
 * To change this template use File | Settings | File Templates.
 */

class Jucatori_Romani extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('m_all_entities');

        $this->dataDefaultKeywords[]='Starcraft 2, Starcraft2, Blizzard, jucatori pro, biografii, coreea, europa, statele unite, castiguri, titluri, clipuri video, echipe profesionale, evil geniuses, team liquid, alliance, acer, alternate, axiom, azubu, cjentus, complexity gaming, fnatic, fxopen, incredible miracle, mvp, prime, team 8, samsung khan, root gaming, sk gaming, sk telecom t1, startale, stx soul, team empire, team liquid, woongjin stars';
    }

    public function getDefaultKeywords(){
        return $this->dataDefaultKeywords;
    }

    public function getEntityKeywords(){
        return $this->dataEntityKeywords;
    }

    //$keywords parameter must be an array
    public function setEntityKeywords($keywords){
        $this->dataEntityKeywords=$keywords;
    }

    public function injectKeywords(){
        $dataPlayerKeywords['data_keywords']=$this->getDefaultKeywords();
        return $dataPlayerKeywords;
    }

    public function loadResultsPage($number_of_players, $player_details){
        //default views that are loaded
        $this->load->view('header', $this->injectKeywords());

        if($number_of_players>0){
            $this->load->view('jucatori_ro', $player_details);
        }else{
            $this->load->view('no_database_results_ro');
        }

        //default views that are loaded
        $this->load->view('footer');
    }

    public function players(){
        //load the model that extracts the latest 6 players inserted in the database
        $dataLatestPlayers['data_latest_players']=$this->m_all_entities->getLatestPlayersRO();
        $number_of_players= count($dataLatestPlayers['data_latest_players']);
        $this->loadResultsPage($number_of_players,$dataLatestPlayers);
    }
}