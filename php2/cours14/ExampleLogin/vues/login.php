<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form action="" method="POST">
        <div>
            Nom d'usager: <input type="text" name="username">
        </div>
        <div>
            Mot de pass: <input type="password" name="password">
        </div>
        <input type="hidden" name="action" value="Verifier">
        <button type="submit" value="login">Se connecter</button>
        <p><?= isset($errors) ? $errors : ""?></p>
    </form>
</body>
</html>