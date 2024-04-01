<?php
include ("Connexion_bdd");
session_start();
session_destroy();
header("location:Homepage.html");
exit;
?>