<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilblioteka</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div class="baner">
        <div id="container">
            <header>
                <h1>Rejestr biblioteczny</h1>
            
                <div id='data'>
                <?php
                    
                        $czas = date('d-m-Y H:i');
                        echo $czas;
                ?>
                </div>
            </header>
            <main>

            <div><a href="wyszukaj_uzytkownika.php"><button>Wyszukaj użytkownika </button></div> 
                <div><a href="rejestracja_uzytkownika.php"><button>Zarejestruj użytkownika </button></div>
                <div><a href="wyszukaj_ksiazke.php"><button>Wyszukaj książkę </button></div>
                <div><a href="dodaj_ksiazke.php"><button>Dodaj książkę </button></div>
                
            </main>
        </div>    
    </div>
    
</body>
</html>