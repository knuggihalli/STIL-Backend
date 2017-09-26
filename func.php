<?php
function imageSearch($stuff){
$url = "https://api.gettyimages.com/v3/search/images?fields=id,title,thumb,referral_destinations&sort_order=best&phrase=".$stuff;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$resp = curl_exec($ch);
curl_close($ch); 
return $resp;
} 


function get_Feed(){
$url = "https://news.google.com/news?cf=all&hl=en&pz=1&ned=us&output=rss";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$resp = curl_exec($ch);
curl_close($ch); 
$xml = simplexml_load_string($resp);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
return $array;
} 

function get_World(){
$url = "https://news.google.com/news?cf=all&hl=en&pz=1&ned=us&topic=w&output=rss";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$resp = curl_exec($ch);
curl_close($ch); 
$xml = simplexml_load_string($resp);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
return $array;
} 

function get_US(){
$url = "https://news.google.com/news?cf=all&hl=en&pz=1&ned=us&topic=n&output=rss";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$resp = curl_exec($ch);
curl_close($ch); 
$xml = simplexml_load_string($resp);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
return $array;
} 

function get_Elect(){
$url = "https://news.google.com/news?cf=all&hl=en&pz=1&ned=us&topic=el&output=rss";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$resp = curl_exec($ch);
curl_close($ch); 
$xml = simplexml_load_string($resp);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
return $array;
} 

function get_Business(){
$url = "https://news.google.com/news?cf=all&hl=en&pz=1&ned=us&topic=b&output=rss";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$resp = curl_exec($ch);
curl_close($ch); 
$xml = simplexml_load_string($resp);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
return $array;
} 

function get_Technology(){
$url = "https://news.google.com/news?cf=all&hl=en&pz=1&ned=us&topic=tc&output=rss";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$resp = curl_exec($ch);
curl_close($ch); 
$xml = simplexml_load_string($resp);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
return $array;
} 

function get_Entertainment(){
$url = "https://news.google.com/news?cf=all&hl=en&pz=1&ned=us&topic=e&output=rss";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$resp = curl_exec($ch);
curl_close($ch); 
$xml = simplexml_load_string($resp);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
return $array;
} 

function get_Sports(){
$url = "https://news.google.com/news?cf=all&hl=en&pz=1&ned=us&topic=s&output=rss";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$resp = curl_exec($ch);
curl_close($ch); 
$xml = simplexml_load_string($resp);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
return $array;
} 

function get_Science(){
$url = "https://news.google.com/news?cf=all&hl=en&pz=1&ned=us&topic=snc&output=rss";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$resp = curl_exec($ch);
curl_close($ch); 
$xml = simplexml_load_string($resp);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
return $array;
}

function get_Health(){
$url = "https://news.google.com/news?cf=all&hl=en&pz=1&ned=us&topic=m&output=rss";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$resp = curl_exec($ch);
curl_close($ch); 
$xml = simplexml_load_string($resp);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
return $array;
}

function getImage($data){
$start = strpos($data, '<img src="');
$end = strpos($data, '<br>', $start);
$length = $end-$start;
$output = substr($data, $start, $length);
return $output;
}

function getSource($data){
$start = strpos($data, '<font color="#6f6f6f">');
$end = strpos($data, '</font>', $start);
$length = $end-$start;
$output = substr($data, $start, $length);
    $output = strip_tags($output);
return $output;
}

function getSummary($data){
$source = strip_tags(getSource($data));;
$start = strpos($data, '<font size="-1">');
$end = strpos($data, '...', $start);
$length = $end-$start;
$output = substr($data, $start, $length);
$output = strip_tags($output);
$output = str_replace($source,"",$output);
return $output;
}


?> 