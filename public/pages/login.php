<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 10.11.2016
 * Time: 13:31
 */
?>

<h1>Anmeldung</h1>
<h3>zum internen Bereich</h3>

<form action="" method="post" id="login_form">

    <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="login[username]" placeholder="Benutzername">
    </div>

    <div>
        <label for="pass">Passwort</label>
        <input type="password" id="pass" name="login[pass]" placeholder="Passwort">
    </div>

    <div>
        <label for="submit"></label>
        <input type="submit" id="submit" name="login[submit]" value="Anmelden">
    </div>

</form>
