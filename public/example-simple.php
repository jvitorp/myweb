<?php

// include


// namespace
use Rain\Tpl;

// config
$config = array(
    "tpl_dir"       => __DIR__ . "/../app/Views/",
    "cache_dir"     => __DIR__."/../app/cache/",
    "debug"         => true, // set to false to improve the speed
);

Tpl::configure( $config );


// Add PathReplace plugin (necessary to load the CSS with path replace)



// create the Tpl2 object
$tpl = new Tpl;

// assign a variable
$tpl->assign( "name", "Obi Wan Kenoby" );
$tpl->assign( "test", "testqwe" );

// assign an array
$tpl->assign( "week", array( "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ) );

// draw the template
$tpl->draw( "simple_template" );


?>
