<script>
    var fwd = "<?php echo $_REQUEST['fwd'] ?>";
    if(fwd != ""){location.href = fwd;}
</script>
<h2>
    <?php
	$host = 'db'; // MariaDB-Container-Name oder Host (im Docker-Setup ist 'db' der Name des MariaDB-Containers)
	$dbname = 'wordpress'; // Name der Datenbank
	$username = 'wpuser'; // Dein MariaDB-Benutzername
	$password = 'password'; // Dein MariaDB-Passwo

try {
    // PDO-Verbindung zur MariaDB-Datenbank
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Fehlerbehandlung aktivieren
} catch (PDOException $e) {
    // Fehlerausgabe, falls die Verbindung fehlschlägt
    echo "Verbindung fehlgeschlagen: " . $e->getMessage();
    exit;
}
    if(isset($_REQUEST['id']))
    {
        $res = $db->query("SELECT name FROM Users WHERE id = ". $_REQUEST['id'])->fetch(PDO::FETCH_ASSOC); 
        echo "Willkommen". $res['name'] ." <a href='/delete'>(Account löschen)</a>";
    
    }
    else
    {
        echo "Willkommen Gast";
    }
    ?>
</h2>

