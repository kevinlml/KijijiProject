<?php
require_once 'dbconfig.php';

include_once 'clsMember.php';
$member = new MEMBER($DB_con);

  $member->logout();
  $member->redirect('login.php');


