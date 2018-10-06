<?php
require 'pager.php';

$Pager = new Pager();

$total = 20387;
$page = 4;
$pager = $Pager->Get($total, $page);

//print_r($pager);

for ($i = $pager['min']; $i <= $pager['max']; ++$i) {
    echo '<li>';

    if ($i === $pager['cur']) {
        echo '<b>';
    }

    echo $i;

    if ($i === $pager['cur']) {
        echo '</b>';
    }

    echo "</li>\n";
}
