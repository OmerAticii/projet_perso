<?php
session_start();
include("constant.php");

$pseudo = htmlspecialchars($_POST['pseudo']);
$mail = htmlspecialchars($_POST['mail']);
$password = htmlspecialchars($_POST['password']);
$confirm_password = htmlspecialchars($_POST['confirm-password']);

if ($password != $confirm_password) {
    echo "<script>alert('Les mots de passe ne correspondent pas');</script>";
}
if ($password == $confirm_password) {
    $conn = connect_db();
    $req = $conn->prepare("SELECT pseudo FROM users WHERE pseudo = :pseudo");
    $req->execute(array('pseudo' => $pseudo));
    if ($req->rowCount() > 0) {
        echo "<script>alert('Pseudo déjà utilisé');</script>";
    } else if($req->rowcount() == 0) {
        $req = $conn->prepare("SELECT mail FROM users WHERE mail = :mail");
        $req->execute(array('mail' => $mail));
        if ($req->rowCount() > 0) {
            echo "<script>alert('Adresse mail déjà utilisée');</script>";
        } else if ($req->rowcount() == 0) {
            $pass_hash = password_hash($password, PASSWORD_DEFAULT);
            $req = $conn->prepare("INSERT INTO users (pseudo, mail, password) VALUES (:pseudo, :mail, :password)");
            $req->execute(array('pseudo' => $pseudo,'mail' => $mail, 'password' => $pass_hash));
            header("Location: ../connexion.php");
        } else {
            echo "<script>alert('Erreur');</script>";
            echo $req->errorInfo();
            die();
        }
    }
}
?>