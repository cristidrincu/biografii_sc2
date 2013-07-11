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

    public function players(){
        $dataPlayerKeywords['data_keywords']=$this->getDefaultKeywords();

        //load the model that extracts the latest 6 players inserted in the database
        $dataLatestPlayers['data_latest_players']=$this->m_all_entities->getLatestPlayersRO();

        //check to see if it returns any results
        if(count($dataLatestPlayers['data_latest_players'])==0){
            $this->load->view('header', $dataPlayerKeywords);
            $this->load->view('no_database_results_ro');
            $this->load->view('footer');
        }else{
            $this->load->view('header', $dataPlayerKeywords);
            $this->load->view('jucatori_ro', $dataLatestPlayers);
            $this->load->view('footer');
        }
    }
}