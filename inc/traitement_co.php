<?php
session_start();
include("constant.php");
include("cookieManage.php");
$pseudo = htmlspecialchars($_POST['pseudo']);
$password = htmlspecialchars($_POST['password']);

$conn = connect_db();
$req = $conn->prepare("SELECT pseudo, password FROM users WHERE pseudo = :pseudo");
$req->execute(array('pseudo' => $pseudo));
$result = $req->fetch();

if ($result && password_verify($password, $result['password'])) {
    session_regenerate_id();
    $_SESSION['user_id'] = $result['id'];
    connect($pseudo);
    header("Location: ../membre.php");
} else {
    echo "<script>alert('Pseudo ou mot de passe invalide');</script>";
}
?>