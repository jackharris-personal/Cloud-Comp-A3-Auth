<?php

use app\core\View;
use app\services\Auth;

if (Auth::Check()) {
    $user = Auth::GetCurrentUser();
    $username = $user->GetFirstname() . " " . $user->GetLastname();
    $user_id = $user->GetEmail();
}

$region = "http://localhost";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo View::Bag()["title"]; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>


    #main-nav{
        height: 40px;
        background-color: #072a40;
        box-shadow: 2px 2px 10px 2px rgba(0, 0, 0, 0.3);

    }

    #main-nav .dropbtn{
        background-color: transparent;
        color: white;
        padding: 8px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    #main-nav .dropdown{
        position: relative;
        display: inline-block;
    }

    #main-nav .dropdown-content{
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        width: 800px;
        height: 80vh;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    #main-nav .dropdown-content a{
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    #main-nav .dropdown-content a:hover {background-color: #f1f1f1}

    /* Show the dropdown menu on hover */
    #main-nav .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    #main-nav .dropdown:hover .dropbtn {
        color: orange;
    }

    #main-nav .divider{
        width: 100%;
        border: 1px solid #414750;
        margin: 24px 0 14px;
    }

    #main-nav .dropdown .menu{
        width: 200px;
        overflow: scroll;
        height: 80vh;
    }

    #main-nav .left{
        display: flex;
        flex-direction: row;
        width: 100%;
    }

    #main-nav .nav-item #logo{
        height: 40px;
        margin-right: 16px;
    }

    </style>

</head>


<nav id="main-nav">
<div class="left">
    <div class="dropdown">
        <button class="dropbtn">☰ Services</button>
        <div class="dropdown-content">
            <div class="menu">
            <a href="/cloud">Home</a>
            <a href="#">Favorites</a>
            <a href="#">All Services</a>
            <div class="divider"></div>
            <a href="/cloud/analytics">Analytics</a>
            <a href="/cloud/applicationIntegration">Application Integration</a>
            <a href="/cloud/database">Database</a>
            <a href="/cloud/compute-agent">Compute Agent</a>
            <a href="/cloud/end-user-monitoring">End User Monitoring</a>
            <a href="/cloud/video-games">Video Games</a>
            <a href="/cloud/frontend-web&mobile">Front-end Web & Mobile</a>
            <a href="/cloud/developer-tools">Developer Tools</a>
            </div>
        </div>
    </div>
</div>
</nav>

<div id="page-wrapper" style="padding-top: 2.5%;">
    <div class="container">
