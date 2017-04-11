<DOCTYPE! html>
<html>
    <head>
    
    </head>
    <body>
        <?php
        echo "<center>";
        echo "<h1>Client Visit</h1>";
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Client No.</th><th>Firstname</th><th>Lastname</th><th>Property No.</th><th>Viewdate</th></tr>";

        class TableRows extends RecursiveIteratorIterator { 
            function __construct($it) { 
                parent::__construct($it, self::LEAVES_ONLY); 
            }
            function current() {
                return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
            }
            function beginChildren() { 
                echo "<tr>"; 
            } 
            function endChildren() { 
                echo "</tr>" . "\n";
            } 
        }  
        
        $servername = "localhost";
        $username = "noodee";
        $password = "mypass";
        $dbname = "dreamhome";
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT DISTINCT clientno, fname, lname, propertyno, viewdate FROM client NATURAL JOIN viewing"); 
            $stmt->execute();

            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
                echo $v;
            }
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        echo "</table>";
        echo "</center>";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $export=$_POST['export'];
            if ($export === "pdf"){
                header("Location:script/export_pdf.php");
            }
            else if ($export === "excel"){
                header("Location:script/export_xls.php");
            }
            else if ($export === "csv"){
                header("Location:script/export_csv.php");
            }
        }
        ?>
        <center>    
        <br>
        <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <select id="export" name="export">                      
                <option value="0">--Select Type Export--</option>
                <option value="pdf">PDF</option>
                <option value="excel">Excel</option>
                <option value="csv">CSV</option>
            </select>
            <input type="submit" name="submit">
        </form>
        </center>
    </body>
</html>