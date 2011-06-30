<?php

//// FOR TESTING PURPOSES...
$istest = $_REQUEST['test'];
if (isset($istest)) {
    header('Content-type: application/json');
    header("Cache-Control: no-cache, must-revalidate"); 
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    readfile('test.json');
    exit();
}




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
?>