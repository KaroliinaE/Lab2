<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuotteen lisääminen</title>
</head>
<body>

    <h2>Lisää tuote</h2>
    <form method="post">
        <label for="nimi">Tuotteen nimi:</label>
        <input type="text" name="nimi" required>
        <br>
        <label for="hinta">Hinta (€):</label>
        <input type="number" step="0.01" name="hinta" required>
        <br>
        <label for="kuvaus">Kuvaus:</label>
        <textarea name="kuvaus" required></textarea>
        <br>
        <button type="submit">Lisää tuote</button>
    </form>

    <?php

    $palvelin = "localhost";
    $kayttajatunnus = "trtkm23a_7";
    $salasana = "auxYtBBp";
    $tietokanta = "wp_trtkm23a_7";

    try {
        $pdo = new PDO("mysql:host=$palvelin;dbname=$tietokanta;charset=utf8", $kayttajatunnus, $salasana);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('<p>Yhteys epäonnistui</p><p>' . $e->getMessage() . '</p>');
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nimi = $_POST['nimi'];
        $hinta = $_POST['hinta'];
        $kuvaus = $_POST['kuvaus'];

        $sql = "INSERT INTO tuotteet (nimi, hinta, kuvaus) VALUES (:nimi, :hinta, :kuvaus)";
        $stmt = $pdo->prepare($sql);
        
        if ($stmt->execute(['nimi' => $nimi, 'hinta' => $hinta, 'kuvaus' => $kuvaus])) {
            echo "<p>Tuote '$nimi' lisätty onnistuneesti!</p>";
        } else {
            echo "<p>Tuotteen lisääminen epäonnistui.</p>";
        }
    }

    ?>

</body>
</html>
