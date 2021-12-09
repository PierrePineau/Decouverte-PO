<?php


require 'class/default.php';
if (session_status() != 2) {
    session_start();
} 



if (isset($_GET['personnage']) && isset($_SESSION['personnages'][$_GET['personnage']])) {
    if (isset($_GET['eat'])) {
        // unserialize($_SESSION['personnages'][$_GET['personnage']]);
        $_SESSION['personnages'][$_GET['personnage']]->eat($_GET['eat']);
        // serialize($_SESSION['personnages'][$_GET['personnage']]);

    }   


}

echo "<pre>";
var_dump($_SESSION);
echo "</pre>";

?>
