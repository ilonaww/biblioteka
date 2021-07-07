<?php

    require_once ('connect.php');
    $polaczenie = new mysqli ($host, $db_user, $db_password, $db_name);

    // $nr_karty_bibliotecznej = $_POST['nr_karty_bibliotecznej'];

     if($polaczenie->connect_errno !=0)
     {
         echo "Błąd " . $polaczenie->connect_error;
         $polaczenie->close();
     }
     else
     {
        $nr_karty_bibliotecznej = $_POST['karta'];

        $zapytanie = "SELECT imie, nazwisko FROM uzytkownicy WHERE nr_karty_bibliotecznej = $nr_karty_bibliotecznej";
        //"SELECT uzytkownicy.imie, uzytkownicy.nazwisko, ksiazki.tytul, wypozyczenia.data_wypozyczenia FROM uzytkownicy, ksiazki, wypozyczenia WHERE nr_karty_bibliotecznej = $nr_karty_bibliotecznej AND uzytkownicy.id_uzytkownika = wypozyczenia.id_uzytkownika AND wypozyczenia.id_ksiazki = ksiazki.id_ksiazki";

     
     
     }

    
?>
<! DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Użytkownik</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="tabele.css" type="text/css"> 
</head>
<body>
    <div id="container">
        <header>
            <h1>Użytkownik</h1>
        </header>
    
        <main>
    
        <?php
            $rezultat = $polaczenie->query($zapytanie);
            

            if(empty($_POST['karta']))
            {
                echo "<h3>Nie podano numeru karty bibliotecznej!</h3>";
                $polaczenie->close();
            }else{

                $ilu_userow = $rezultat->num_rows;
                

            
                if($ilu_userow <= 0 )
                {
                    echo "<h3>Brak użytkownika o takim numerze karty bibliotecznej.</h3>";
                }
                
                else
                {
                    
                    while($wiersz = $rezultat->fetch_assoc())
                    {
                        $imie = $wiersz['imie'];
                        $nazwisko = $wiersz['nazwisko'];
                        //$tytul = $wiersz['tytul'];
                        //$data_wypozyczenia = $wiersz['data_wypozyczenia'];
                        echo"
                        <table>
                            <th>Imię</th> <th>Nazwisko</th>
                            <tr>
                                <td>" . $imie . "</td>
                                <td>" . $nazwisko . "</td>
                            </tr>
                        </table>";
                    }
                }
    }
        ?>
        </main>
    </div>
    </body>
</html>