<?php
session_start();
    $host = "167.179.95.243";
    $dbname="phamton";
    $dbusername="root";
    $dbpw = '4$Vvy4[S1hj4qxmn';
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$dbusername,$dbpw);
    define('TABLE_WEBSETTING','web_settings');
    define('TABLE_SLIDESHOW','slideshows');
    define('TABLE_CATEGORY','categories');
    define('TABLE_PRODUCT','products');
    define('TABLE_BRAND','brands');
    
    define('SITE_URL','http://phamton.vualike.com/');
    
    $ADMIN_URL = "http://phamton.vualike.com/admin/";
    $AP_URL = "http://phamton.vualike.com/ap/";
    $ADMIN_ASSET_URL = "http://phamton.vualike.com/admin/adminlte/";

    function getSimpleQuery($sql, $isAll = false){
        global $conn;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if($isAll){
            return $stmt->fetchAll();
        }
        return $stmt->fetch();
    }
?>