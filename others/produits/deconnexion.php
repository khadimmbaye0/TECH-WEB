<?php
session_start();
session_destroy();
header('Location: ../form/formulaire.php');
?>