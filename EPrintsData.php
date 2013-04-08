<?php
echo('
var timeline_data = {  // save as a global variable
\'dateTimeFormat\': \'iso8601\',
events :');
$file = "eartextedata.js";
$cache_file=$file;

//																	s    m    h    d
if (file_exists($cache_file) && (filemtime($cache_file) > (time() - 60 * 60 * 24 * 30 ))) {
   // Cache file is less than five minutes old. 
   // Don't bother refreshing, just use the file as-is.
} else {
   // Our cache is out-of-date, so load the data from our remote server,
   	$url  = 'http://e-artexte.ca/cgi/search/advanced/export_artexte_JSON.js?screen=Public%3A%3AEPrintSearch&_action_export=1&output=JSON&exp=0%7C1%7C-date%2Fcontributors_name%2Ftitle%7Carchive%7C-%7Cdate%3Adate%3AALL%3AEQ%3A1960-%7Ckw%3Akw%3AANY%3AIN%3Aphotographie+photography%7Ctype_pri%3Atype_pri%3AANY%3AEQ%3Atype_7%7C-%7Ceprint_status%3Aeprint_status%3AALL%3AEQ%3Aarchive%7Cmetadata_visibility%3Ametadata_visibility%3AALL%3AEX%3Ashow&n=';
    $path = 'eartextedata.js';
    $fp = fopen($path, 'w');
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_FILE, $fp);
    $data = curl_exec($ch);
    curl_close($ch);
    fclose($fp);
}



if(file_exists($file) && is_readable($file)){
$fileH = fopen($file,'r');
        while(!feof($fileH)) { 
            $name = fgets($fileH);
            echo($name);
        }
        fclose($fileH);
}
else{
echo('error loading data file');
}
echo('}');
?>