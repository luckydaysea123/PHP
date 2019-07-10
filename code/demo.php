<?php
try
{
    if ($db = mysqli_connect("localhost", "root","", "mydb"))
    {
        echo 'Connect succefully';
    }
    else
    {
        throw new Exception('Unable to connect');
    }
}
catch(Exception $e)
{
    echo $e->getMessage();
}


?>