<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        td:first-child {
            background-color: #e0e0e0;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #fafafa;
        }

        table {
            max-width: 800px;
        }
    </style>
</head>

<body>
    <table>
        <?php
        // Asignaturas
        $eie = "EIE";
        $daweb = "DAWEB";
        $dwec = "DWEC";
        $diw = "DIW";
        $daweb = "DAWEB";
        $hlc = "HLC";
        $dwes = "DWES";
        ?>
        <tr>
            <th></th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
        </tr>
        <tr>
            <td>16:30 - 17:30</td>
            <td rowspan="4"><?php echo $eie; ?></td>
            <td rowspan="3"><?php echo $daweb; ?></td>
            <td rowspan="3"><?php echo $dwec; ?></td>
            <td rowspan="3"><?php echo $diw; ?></td>
            <td rowspan="3"><?php echo $hlc; ?></td>
        </tr>
        <tr>
            <td>17:30 - 18:30</td>
        </tr>
        <tr>
            <td>18:30 - 19:30</td>
        </tr>
        <tr>
            <td>19:30 - 20:30</td>
            <td rowspan="3"><?php echo $diw; ?></td>
            <td rowspan="3"><?php echo $dwes; ?></td>
            <td rowspan="3"><?php echo $dwes; ?></td>
            <td rowspan="3"><?php echo $dwec; ?></td>
        </tr>
        <tr>
            <td>20:30 - 21:30</td>
            <td rowspan="2"><?php echo $dwes; ?></td>
        </tr>
        <tr>
            <td>21:30 - 22:30</td>
        </tr>
    </table>
</body>

</html>