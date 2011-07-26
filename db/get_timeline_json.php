<?php

// SETTINGS
define('USE_ENDDATE', false);
define('MAX_SHORT_TITLE_LENGTH', 30);   // set to null or 0 for no max length





error_reporting(0);   // stupid warnings from coughphp, should be fixed
require_once 'db_config.php';


// Build json file now...
$events = array();
$out1 = array(
   'id'        => 'ISE Timeline',
   'title'     => 'The ISE Timeline: focusing on the history of informal science education',
   'focus_date'   => '2005-07-01 12:00',
   'initial_zoom' => '42',
   'color' => "#82530d",

   'events' => &$events,
);



function get_icon($category_string) {

    $icon_default = 'circle_grey.png';

    $icon_map = array (
      'infrastructure' => 'circle_green.png',
      'media' => 'circle_orange.png',
      'community_program' => 'circle_purple.png',
      'research' => 'circle_yellow.png',
      'exhibit' => 'circle_red.png',
    );

    $cats = explode(",", $category_string, 1);
    $cat =  $cats[0];
    if ($icon = $icon_map[$cat]) {
        return $icon;
    } else {
        return $icon_default;
    }
}



$dbevents = new Event_Collection();
$dbevents->load();

//echo "<h2>Events</h2><pre>";print_r($dbevents);echo "</pre>";
if ($dbevents->isEmpty()) {
    //eh;
}




foreach ($dbevents as $eId => $e) {
    $add = array();

    // timeglider required fields
    $add['id'] = $e->getId();
    $add['title'] = trim($e->getShortTitle());
    $add['resource_title'] = trim($e->getResourceTitle());
    if (empty($add['title'])) {
        // should the resource title be shortened as neccesary?
        $add['title'] = $add['resource_title'];
    }
    // adjust title for length, if necessary
    if (constant('MAX_SHORT_TITLE_LENGTH')) {
        if (strlen($add['title']) > constant('MAX_SHORT_TITLE_LENGTH')) {
            $add['title'] = substr($add['title'], 0, (constant('MAX_SHORT_TITLE_LENGTH') - 3)) . "...";
        }
    }
    
    // dates
    $add['startdate'] = $e->getStartDate();
    if (constant('USE_ENDDATE')) {
        $add['enddate'] = $e->getEndDate();
        if (empty($toadd['enddate'])) {
           $toadd['enddate'] = $toadd['startdate'];
        }
    }
    $add['description'] = $e->getDescription();


    // extra data to store in events
    $add['category'] = $e->getCategory();
    $add['record_type'] = $e->getRecordType();
    $add['contributor'] = $e->getContributor();
    $add['creator'] = $e->getCreator();
    $add['nsf_award_number'] = $e->getNsfAwardNumber();
    $add['pi'] = $e->getPi();
    $add['funding_source'] = $e->getFundingSource();
    $add['uri'] = $e->getUri();
    $add['image'] = $e->getImage();
    $add['geo_coords'] = $e->getGeoCoords();
    $add['access_inclusion'] = $e->getAccessInclusion();
    $add['zipcode'] = $e->getZipcode();
    
    
    // timeglider required fields, but we don't have data on
    $add['icon'] = get_icon($add['category']);
    $add['importance'] = 50;
    $add['low_threshold'] = 1;
    $add['high_threshold'] = 100;
    
    $events[] = $add;
}



// send it out
spit_out_json_and_quit(array($out1));





/*
 * someday? not today.
 *
 // google doc stuff
 function get_json_google_doc($ws) {
 $key = '0AgQq6hOyOaEKdE1vZFF5UmxUUHZHU3R0dG1NWWdsUGc';
 $url = "http://spreadsheets.google.com/feeds/list/$key/$ws/public/values?alt=json";
 $json_str = file_get_contents($url);
 $json = json_decode($json_str, true);
 if (json_last_error() != JSON_ERROR_NONE) {
 trigger_error("Json Error: " + json_last_error() + "<br><br><pre>$json_str</pre>");
 }
 return $json;
 }

 $entities_raw = get_json_google_doc(2);
 $events_raw = get_json_google_doc(1);
 //$funding_source_json = get_json_google_doc(3);

 $main = array(
 "id" => "ISETimelineTest",
 "title" => "ISE Timeline",
 "description" => "This is a description of our beloved ISE Timeline",
 "focus_date" => "1965-02-29 2:00:00",
 "initial_zoom" => "50",
 "color" => "#82530d",
 "size_importance" => true,
 );

 function build_entries($in) {
 static $id = 0;
 $out = array();
 $entries = $in['feed']['entry'];
 foreach($entries as $e) {
 //$content=$e['content']['$t'];
 $one = array();
 $one['id'] = $id++;
 $one['title'] = $e['gsx$resourcetitle'][0];
 $one['description'] = $e['gsx$description'][0];
 if ($one['title'] == '') {
 $one['title'] = $one['description'];
 }
 $one['startdate'] = convert_date($e['gsx$startdate'][0]);
 $one['enddate'] = convert_date($e['gsx$enddate'][0]);
 if ($one['enddate'] == '') {
 $one['enddate'] == $one['startdate'];
 }
 $one['icon'] = 'triangle_green.png';
 $one['low_threshold'] = '1';
 $one['high_threshold'] = '60';
 $one['importance']= rand(30,50);

 array_push($out, $one);
 }
 return $out;
 }


 function convert_date($in) {
 return $in;
 }


 echo "<h2>Events</h2><pre>";print_r(build_entries($events_raw));echo "</pre>";
 echo "<h2>Entities</h2><pre>";print_r($entities_raw);echo "</pre>";
 //echo "<h2>Funding Sources</h2><pre>";print_r($funding_source_json);echo "</pre>";

 * */




?>