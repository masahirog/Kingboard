<?php
$router = King23_Router::getInstance();
$router->setBaseHost(King23_Registry::getInstance()->baseHost);

// home
$router->addRoute("/", "Kingboard_Homepage_View", "index", array());
$router->addRoute("/home/page/", "Kingboard_Homepage_View", "index", array('page', 'ajax'));
$router->addRoute("/home/view/", "Kingboard_Homepage_View", "index", array('view'));

// information
$router->addRoute("/information", "Kingboard_Information_View", "index");

// eve information
$router->addRoute("/eveinfo/", "Kingboard_EveInfo_View", "eveItem", array('itemid'));

// pilot details
$router->addRoute("/pilot/", "Kingboard_Homepage_View", "pilot", array('hid', "view"));
$router->addRoute("/character/", "Kingboard_Homepage_View", "pilot", array('hid', "view"));
$router->addRoute("/pilot/name/", "Kingboard_Search_View", "namePilot", array('pilotname'));

// corporation details
$router->addRoute("/corporation/", "Kingboard_Homepage_View", "corporation", array("hid", "view"));
$router->addRoute('/corporation/name/', "Kingboard_Search_View", "nameCorporation", array("corpname"));

// alliance details
$router->addRoute("/alliance/", "Kingboard_Homepage_View", "alliance", array("hid", "view"));
$router->addRoute('/alliance/name/', "Kingboard_Search_View", "nameAlliance", array("alliancename"));

// faction details
$router->addRoute("/faction/", "Kingboard_Homepage_View", "faction", array("hid", "view"));
$router->addRoute('/faction/name/', "Kingboard_Search_View", "nameFaction", array("factionname"));

// kill details
$router->addRoute("/kill/", "Kingboard_Kill_View", 'index', array('killID'));



// authentication related routes
if(!is_null($reg->auth) && $reg->auth)
    $auth = $reg->auth;
else
    $auth = "Kingboard_Auth_View";

// registration
$router->addRoute("/user/registration", $auth, 'registerForm');
$router->addRoute("/user/activate/", $auth, 'activateUser',array('activationkey'));

// authentication
$router->addRoute("/login", $auth, "login");
$router->addRoute("/logout", $auth, "logout");

// oAuthentication
$router->addRoute("/oauth2/callback/", "Kingboard_Auth_OAuth2_View", "callback", array("key"));

// user specific routes
$router->addRoute("/account/", "Kingboard_User_View", "myKingboard");

// autcompleters
$router->addRoute("/autocomplete/solarsystem", "Kingboard_AutoCompleter_View", 'solarSystem');
$router->addRoute("/autocomplete/region", "Kingboard_AutoCompleter_View", 'region');

// battles
$router->addRoute("/battle/new", "Kingboard_BattleEditor_View", "create");
$router->addRoute("/battle/", "Kingboard_Battle_View", "show", array("id"));

// Post
$router->addRoute("/post/", "Kingboard_Post_View", "post");

// search
$router->addRoute("/search/", "Kingboard_Search_View", "index");