<?php

function root_path($script_path)
{
//     добавляет лидирующий / если нет
    if ($script_path[0] != '/') {
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}

function u($string = "")
{
    return urlencode($string);
}

function raw_u($string = "")
{
    return rawurlencode($string);
}

function h($string = "")
{
    return htmlspecialchars($string);
}

function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function redirect_to($location)
{
    header("Location: " . $location);
    exit;
}

function nl2br2($string)
{
    $string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string);
    return $string;
}

function check_acc_lvl($access_lvl, $access_lvl_required)
{
    If ($access_lvl >= $access_lvl_required) {
        return true;
    } else {
        return false;
    }
}

function test($a)
{
    echo "<pre>";
    print_r($a);
    echo "<hr>";
    var_dump($a);
    echo "</pre>";
    die;
}

function random16bytes()
{
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
    $hash_link = bin2hex($string);
    return $hash_link;

}