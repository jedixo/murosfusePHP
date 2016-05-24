<?php
try {
    $dbh = new PDO("sqlite:db/musofuse.sqlite"); 
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>