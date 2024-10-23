<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "enc.php";

$enc = new CipherSecurity();

// $name = "arash";

// $encrypted = $enc->enc($name);

// echo $encrypted."\n";

// $decrypter = $enc->dec($encrypted);

// echo $decrypter;


include('../inc/loader.php');
$all_user = $fetch->User("DESC", "0", "500000", "");

foreach($all_user as $user){
    ?>
    <form name="myForm" id="myForm" action="../control/hozor/update.php" method="POST">
        <input type="hidden" id="update-user" name="update-user" value="1" />
        <input type="hidden" id="national_code" name="national_code" value="<?php echo $enc->enc($user['national_code']); ?>" />
        <input type="hidden" id="name" name="name" value="<?php echo $enc->enc($user['name']); ?>" />
        <input type="hidden" id="family" name="family" value="<?php echo $enc->enc($user['family']); ?>" />
    </form>

    <script>
        function submitform() {
            document.getElementById("myForm").submit();
        }

        window.onload = submitform;
    </script>
<?php
}