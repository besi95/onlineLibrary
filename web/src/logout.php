<?php
/**
 * prish sesionin
 */
session_start();
session_destroy();
header('Location: ../login.php');