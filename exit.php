<?php
setcookie('user', $name['name'], time() - 3600, "/");
header('Location: /');
?>
