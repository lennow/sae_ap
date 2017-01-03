<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 10.11.2016
 * Time: 13:31
 */
?>

<p>
    <?= (isset ($this->mailStatus)) ? $this->mailStatus : "" ?>
</p>

<h1>Kontaktformular</h1>

<form action="" method="post" id="contact_form">

    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="contact[Name]" placeholder="Ihr Name">
        <p class="error">
            <?= (isset ($this->errorStatus['Name'])) ? $this->errorStatus['Name'] : "" ?>
        </p>
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="contact[Email]" placeholder="Ihre Email Adresse">
        <p class="error">
            <?= (isset($this->errorStatus['Email'])) ? $this->errorStatus['Email'] : "" ?>
        </p>
    </div>

    <div>
        <label for="message">Nachricht</label>
        <textarea type="message" id="message" name="contact[Nachricht]"
                  placeholder="Ihre Nachricht an uns" cols="50"></textarea>
        <p class="error">
            <?= (isset($this->errorStatus["Nachricht"])) ? $this->errorStatus["Nachricht"] : "" ?>
        </p>
    </div>

    <div>
        <label for="submit"></label>
        <input type="submit" id="submit" name="contact[submit]" value="Absenden">
    </div>

</form>
