<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - nextstats-web
 * Last Updated - 30/10/2023
 */


use app\core\Alert;
use app\services\Auth;

if(isset($_GET["message"])){

    $alert = new Alert($_GET["message"],$_GET["type"]);

}

$user = Auth::GetCurrentUser();


?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h2 class="dash-header">
            Welcome <?php echo $user->GetFirstname()." ".$user->GetLastname() ?>!
        </h2>
    </div>

</div>

