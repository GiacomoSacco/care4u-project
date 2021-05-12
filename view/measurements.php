<html>
    <head>
        <title>CARE4U</title>

        <!-- <link rel="stylesheet" href="/edsa-Info%20quinta%20php/altervista/sacco/care4u/view/css/style.css" type="text/css"> -->
        <link rel="stylesheet" href="view/css/style.css">
    </head>
    <body>
        <div id="cont">
            <h1>Measurements</h1>
            <table>
                <tr>
                    <th>id</th>
                    <th>ph</th>
                    <th>chlorides</th>
                    <th>lactic acid</th>
                    <th>glucose</th>
                    <th>time</th>
                </tr>
            <?php
                foreach($measurements as $m){
                    echo "<tr>".
                        "<td>".$m->idmea."</td>".
                        "<td>".$m->ph."</td>".
                        "<td>".$m->chlorides."</td>".
                        "<td>".$m->lactic_acid."</td>".
                        "<td>".$m->glucose."</td>".
                        "<td>".$m->time."</td>".
                    "</tr>";
                }
            ?>
            </table>
        </div>
    
    </body>
</html>