<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wyszukaj_uzytkownika</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div class="baner">
        <div id="container">
            <header>
                <h1>Wyszukaj użytkownika</h1>
            
            
            </header>
            <main>

            <form action="wyszukaj_uzytkownika.php" method="post">
                <div>Numer karty bibliotecznej: <input type="number" name="nr_karty"> <br>

                <input type="submit" value="Szukaj">

            </form>
            <?php

                

                if(!isset($_POST['nr_karty']))
                {
                echo "Nie wpisano numeru karty bibliotecznej";
                }
                else
                {
                    $nr_karty = $_POST['nr_karty'];
                }
            ?>
                
            </main>
        </div>    
    </div>
    
</body>
</html>
