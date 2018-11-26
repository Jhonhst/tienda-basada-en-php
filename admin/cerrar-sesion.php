<?php

    if(isset($_COOKIE['admin'])){
        setcookie("admin","",time()-1000,"/");
        header("Location:../index.php");
    }


?>