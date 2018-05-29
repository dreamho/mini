<?php

function redirect($name)
{
    echo "<script type='text/javascript'> document.location = '" . URL . $name . "'; </script>";
}