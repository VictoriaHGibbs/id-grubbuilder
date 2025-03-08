<?php
require_once('../../private/initialize.php');

$session->logout();

redirect_to(url_for('/index.php'));
