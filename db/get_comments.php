<?php
// get_comments.php

// params
//    event_id



error_reporting(0);   // stupid warnings from coughphp
require_once 'db_config.php';

$event_id = $_REQUEST['event_id'];
if (!$event_id) {
   // error? nah.
    return;
}

$output = array();
$comments = new Comments_Collection();
$sql = 'SELECT * FROM comments WHERE event_id = "' . $event_id . '"';
$comments->loadBySql($sql);

//show_and_quit($comments);

foreach ($comments as $c) {
    $newc = array();
    $newc['id'] = $c->getId();
    $newc['timestamp'] = $c->getTimestamp();
    $newc['author'] = $c->getAuthor();
    $newc['external_system_user'] = $c->getExternalSystemUser();
    $newc['comment_body'] = $c->getCommentBody();
    
    $output[] = $newc;
}

spit_out_json_and_quit($output);



?>