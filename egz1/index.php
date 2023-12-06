<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia szkolna</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="baner">
        <h1>Hurtownia z najlepszymi cenami</h1>
    </div>
    <div id="lewy">
        <h2>Nasze ceny</h2>
        <table>
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'sklep');
                $zapytanie1 = "SELECT nazwa, cena FROM towary LIMIT 0, 4";
                $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                while ($wiersz1 = mysqli_fetch_row($wynik1) ) {
                    
                    echo "<tr>
                            <td>$wiersz1[0]</td>   
                            <td>$wiersz1[1]</td>
                        </tr>";
                }
                
                
            ?>
        </table>

           
    </div>

    <div id="prawy">
        <h2>Kontakt</h2>
        <br>
        <img src="zakupy.png" alt="Hurtownia" width="182px" height="162px">
        <br>
        <p>e-mail: <a href="mailto:bok@sklep.pl">hurt@poczta2.pl</a></p>
    </div>
    <div id="srodek">
        <h2>Koszt zakupów</h2>

    <form action="index.php" method="post">
    wybierz artykuł:  <select name="nazwa">
                <option>Gumka do mazania</option>
                <option>Cienkopis</option>
                <option>Pisaki 60 szt.</option>
                <option>Markery 4 szt.</option>
           </select>
          
    <br><br>
    liczba sztuk: <input type="number" name='numer' value="1">
    <br><br>
    <input type="submit" value="OBLICZ">
    </form>
    
    <?php
            
            $nazwa = $_POST['nazwa'];
            $zapytanie2 = "SELECT `cena` FROM `towary` WHERE `nazwa` LIKE '$nazwa' ";
            $wynik2 = mysqli_query($polaczenie, $zapytanie2);
            while ($wiersz2 = mysqli_fetch_row($wynik2)) {
                if(isset($_POST['numer'])){
                    $liczba = $_POST['numer'];
                }
                $wiersz2[0] = $wiersz2[0]*$liczba;

                echo "<div class='wynik'>
                        wartość zakupów: $wiersz2[0]
                        
                    </div>";
            }        

            mysqli_close($polaczenie);
        ?>


    </div>
    
    <div id="stopka"><h4>Witrynę wykonał:00000000000000</div>
    







</body>
</html>
