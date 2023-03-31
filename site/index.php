<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>De Turkse keuken</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>



    <div class="home">
        <?php include 'nav.php'; ?>

        <div class="flex-container">
            <div class="flex-item">
                <h2><b>Welkom op de Épicer site</b></h2>
                <p>De ideale site voor u om de heerlijkste recepten uit de Mediterraanse keuken te leren en maken.
                    <br>
                    <b>WAARSCHUWING</b>
                    <br>
                    ALLE RECEPTEN DIE U VINDT OP DE SITE ZIJN <b>TURKS</b>
                    <br>
                    <i>ZODRA DE BEHEERDER ER ACHTERKOMT DAT ER EEN GRIEKS RECEPT IS WORDT UW RECEPT EN ACCOUNT <b>VERWIJDERDT</b></i>
                </p>
            </div>
        </div>

        <?php include 'footer.php' ?>
    </div>
</body>

</html>