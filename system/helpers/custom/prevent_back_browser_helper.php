<?php

function preventUserBackButtonBrowser(){
    $ci=&get_instance();

    //headers for preventing the user to use the back button after logout
    $ci->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $ci->output->set_header("Pragma: no-cache");
}