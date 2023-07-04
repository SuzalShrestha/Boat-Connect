<?php
session_start();
session_unset();
session_destroy();
echo '<script type="text/javascript"> 
alert("Logout Successfully.")
window.location.href="http://127.0.0.1/thedebuggers/index.php" 
</script>';
?>