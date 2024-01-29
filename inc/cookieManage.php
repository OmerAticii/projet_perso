<?php
function connect($pseudo){
//  on crypte le token qui est unique
    $tkn = sha1(uniqid());
    setcookie('pseudo',$pseudo, 0, '/');
    setcookie('token',$tkn, 0, '/');

    include("constant.php");
    $db = connect_db();
    $query = $db->prepare("UPDATE users SET token=:token WHERE pseudo=:pseudo");
    $query->execute(array('token' => $tkn, 'pseudo' => $pseudo));

}
function disconnect($pseudo){
    include("constant.php");
    $db = connect_db();
    $query = $db->prepare("UPDATE users SET token=:token WHERE pseudo=:pseudo");
    $query->execute(array('token' => NULL, 'pseudo' => $pseudo));
    // destruction des cookies
    setcookie('pseudo','',-1,'/');
    setcookie('token','',-1, '/');
}
// fonction pour vérifier si l'utilisateur est connecté
function estConnecte(){

    if (isset($_COOKIE['pseudo']) and isset($_COOKIE['token'])){
        $pseudo = $_COOKIE['pseudo'];
        $token = $_COOKIE['token'];

        include("constant.php");
        $db = connect_db();
        // on vérifie si les cookies pseudo et token correspondent à une ligne dans la table membre de la BD
        $req = $db->prepare("SELECT pseudo FROM users WHERE token=:token AND pseudo=:pseudo");
        $req -> execute(array(
            "token" => $token,
            "pseudo" => $pseudo
        ));
        $nb_lignes = $req->rowCount();
        if($nb_lignes == 1) {
            return true;
        }
        else {
            return false;
        }
    }
    else {
        return false;
    }

}
?>
