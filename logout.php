<?php

session_start();
session_destroy(); //Destroys all data registered to a session
header('location: signin.php');