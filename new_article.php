<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New</title>
</head>
<body>
    <h3>Új cikk felvétele</h3>
    <form action="insert_new.php" method="post">
        <label for="theme">Téma: </label>
        <input type="text" name="theme" id=""><br>

        <label for="title">Cím: </label>
        <input type="text" name="title" id=""><br>

        <label for="content">Szöveg: </label>
        <textarea name="content" id="" cols="100" rows="20"></textarea><br>

        <button type="submit" name="ok">Elfogad</button>
        <button type="reset">Visszaállít</button>
    </form>
    <?php //EZ még kérdéses, hogy hogyan kapcsoljam össze a még nem létező cikkel a képet... include_once "upload_image_form.php" image_upload()?>
    <a href="index.php">Vissza a főlapra</a>
</body>
</html>