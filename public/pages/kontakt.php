<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 10.11.2016
 * Time: 13:31
 */
?>

<form action="" method="post" id="contact_form">

    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="contact[name]" placeholder="Ihr Name">
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="contact[email]" placeholder="Ihre E-Mail Adresse">
    </div>

    <div>
        <label for="message">Nachricht</label>
        <textarea type="message" id="message" name="contact[message]"
                  placeholder="Ihre Nachricht an uns" cols="50" rows="20"></textarea>
    </div>

    <div>
        <input type="submit" id="submit" name="contact[submit]" value="Absenden">
    </div>

</form>
