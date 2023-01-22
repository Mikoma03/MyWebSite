<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="intro">
        <div id="welcome">Welcome to my PostgreSQL-Database</div>
    </div>

    <div class="button"></div>

    <?php
        // Connecting, selecting database
        $dbconn = pg_connect("host=localhost dbname=mikomabase user=postgres") or die('Could not connect: ' . pg_last_error());

        // Performing SQL query
        $query = 'SELECT * FROM employee';
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());

        // Printing results in HTML
        echo "<table>\n";
        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            echo "\t<tr>\n";
            foreach ($line as $col_value) {
                echo "\t\t<td>$col_value</td>\n";
            }
            echo "\t</tr>\n";
        }
        echo "</table>\n";

        // Free resultset
        pg_free_result($result);

        // Closing connection
        pg_close($dbconn);
    ?>
</body>
</html>
