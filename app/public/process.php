<?php
if (isset($_POST['firstname']) && isset($_POST['bday'])){
    $diff = date_diff(date_create($_POST['bday']), date_create($today="now"));
    echo 'Hello ' . $_POST['firstname'] . $_POST['lastname'] .', your age is: ' . $diff->format('%y'); 
} else {
    echo "Complete the fields in the form!";
}
?>