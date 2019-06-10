<?php

include 'lib/simplehtmldom/simple_html_dom.php';

$html = file_get_html('https://biletpdd.ru/bilety/ab/bilet1.htm');


$b = [];




foreach($html->find('.question') as $question){

//    echo $question->plaintext;


//    $br = $question->find('*');
//    foreach ($br as $i=>$b){
//
//        echo $i;
//        echo $b->tag;
//        echo ''.PHP_EOL;
//    }
//    var_dump($br[0]);


    $a = [];
    $answers = $question->find('ul', 0);
    foreach ($answers as $i=>$answer){
        var_dump($answer);
//        $li = $answer->find('li');
//        $a[] = $li->plaintext;
    }
    die();

    print_r($a);


//    номер вопроса
//    сам вопрос
//    картинка
//    ответы
//    коментарий
//
//    $br = $question->find('br', 2);
//    print_r($br->next_sibling()->outertext) ;
//

    echo ''.PHP_EOL;

}

//$url = 'https://biletpdd.ru/bilety/ab/bilet1.htm';
//$html = file_get_contents($url);
//
//
//$dom = new DOMDocument;
//$dom->loadHTML($html);
//$images = $dom->get('question');
//
//foreach ($images as $image) {
//    $image->setAttribute('src', 'http://example.com/' . $image->getAttribute('src'));
//}