<?php include('inc/header.php');?>
<main>
    <p>Bonjour <strong><?php echo $_COOKIE['pseudo']; ?></strong> !</p> <br>
    <form action="inc/traitement_deco.php" method="post">
        <button class="disconnect" type="submit">Se déconnecter</button>
    </form>
</main>
<?php include('inc/footer.php'); ?>
