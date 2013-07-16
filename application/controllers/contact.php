<?php
/**
 * Created by IntelliJ IDEA.
 * User: cristiandrincu
 * Date: 7/15/13
 * Time: 10:56 AM
 * To change this template use File | Settings | File Templates.
 */

class Contact extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->library('email');
        $this->dataDefaultKeywords[]='Starcraft 2, Starcraft2, Blizzard, jucatori pro, biografii, coreea, europa, statele unite, castiguri, titluri, clipuri video, echipe profesionale, evil geniuses, team liquid, alliance, acer, alternate, axiom, azubu, cjentus, complexity gaming, fnatic, fxopen, incredible miracle, mvp, prime, team 8, samsung khan, root gaming, sk gaming, sk telecom t1, startale, stx soul, team empire, team liquid, woongjin stars';
    }

    //getters and setters
    public function getDefaultKeywords(){
        return $this->dataDefaultKeywords;
    }

    public function populateKeywords_LoadViews($page_type){
        $dataPlayerKeywords['data_keywords']=$this->getDefaultKeywords();
        $this->load->view('header', $dataPlayerKeywords);

        switch($page_type){
            case 'default_page':
                $this->load->view('contact_view');
            break;
            case 'success_page':
                $this->load->view('contact_view_success');
            break;
            case 'error_page':
                $this->load->view('contact_view_failure');
            break;
        }

        $this->load->view('footer');
    }

    public function index(){
        $this->populateKeywords_LoadViews('default_page');
    }

    public function success_page(){
       $this->populateKeywords_LoadViews('success_page');
    }

    public function error_page(){
        $this->populateKeywords_LoadViews('error_page');
    }

    public function send_email(){
        $this->email->from($this->input->post('email'));
        $this->email->to('cristidrincu@gmail.com');
        $this->email->subject($this->input->post('subject'));
        $this->email->message($this->input->post('message_sender'));

        if(!empty($_POST['honey_trap_bots'])){
            redirect('index.php/contact/error_page');
        }

        if($this->email->send()){
            redirect('index.php/contact/success_page');
        }else{
            redirect('index.php/contact/error_page');
        }
    }
}