<?php

require_once 'Tower.php';

$disks = 4;
if (isset($_GET['disks']) && is_numeric($_GET['disks'])) {
    $disks = intval($_GET['disks']);
}

$tower = new Tower($disks);
$tower->resolve($disks);
