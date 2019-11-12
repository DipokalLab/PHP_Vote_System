<?php

if(!isset($_SESSION))
{
    session_start();
}

session_destroy();
?>
<script type='text/javascript'> history.go(-1);</script>
