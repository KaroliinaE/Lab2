// Haetaan olemassa oleva tuote ID:llä ja päivitetään tiedot
$sql = "UPDATE tuotteet SET nimi = :nimi, hinta = :hinta WHERE id = :id";
// Lisätty issueeseen viittaus
