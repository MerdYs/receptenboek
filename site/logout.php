<?php
session_start();

// Vernietig de sessie
session_destroy();

// Stuur de gebruiker door naar de loginpagina
header("location: login.php");
exit;
