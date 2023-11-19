
<?php

use app\core\Alert;

if(isset($_GET["message"])){

    $alert = new Alert($_GET["message"],$_GET["type"]);
}

?>


<h1>Login</h1>

    <?php if(isset($alert)){$alert->render();}?>

    <form action="/api/login" method="post">
        <div class="form-group">
            <label for="email">Login Id:</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter your email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

