<?php

use app\core\View;

?>

<?php View::Breadcrumbs();?>

<h1 style="margin-bottom: 32px">Profiles</h1>

<?php

foreach (View::Bag()["users"] as $user){

    $profilePicture = $user->GetProfilePicture();
    $username = $user->GetUsername();
    $loginId = $user->GetLoginId();

    echo "
            <div style='display: flex; flex-direction: row;'>

                <img src='$profilePicture' alt='Profile Picture' style='width: 64px; height: 64px'>
                <div style='margin-left: 16px; display: flex; justify-content: center; align-items: center'>
                    <a href='/forum/profiles/$loginId'><h3>$username</h3></a>
                </div>
                
            </div> <hr class='hr hr-blurry'/>";
}


?>
