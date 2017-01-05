<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 10.11.2016
 * Time: 13:31
 */

$contact = $this->contactForm->run_contact(@$_POST['contact']);

?>

<h1>Kontaktformular</h1>

<form action="" method="post" id="contact_form">

    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="contact[Name]" placeholder="Ihr Name" required>
        <p class="error">
            <?php if (isset ($contact['Name'])) : print_r($contact['Name']); ?>
            <?php endif; ?>
        </p>
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="contact[Email]" placeholder="Ihre Email Adresse" required>
        <p class="error">
            <?php if (isset ($contact['Email'])) : print_r($contact['Email']); ?>
            <?php endif; ?>
        </p>
    </div>

    <div>
        <label for="message">Nachricht</label>
        <textarea type="message" id="message" name="contact[Nachricht]" placeholder="Ihre Nachricht an uns" cols="50" required></textarea>
        <p class="error">
            <?php if (isset ($contact['Nachricht'])) : print_r($contact['Nachricht']); ?>
            <?php endif; ?>
        </p>
    </div>

    <div>
        <label for="submit"></label>
        <input type="submit" id="submit" name="contact[submit]" value="Absenden">
    </div>

</form>

<p>
    <?php if (!is_array($contact)) : echo $contact ?>
    <?php endif; ?>
</p>

