<?php
    require_once ("connect.php");

    $polaczenie = new mysqli ($host, $db_user, $db_password, $db_name);
    echo $polaczenie->error;

    if($polaczenie->connect_errno != 0)
    {
        echo "Błąd " . $polaczenie->connect_error;
        $polaczenie->close();

    }else
    {
        $metoda_wyszukania = $_POST['metoda_wyszukania']; 
        $wyrazenie =trim($_POST['wyrazenie']);
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
    <link rel="stylesheet" href="tabele.css" type="text/css">
</head>
<body>
    <div id="container">
        <header>
            <h1>Książka</h1>
        </header>

        <main>

            <?php
            if(!$metoda_wyszukania || !$wyrazenie)
            {
                echo "<p>Brak parametrów wyszukiwania! <br> 
                Wróć do poprzedniej strony i spróbuj ponownie</p>";
                exit;
            }
        
            switch($metoda_wyszukania)
            {
                case 'tytul';
                case 'autor';
                case 'gatunek';
                break;
                default;
                echo "<p>Nieprawidłowy typ wyszukiwania!</p>";
                exit;
            }
                

                $sql="SELECT id_ksiazki, tytul, autor, gatunek, wydawnictwo, rok_wydania FROM ksiazki WHERE $metoda_wyszukania LIKE ?";
                $polecenie = $polaczenie -> prepare($sql);


                //bind_param() - określa co ma zostać wstawione w miejscu znaku napytania
                $polecenie -> bind_param('s', $wyrazenie);
               

                $polecenie->bind_result($id, $tytul, $autor, $gatunek, $wydawnictwo, $rok_wydania);
                $polecenie ->execute(); //powoduje wykonanie zapytania
                $polecenie->store_result();
                while($wiersz = $polecenie->fetch())
                {
                    
                    echo"<table>
                    <th>Tytuł</th> <th>Autor</th> <th>Gatunek</th> <th>Wydawnictwo</th> <th>Rok wydania</th>
                    <tr>
                        <td>" . $tytul . "</td>
                        <td>" . $autor . "</td>
                        <td>" . $gatunek . "</td>
                        <td>" . $wydawnictwo . "</td>
                        <td>" . $rok_wydania . "</td>
                    </tr>
                    </table>";
                

                }
                $polecenie->close();
            ?>

            
               
         </main>
    </div>    
    </div>
   

</body>
</html>