<?php include('inc/header.php');?>
<main>
    <div class="main-wrapper">
        <div class="wrapper2">
            <div class="conform2">
                <form action="inc/traitement_insc.php" method="post" onsubmit="return validatePassword()">
                    <label for="pseudo">Pseudo</label>
                    <input pattern="[/^[A-Za-z0-9\x{00c0}-\x{00ff}]{5,20}$/u]" id="pseudo" type="text" name="pseudo" >
                    <div><? if(isset($pseudoMsgError) && !empty($pseudoMsgError)) {echo "Pseudo invalide";}?>

                        <?php if(isset($pseudoMsgError)) {echo $pseudoMsgError;} ?></div>


                    <label for="mail">Mail</label>
                    <input id="mail" type="email" name="mail">
                    <?if(isset($mailMsgError) && !empty($mailMsgError)) {echo "Adresse mail invalide";}?>

                    <?php if(isset($mailMsgError)) {echo $mailMsgError;} ?>
                    <label for="password">Mot de passe</label>
                    <input id="password" type="password" name="password">
                    <?if(isset($passwordMsgError) && !empty($passwordMsgError)) {echo "Mot de passe invalide";}?>
                    <?php if(isset($passwordMsgError)) {echo $passwordMsgError;} ?>

                    <label for="confirm-password">Confirmer le mot de passe</label>
                    <input name="confirm-password" type="password">

                    <input type="submit" class="button" value="Inscription"  id="register">

                    <p id="errorMess"></p>
                </form>
            </div>
            <div class="photos">
                <div class="duo1">
                    <!-- <img src="IMG/inscription1.png" alt="con1" class="img1">
                    <img src="IMG/inscription2.png" alt="con2" class="img2"> -->
                </div>
                <div class="duo2">
                    <!-- <img src="IMG/inscription3.png" alt="con3" class="img3">
                    <img src="IMG/inscription4.png" alt="con4" class="img4"> -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="aside-wrapper">
        <h1 class="avis-t">AVIS</h1>
        <hr>
        <div class="avis1">
            <h1>Dok:</h1>
            <p>
                Blog au top
                l’équipe est à l’écoute
                et a répondu à
                mes questions rapidement !!!
            </p>
            <img src="IMG/icons8-etoile-48.png" alt="étoile" class="star">
            <img src="IMG/icons8-etoile-48.png" alt="étoile" class="star1">
            <img src="IMG/icons8-etoile-48.png" alt="étoile" class="star2">
            <img src="IMG/icons8-etoile-48.png" alt="étoile" class="star3">
            <img src="IMG/icons8-etoile-48.png" alt="étoile" class="star4">
        </div>
    </div>
</main>
<?php include('inc/footer.php'); ?>
<script src="fonction.js"></script>
