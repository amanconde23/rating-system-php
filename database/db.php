<?php
    if(isset($_POST['save'])){
        $conn = new mysqli($host = 'localhost', $username = 'root', $password = '', $dbname= 'ratingsystem');
        $uID = $conn->real_escape_string($_POST['uID']);
        $ratedIndex = $conn->real_escape_string($_POST['ratedIndex']);
        $ratedIndex++;

        if(!$uID){
            $conn->query("INSERT INTO stars (ratedIndex) VALUES ('$ratedIndex')");
            $sql = $conn->query("SELECT id FROM stars ORDER BY id DESC LIMIT 1");
            $uData = $sql->fetch_assoc();
            $uID = $uData['id'];
        } else {
            $conn->query("UPDATE stars SET ratedIndex = '$ratedIndex' WHERE id='$uID'");
        }
        exit(json_encode(array('id' => $uID)));
    }
?>
