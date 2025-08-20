<script>
    var fwd = "<?php echo $_REQUEST['fwd'] ?>";
    if(fwd != ""){location.href = fwd;}
</script>
<h2>
    <?php
	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Ausgabe zum Testen
	
	$host = 'db'; // MariaDB-Container-Name oder Host (im Docker-Setup ist 'db' der Name des MariaDB-Containers)
	$dbname = 'wordpress'; // Name der Datenbank
	$username = 'wpuser'; // Dein MariaDB-Benutzername
	$password = 'password'; // Dein MariaDB-Passwo

try {
echo "Versuche Verbindung zur Datenbank...<br>";

    // PDO-Verbindung zur MariaDB-Datenbank
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Verbindung zur Datenbank erfolgreich...<br>"; // Fehlerbehandlung aktivieren
} catch (PDOException $e) {
    // Fehlerausgabe, falls die Verbindung fehlschlägt
    echo "Verbindung fehlgeschlagen: " . $e->getMessage();
    exit;
}
    if(isset($_REQUEST['id']))
    {
echo "Request...<br>";
        $res = $db->query("SELECT name FROM users WHERE id = ". $_REQUEST['id'])->fetch(PDO::FETCH_ASSOC); 
        echo "Willkommen". $res['name'] ." <a href='/delete'>(Account löschen)</a>";
    
    }
    else
    {
        echo "Willkommen Gast";
    }
    ?>
</h2>

