<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <h1>Pagee protegee</h1>
    <?="<p>Bienvenu <strong>" . $_SESSION['user'] . "</strong></p>"?>
    <a href="index.php?action=logout">Se deconnecter</a>
</body>
</html>