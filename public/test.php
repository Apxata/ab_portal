<?php

require_once('../private/initialize.php');


try {
    $string = random_bytes(16);
} catch (TypeError $e) {
    // Well, it's an integer, so this IS unexpected.
    die("An unexpected error has occurred");
} catch (Error $e) {
    // This is also unexpected because 32 is a reasonable integer.
    die("An unexpected error has occurred");
} catch (Exception $e) {
    // If you get this message, the CSPRNG failed hard.
    die("Could not generate a random string. Is our OS secure?");
}
$a = bin2hex($string);

var_dump($a);
// string(64) "5787c41ae124b3b9363b7825104f8bc8cf27c4c3036573e5f0d4a91ad2eeac6f";