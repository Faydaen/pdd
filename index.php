<?php


$data = [
//    [
//        'title' => 'В каком случае водитель совершит вынужденную остановку?',
//        'img' => '',
//        'answers' => [
//            '1. Остановившись непосредственно перед пешеходным переходом, чтобы уступить дорогу пешеходу.',
//            '2. Остановившись на проезжей части из-за технической неисправности транспортного средства.',
//            '3. В обоих перечисленных случаях.'
//        ],
//        'right_answer' => 1,
//        'comment' => '',
//        'tags' => [],
//    ],
    [
        'title' => 'Разрешен ли Вам съезд на дорогу с грунтовым покрытием?',
        'img' => 'n1_2.jpg',
        'answers' => [
            '1. Разрешен.',
            '2. Разрешен только при технической неисправности транспортного средства.',
            '3. Запрещен.',
        ],
        'right_answer' => 0,
        'comment' => '',
        'tags' => [],
    ]

];

//function b(){
//    [
//        'title' => '',
//        'img' => '',
//        'answers' => [
//
//        ],
//        'right_answer' => '',
//        'comment' => '',
//        'tags' => [],
//    ]
//}



$b = $data[array_rand($data)];

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ПДД</title>
    <link rel="stylesheet" href="./css/bulma.min.css">
</head>
<body>




<div class="container">
    <div class="notification">
        <form method="get">
        <?php if(!empty($b['img'])): ?>
            <img src="./img/<?= $b['img'] ?>">
            <br>
        <?php endif ?>
        <div>
            <strong><?= $b['title'] ?></strong>
        </div>
        <br>

        <?php foreach ($b['answers'] as $answer): ?>
            <button type="submit" style="text-align: left; display: block; width: 100%" class="button"><?= $answer ?></button><br>
        <?php endforeach; ?>
        </form>


        
    </div>
</div>

<script>
    function showTips() {

    }
</script>

</body>
</html>









