<form method="POST" action="./php/form/register_form.php">
    <fieldset>
        <legend>Inscrivez-vous</legend>
        <label for="nick">Identifiant : </label><input type="text" name="nick" id="nick"><br>
        <label for="pass">Mot de passe : </label><input type="password" name="pass" id="pass"><br>
        <label for="pass2">Confirmation du mot de passe : </label><input type="password" name="pass2" id="pass2"><br>
        <label for="name">Nom : </label><input type="text" name="name" id="name"><br>
        <label for="fname">Prénom : </label><input type="text" name="fname" id="fname"><br>
        <label for="birth">Date de naissance : </label><input type="date" name="birth" id="birth"><br>
        <label for="adr">Adresse : </label><input type="text" name="adr" id="adr"><br>
        <label for="cp">Code Postal : </label><input type="text" name="cp" id="cp" minlength="5" maxlength="5"><br>
        <label for="city">Ville : </label><input type="text" name="city" id="city"><br>
        <label for="mail">Courriel : </label><input type="email" name="mail" id="mail"><br>
        <input type="submit" value="Se connecter">
    </fieldset>
</form>