<?php
$originalString = "010-3386-1510";
$characterToRemove = "-";
$modifiedString = str_replace($characterToRemove, "", $originalString);
echo $modifiedString;
