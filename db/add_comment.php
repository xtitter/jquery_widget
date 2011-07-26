<?php
// add_comment.php
//  parameters:
//    body (comment body)
//    auth (author)
//    eid  (id of event)
//    esu  (username of external system (linkedin))


$errs = array(
   'no_body' => "Your comment was empty.",
   'no_auth' => "The author name was left empty",
   'no_event_id' => "An internal error has occurred: 3",
   'cough_prob' => "An internal error has occurred: 1",

);


error_reporting(0);   // stupid warnings from coughphp
require_once 'db_config.php';


// TODO -- some sort of authorization?


$comment_body=$_REQUEST['body'];
$author=$_REQUEST['auth'];
$event_id=$_REQUEST['eid'];
$external_system_user=$_REQUEST['esu'];

if (empty($comment_body)) {
    report_failure($errs['no_body']);
} elseif (empty($author)) {
    report_failure($errs['no_auth']);
} elseif (empty($event_id)) {
    report_failure($errs['no_event_id']);
}


$newc = new Comments();
$newc->setAuthor($author);
$newc->setCommentBody($comment_body);
$newc->setEventId($event_id);
$newc->setExternalSystemUser($external_system_user);

$success = ($newc->save());

if (!$success) {
    report_failure($errs['cough_prob']);
} else {
    $id = $newc->getId();
    report_success($id);
}



?>