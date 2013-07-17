<?php

class Main extends CI_Controller{

    public $dataDefaultKeywords=array();
    public $dataEntityKeywords=array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_all_entities');

		define('IMG_URL', base_url().'uploads/');
		define('IMG_URL_PLAYER', base_url().'uploads/players/');
        define('IMG_URL_PLAYER_ROMAN', base_url().'uploads/players/romani/');

        $this->dataDefaultKeywords[]='Starcraft 2, Starcraft2, Blizzard, jucatori pro, biografii, coreea, europa, statele unite, castiguri, titluri, clipuri video, echipe profesionale, evil geniuses, team liquid, alliance, acer, alternate, axiom, azubu, cjentus, complexity gaming, fnatic, fxopen, incredible miracle, mvp, prime, team 8, samsung khan, root gaming, sk gaming, sk telecom t1, startale, stx soul, team empire, team liquid, woongjin stars';
	}

    public function getDefaultKeywords(){
        return $this->dataDefaultKeywords;
    }

    //$keywords parameter must be an array
    public function setEntityKeywords($keywords){
        $this->dataEntityKeywords=$keywords;
    }

    public function getEntityKeywords(){
        return $this->dataEntityKeywords;
    }

    public function injectKeywordsDefault(){
        $dataPlayerKeywords['data_keywords']=$this->getDefaultKeywords();
        return $dataPlayerKeywords;
    }

    public function injectKeywordsCustom($custom_keywords){
        $dataPlayerKeywords['data_keywords']=array_merge($this->getDefaultKeywords(), $custom_keywords);
        return $dataPlayerKeywords;
    }

    public function loadResultsPageDefault($number_of_players, $player_details){
        //default view
        $this->load->view('header', $this->injectKeywordsDefault());

        if($number_of_players>0){
           $this->load->view('jucatori', $player_details);
        }else{
            $this->load->view('no_database_results');
        }
        //default view
        $this->load->view('footer');
    }

    //DESCRIPTION - this method will be used to decide if the no_database_results view will be loaded or the views containing player's details
    //DETAILS - $number_of_players parameter will be provided by the model m_all_entities' method count_results($table_name, $race)
    //USAGE - used inside loadResultsPageEntityInternational() method
    //NOTES - METHOD used for INTERNATIONAL PLAYERS
    public function checkNumberOfInternationalPlayers($number_of_players){
        $result = null;
        if($number_of_players>0){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    //DESCRIPTION - this method will be used to decide if the no_database_results_ro view will be loaded or the views containing player's details
    //DETAILS - $number_of_players parameter will be provided by the model m_all_entities' method count_results($table_name, $race)
    //USAGE - used inside loadResultsPageEntityRomania() method
    //NOTES - METHOD used for ROMANIAN PLAYERS
    public function checkNumberOfRomanianPlayers($number_of_players){
        $result=null;
        if($number_of_players>0){
            $result = true;
        }else{
            $result=false;
        }
        return $result;
    }

    public function loadResultsPageEntityInternational($entity_type, $number_of_players, $player_details, $custom_keywords){

        $this->load->view('header', $this->injectKeywordsCustom($custom_keywords));
        $numberOfInternationalPlayers=$this->checkNumberOfInternationalPlayers($number_of_players);

    switch($entity_type){
        case "terran":
            if($numberOfInternationalPlayers){
                $this->load->view('terran_jucatori', $player_details);
            }else if(!$numberOfInternationalPlayers){
                $this->load->view('no_database_results');
            }
            break;
        case "zerg":
            if($numberOfInternationalPlayers){
                $this->load->view('zerg_jucatori', $player_details);
            }else if(!$numberOfInternationalPlayers){
                $this->load->view('no_database_results');
            }
            break;
        case "protoss":
            if($numberOfInternationalPlayers){
                $this->load->view('protoss_jucatori', $player_details);
            }else if(!$numberOfInternationalPlayers){
                $this->load->view('no_database_results');
            }
            break;
    }
}

    public function loadResultsPageEntityRomania($entity_type, $number_of_players, $player_details, $custom_keywords){

        //load the header.php by default
        $this->load->view('header', $this->injectKeywordsCustom($custom_keywords));

        //check to see if there are any players in the database
        $numberOfRomanianPlayers=$this->checkNumberOfRomanianPlayers($number_of_players);

        switch($entity_type){
            case "terran":
                if($numberOfRomanianPlayers){
                    $this->load->view('terran_jucatori_ro', $player_details);
                }else if(!$numberOfRomanianPlayers){
                    $this->load->view('no_database_results_ro');
                }
            break;
            case "zerg":
                if($numberOfRomanianPlayers){
                    $this->load->view('zerg_jucatori_ro', $player_details);
                }else if(!$numberOfRomanianPlayers){
                    $this->load->view('no_database_results_ro');
                }
            break;
            case "protoss":
                if($numberOfRomanianPlayers){
                    $this->load->view('protoss_jucatori_ro', $player_details);
                }else if(!$numberOfRomanianPlayers){
                    $this->load->view('no_database_results_ro');
                }
                break;
        }
    }

    public function getInternationalPlayerData($entity_type){
        $entity_data[]=null;

        switch($entity_type){
            case 'terran':
               $entity_data['display_results']=1;
               $entity_data['results_all_terrans']=$this->m_all_entities->getAllPlayers('Terran');
            break;
            case 'zerg':
               $entity_data['display_results']=1;
               $entity_data['results_all_zergs']=$this->m_all_entities->getAllPlayers('Zerg');
            break;
            case 'protoss':
               $entity_data['display_results']=1;
               $entity_data['results_all_protoss']=$this->m_all_entities->getAllPlayers('Protoss');
            break;
        }
        return $entity_data;
    }

    public function getRomanianPlayerData($entity_type){
        $entity_data[]=null;

        switch($entity_type){
            case 'terran':
                //load the model for terran retrieval operations
                $entity_data['display_results']=1;
                $entity_data['results_all_terrans']=$this->m_all_entities->getAllPlayersRO('Terran');
            break;
            case 'zerg':
                //load the model for terran retrieval operations
                $entity_data['display_results']=1;
                $entity_data['results_all_zergs']=$this->m_all_entities->getAllPlayersRO('Zerg');
            break;
            case 'protoss':
                //load the model for terran retrieval operations
                $entity_data['display_results']=1;
                $entity_data['results_all_protoss']=$this->m_all_entities->getAllPlayersRO('Protoss');
            break;
        }

        return $entity_data;
    }

	public function index(){
		$this->load->view('header', $this->injectKeywordsDefault());
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function players(){
		//load the model that extracts the latest 6 players inserted in the database
		$dataLatestPlayers['data_latest_players']=$this->m_all_entities->getLatestPlayers();

		//check to see if it returns any results
        $number_of_players=count($dataLatestPlayers['data_latest_players']);
		$this->loadResultsPageDefault($number_of_players, $dataLatestPlayers);
	}

	public function terran_players(){

        $entity_data=$this->getInternationalPlayerData('terran');

        $number_of_players=$this->m_all_entities->countResults('PLAYER','Terran');

        //set keywords for jucatori.php page
        $this->setEntityKeywords(array('demuslim, flash, kas, lucifron, mma, mvp, ryung, thorzain'));
        $dataCustomKeywords['data_keywords']= $this->getEntityKeywords();

        $this->loadResultsPageEntityInternational('terran', $number_of_players, $entity_data, $dataCustomKeywords['data_keywords']);
	}

    public function terran_players_ro(){

        $entity_data=$this->getRomanianPlayerData('terran');
        $number_of_players=$this->m_all_entities->countResults('PLAYER_ROMAN','Terran');

        //set keywords for jucatori.php page
        $this->setEntityKeywords(array('romania'));
        $dataCustomKeywords['data_keywords']=$this->getEntityKeywords();

        $this->loadResultsPageEntityRomania('terran', $number_of_players, $entity_data, $dataCustomKeywords['data_keywords']);
    }

	public function zerg_players(){

        $entity_data=$this->getInternationalPlayerData('zerg');

        //set keywords for zerg_players.php page
        $this->setEntityKeywords(array('zerg, hots, leenock, tlo, zenio'));
        $dataPlayerKeywords['data_keywords']=array_merge($this->getDefaultKeywords(), $this->getEntityKeywords());

		$number_of_players=$this->m_all_entities->countResults('PLAYER', 'Zerg');

        $this->loadResultsPageEntityInternational('zerg', $number_of_players, $entity_data, $dataPlayerKeywords['data_keywords']);
		
	}

    public function zerg_players_ro(){

        $entity_data=$this->getRomanianPlayerData('zerg');

        //set keywords for zerg_players.php page
        $this->setEntityKeywords(array('zerg, hots, deathangel, darkthorn'));
        $dataPlayerKeywords['data_keywords']=array_merge($this->getDefaultKeywords(), $this->getEntityKeywords());

        $number_of_players=$this->m_all_entities->countResults('PLAYER_ROMAN','Zerg');

        $this->loadResultsPageEntityRomania('zerg', $number_of_players, $entity_data, $dataPlayerKeywords['data_keywords']);

    }

	public function protoss_players(){

        $entity_data=$this->getInternationalPlayerData('protoss');

        //set keywords for protoss_players.php page
        $this->setEntityKeywords(array('protoss, hots, hero, huk, mc, naniwa, nightend, parting, rain, socke'));
        $dataPlayerKeywords['data_keywords']=array_merge($this->getDefaultKeywords(), $this->getEntityKeywords());

        $number_of_players = $this->m_all_entities->countResults('PLAYER','Protoss');

        $this->loadResultsPageEntityInternational('protoss',$number_of_players, $entity_data, $dataPlayerKeywords['data_keywords']);
	}

    public function protoss_players_ro(){
       $entity_data=$this->getRomanianPlayerData('protoss');

        //set keywords for protoss_players.php page
        $this->setEntityKeywords(array('nightend'));
        $dataPlayerKeywords['data_keywords']=array_merge($this->getDefaultKeywords(), $this->getEntityKeywords());

        $number_of_players = $this->m_all_entities->countResults('PLAYER_ROMAN','Protoss');

        $this->loadResultsPageEntityRomania('protoss', $number_of_players, $entity_data, $dataPlayerKeywords['data_keywords']);
    }

	//get a specific player and send it to the view based on his/her race and nickname
	public function getPlayerDetails($player_id, $nickname){

		$dataPlayer['data_player']=$this->m_all_entities->getPlayer($nickname);
		$dataPlayer['data_titles']=$this->m_all_entities->getPlayerTitles($player_id);
		$dataPlayer['data_videos']=$this->m_all_entities->getPlayerVideos($player_id);

        $this->setEntityKeywords($this->m_all_entities->getPlayerKeywords($player_id));

        $dataPlayerKeywords['data_keywords']=array_merge($this->getDefaultKeywords(), $this->getEntityKeywords());

		$this->load->view('header', $dataPlayerKeywords);
		$this->load->view('player_full_details', $dataPlayer);
		$this->load->view('footer');
	}

    public function getPlayerDetailsRO($player_id, $nickname){

        $dataPlayer['data_player']=$this->m_all_entities->getPlayerRO($nickname);
        $dataPlayer['data_titles']=$this->m_all_entities->getPlayerTitlesRO($player_id);
        $dataPlayer['data_videos']=$this->m_all_entities->getPlayerVideosRO($player_id);

        $this->setEntityKeywords($this->m_all_entities->getPlayerKeywordsRO($player_id));

        $dataPlayerKeywords['data_keywords']=array_merge($this->getDefaultKeywords(), $this->getEntityKeywords());

        //print_r($dataPlayer);

        $this->load->view('header', $dataPlayerKeywords);
        $this->load->view('player_full_details_ro', $dataPlayer);
        $this->load->view('footer');
    }


	public function teams(){
        //set keywords for echipe.php page
        $this->setEntityKeywords(array('protoss, terran, zerg, hots, hero, huk, mc, naniwa, nightend, parting, rain, socke, demuslim, kas, flash, thorzain, mvp, mma, ryung, lucifron, tlo, zenio, leenock'));
        $dataPlayerKeywords['data_keywords']=array_merge($this->getDefaultKeywords(), $this->getEntityKeywords());

		$dataTeams['data_teams']=$this->m_all_entities->getAllTeams();

		$this->load->view('header', $dataPlayerKeywords);
		$this->load->view('echipe', $dataTeams);
		$this->load->view('footer');
	}

	//controller used in detalii_echipa.php
	public function getTeamDetails($ID){
        //set keywords for detalii_echipa.php page
        $this->setEntityKeywords(array('protoss, terran, zerg, hots, hero, huk, mc, naniwa, nightend, parting, rain, socke, demuslim, kas, flash, thorzain, mvp, mma, ryung, lucifron, tlo, zenio, leenock'));
        $dataPlayerKeywords['data_keywords']=array_merge($this->getDefaultKeywords(), $this->getEntityKeywords());

		//load the model method that gets all players associated with this team
		$dataPlayersTeamDetail['data_team']=$this->m_all_entities->getPlayersDetailsTeam($ID);
		//load the model method that gets details, such as the description of the team from the database
		$dataPlayersTeamDetail['data_certain_team']=$this->m_all_entities->getTeamDetails($ID);

		$this->load->view('header', $dataPlayerKeywords);
		$this->load->view('detalii_echipa', $dataPlayersTeamDetail);
		$this->load->view('footer');
	}

    public function find_player($letter, $race){
         $data['display_results']=2;
         $data['player_details_letter']=$this->m_all_entities->findPlayerFirstLetter($letter, $race);
         $dataKeywords['data_keywords']=$this->getDefaultKeywords();

        switch($race){
            case "Terran":
                $this->load->view('header', $dataKeywords);
                $this->load->view('terran_jucatori', $data);
                $this->load->view('footer');
            break;
            case "Zerg":
                $this->load->view('header', $dataKeywords);
                $this->load->view('zerg_jucatori', $data);
                $this->load->view('footer');
            break;
            case "Protoss":
                $this->load->view('header', $dataKeywords);
                $this->load->view('protoss_jucatori', $data);
                $this->load->view('footer');
            break;
        }

    }

    public function find_player_RO($letter, $race){
        $data['display_results']=2;
        $data['player_details_letter']=$this->m_all_entities->findPlayerFirstLetterRO($letter, $race);
        $dataKeywords['data_keywords']=$this->getDefaultKeywords();

        switch($race){
            case "Terran":
                $this->load->view('header', $dataKeywords);
                $this->load->view('terran_jucatori_ro', $data);
                $this->load->view('footer');
                break;
            case "Zerg":
                $this->load->view('header', $dataKeywords);
                $this->load->view('zerg_jucatori_ro', $data);
                $this->load->view('footer');
                break;
            case "Protoss":
                $this->load->view('header', $dataKeywords);
                $this->load->view('protoss_jucatori_ro', $data);
                $this->load->view('footer');
                break;
        }

    }
}	