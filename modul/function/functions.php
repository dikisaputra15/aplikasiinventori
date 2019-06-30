<?php
function checkVariabel($parameter)
{
    return (isset($parameter) ? $parameter : "");
}

function checkNullVariabel($parameter)
{
    if(is_null($parameter))
    {
       $_SESSION['name'] = null;
    }
}

?>