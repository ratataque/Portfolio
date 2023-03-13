<form action="/mobile/login.php" method="post">
    <input name="login" type="text" >
    <input name="password" type="text" >
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
echo ("<pre>");
var_dump($_POST);
echo ("</pre>");
?>