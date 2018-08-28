<?php
session_start();
if(isset($_SESSION['login'])){
    $logado='sim';
}
else{
    $logado=null;
}