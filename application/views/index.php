<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Starcraft2 Vidcasts - Biografii Jucatori</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link href='http://fonts.googleapis.com/css?family=Oxygen:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    </head>
    <body>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/dropDownMenusSimple.js"></script>
        
        <div id="mainContentContainer">
            <div id="backgroundMainMenu">
                <div class="row-fluid">
                <div class="span4">
                    <div id="containerLogo">
                       <!--<a href="index.php" target="_self"><img src="imgs/logo_smaller.png" alt="Starcraft2 Vidcasts"/></a>-->
                       <div id="logoTitles">
                           <h4 class="miniTitleStarcraft2">Arhiva Starcraft2</h4>
                           <h5 class="miniSubtitleVGN">Un proiect VGN &amp; Starcraft2-Vidcasts România</h5>
                       </div><!--ends logoTitles-->
                       <br class="clearFloats"/>
                    </div><!--ends containerLogo-->
                </div><!--ends span4-->
                <div class="span8">
                    <div id="mainMenuContainer">
                        <ul class="mainMenu">
                            <li><a class="activeLink" href="index.php" target="_self">Acasă</a></li>
                            <li>
                                <div class="droppDownMainContainer">
                                    <a id="dropDownTriggerProiect" href="#" target="_self">Despre acest proiect</a>
                                    
                                         <div class="menuContainer">
                                             
                                             <ul class="dropDownList">
                                                 <h1 class="dropDownTitle">Afla cine contribuie la acest proiect si motivatiile lor!</h1>
                                                 <i class="icon-question-sign icon-white"></i>
                                                 <li><a href="#" target="_self">Cine?</a></li>
                                                 <i class="icon-wrench icon-white"></i>
                                                 <li><a href="#" target="_self">Cum?</a></li>
                                                 <i class="icon-heart icon-white"></i>
                                                 <li><a href="#" target="_self">De ce?</a></li>
                                             </ul>
                                         </div><!--ends menuContainer-->
                                    
                                </div>
                            </li>
                            <li><a href="jucatori.php" target="_self">Biografii jucători</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/main/teams" target="_self">Echipe</a></li>
                            <li><a href="#" target="_self">Contact</a></li>
                        </ul>
                    </div><!--ends mainMenuContainer-->
                    <!--ELEMENTS FOR DROPDOWNS-->
                    
                </div><!--ends span8-->
            </div><!--ends row-fluid-->
            </div><!--ends backgroundMainMenu-->
            
            <div id="header">
                <div id="welcomeMessage">
                    <h1 class="mainTextWelcomeMessage">Documentează-te în limba română!</h1>
                    <h3 class="mottoArchive">De prea mult timp noi, cei care jucăm Starcraft2, am fost nevoiți să intrăm pe diferite site-uri străine pentru a citi biografiile jucătorilor noștri preferați. Acest lucru se termină în acest moment!</h3>
                    <h2 class="welcomeToArchive">Bine ai venit în cadrul arhivei!</h2>
                </div>
                
            </div><!--ends header--> 
            
            <!--content home page-->
            <div class="containerHomePageBottom">
                <div class="row">
                <div class="span8">
                    <h2>Cine?</h2>
                    <div class="containerDeveloper">
                        <div class="containerPicDeveloper">
                            <img src="<?php echo base_url(); ?>imgs/lavu_bogdan_pic.jpg" alt="Lavu Bogdan, membru al echipei Starcraft2-Vidcasts Romania"/>
                        </div>
                        <div class="containerTextDeveloper">
                           <h3>Lavu Bogdan</h3>
                           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
                        </div>
                        <br class="clearFloats"/>
                    </div>
                     <div class="containerDeveloper">
                        <div class="containerPicDeveloper">
                            <img src="<?php echo base_url(); ?>imgs/pic_cristian_2.jpg" alt="Lavu Bogdan, membru al echipei Starcraft2-Vidcasts Romania"/>
                        </div>
                        <div class="containerTextDeveloper">
                           <h3>Cristian Sergiu Drincu</h3>
                           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
                        </div>
                        <br class="clearFloats"/>
                    </div>
                </div>
                <div class="span4">
                    <img id="logoSC2VidcastsLarge" src="<?php echo base_url(); ?>imgs/logo.png" alt="Starcraft2 Vidcasts Romania"/>
                </div>
            </div><!--ends row-->
            </div>
            
        </div><!--ends mainContentContainer-->

        <!--footer-->
        <div class="footerContainer">
            <h1>Află mai multe detalii despre acest proiect și Starcraft2 Vidcasts România!</h1>
            <div class="row-fluid">
                <div class="span4 footerContent">
                    <i class="icon-question-sign iconFooter"></i>
                    <h3>Cine?</h3>
                    <br class="clearFloats"/>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nunc enim, eleifend eu tincidunt posuere, consectetur non odio. Aenean eget blandit purus. Quisque quis neque eget quam ultrices pulvinar.</p>
                </div>
                <div class="span4 footerContent">
                    <i class="icon-wrench iconFooter"></i>
                    <h3>Cum?</h3>
                    <br class="clearFloats"/>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nunc enim, eleifend eu tincidunt posuere, consectetur non odio. Aenean eget blandit purus. Quisque quis neque eget quam ultrices pulvinar.</p>
                </div>
                <div class="span4 footerContent">
                    <i class="icon-heart iconFooter"></i>
                    <h3>De ce?</h3>
                    <br class="clearFloats"/>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nunc enim, eleifend eu tincidunt posuere, consectetur non odio. Aenean eget blandit purus. Quisque quis neque eget quam ultrices pulvinar.</p>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12 copyrightContent">
                    <p>Copyright 2013 VGN&amp; Starcraft2-Vidcasts.ro. Mulțumiri lui <strong>Lavu Bogdan</strong> pentru munca depusă în a traduce informațiile prezentate pe acest site! <br/><strong>Built with love using <a href="http://twitter.github.com/bootstrap/index.html" target="_blank">Bootstrap...</a></strong></p>
                </div>
            </div>
            
        </div><!--ends footer div-->
       
    </body>
</html>
