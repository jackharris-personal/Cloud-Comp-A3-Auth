<?php
use app\core\View;
use app\services\Auth;
?>


<h1>The requested page was not found</h1>
<h2><?php echo View::Bag()["message"]?></h2>
<?php
$loginLogout = "<a href='/login'>Login</a>";
$home = "";

if(Auth::Check()){
    $loginLogout = "<a href='/api/logout'>Logout</a>";
    $home = "<a href='/forum'>Forum Home</a>";
}
echo $loginLogout;
echo $home;
