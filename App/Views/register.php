
<?php

use app\core\Alert;

if(isset($_GET["message"])){

    $alert = new Alert($_GET["message"],$_GET["type"]);
}

?>


<h1>Login</h1>

    <?php if(isset($alert)){$alert->render();}?>

    <form action="/api/register" method="post" enctype="multipart/form-data">

        <div class="col-md-6">
            <label for="email" class="form-label" >Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-md-6">
            <label for="firstname" class="form-label">Username</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
        </div>
        <div class="col-md-6">
            <label for="lastname" class="form-label">Username</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>
        <div class="form-group col-md-6">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="********">
        </div>
        <div class="form-group col-md-6">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="********">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

