<script>
    var fwd = "<?php echo $_REQUEST['fwd'] ?>";
    if(fwd != ""){location.href = fwd;}
</script>
<h2>
    <?php
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

