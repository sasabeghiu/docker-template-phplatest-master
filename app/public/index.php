<?php
$name = $_GET['name'];
$birthday = $_GET['birthday'];

$diff = date_diff(date_create($birthday), date_create($today="now"));
echo 'Hello ' .$name.', your age is '. $diff->format('%y');
