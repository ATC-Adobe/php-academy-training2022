<?php
declare(strict_types=1);

$days = [
    'poniedziałek' => 'monday',
    'wtorek' => 'tuesday',
    'środa' => 'wednesday',
    'czwartek' => 'thursday',
    'piątek' => 'friday',
    'sobota' => 'saturday',
    'niedziela' => 'sunday'
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Modern Business - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../layout/bootstrap-4.1.3-dist/css/bootstrap.css" rel="stylesheet"/>
</head>
<body class="d-flex flex-column h-100">
<table>
    <tr>
        <th>Polski</th>
        <th>English</th>
    </tr>
    <?php foreach ($days as $key => $value){ ?>
    <tr>
        <td><?php echo $key; ?></td>
        <td><?php echo $value; ?></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>

<?php
//function sum()
//{
//    $a = 5;
//    $b = 10;
//    $c = $a + $b;
//    return $c;
//}
//
//$sum = sum();
//
//echo 'Wynik obliczeń to: ' . $sum . '<br>';

//class math
//{
//    public function sumArray(array $integers) : int
//    {
//        $sum = 0;
//        foreach ($integers as $integer){
//            $sum+= $integer;
//        }
//        return $sum;
//    }
//}
//
//$math = new math();
//$array = [1, 2, 3, 4, 5];
//$intSum = $math->sumArray($array);
//
//echo $intSum;
