<?php
$file = "eartextedata.js";
if (file_exists($file)) {
    $lastUpdate= "Data refreshed every 30 days.  Showing data from: " . date ("F d Y H:i:s.", filemtime($file));
}
echo ($lastUpdate);
?>