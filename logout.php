<?php
session_destroy();
?>
<p>Logging out ...</p>
<script>

//document.execCommand("ClearAuthenticationCache");
var url = window.location.protocol + "//logout:logout@" + window.location.host + "/";
window.location = url;

</script>

<div style="height: 24px; cursor: pointer; margin-left: 8px; margin-top: 2px; display: none;" onclick="logout()" title="logout">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
        <path fill='#ffffff' stroke='#ffffff' d="M3 3h8V1H3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8v-2H3z"/>
        <path fill='#ffffff' stroke='#ffffff' d="M19 10l-6-5v4H5v2h8v4l6-5z"/>
    </svg>
</div>