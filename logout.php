<?php


session_destroy();
//session_start();
//unset($_SESSION['profile']);


//header("Location: http://logout@calendar.local:8080");
//header('WWW-Authenticate: Basic realm="realmName"');
//header('HTTP/1.0 401 Unauthorized');
?>
<p>Logging out ...</p>
<script>

document.execCommand("ClearAuthenticationCache");
window.location = window.location.protocol + "//" + window.location.host + "/";

</script>