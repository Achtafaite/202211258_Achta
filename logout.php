<?php
require_once __DIR__ . '/config/database.php';

// destroy the session and redirect to home
session_unset();
session_destroy();

header('Location: index.php');
exit();
