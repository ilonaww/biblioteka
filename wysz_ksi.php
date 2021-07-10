<?php
    require_once ("connect.php");

    $polaczenie = new mysqli ($host, $db_user, $db_password, $db_name);
    echo $polaczenie->error;

    if($polaczenie->connect_errno != 0)
    {
        echo "Błąd " . $polaczenie->connect_error;
        $polaczenie->close();

    }
    else
    {
        $metoda_wyszukania = $_POST['metoda_wyszukania'];  
    }
    
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wysz_ksi</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div id="container">
        <header>
            <h1>Książka</h1>
        </header>

        <main>

            <?php
                switch($metoda_wyszukania)
                {
                    case 'tytul';
                    case 'autor';
                    case 'gatunek';
                    break;
                    default: 
                    echo "<p>Nieprawidłowy typ wyszukiwania!</p>";
                    exit;
                }
            ?>
               
         </main>
    </div>    
    </div>
   

</body>
</html>