<?php
if (isset($_COOKIE['count'])) {
    $count = $_COOKIE['count']; 
    $count++; 
} else {
    $count = 1; 
}

setcookie('count', $count, time() + 3600); 
echo "El comptador és: " . $count;
?>
