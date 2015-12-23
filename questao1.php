<?php
/**
* Escreva um programa que imprima números de 1 a 100. Mas, para múltiplos de 3 imprima
* “Fizz” em vez do número e para múltiplos de 5 imprima “Buzz”. Para números múltiplos
* de ambos (3 e 5), imprima “FizzBuzz”.
*/

for($i=1;$i<100;$i++){
  $div = 0;
  if($i % 3 == 0){
    $div = $div + 3;
  }
  if($i % 5 == 0){
    $div = $div + 5;
  }

  switch ($div) {
    case 3:
      echo "Fizz\n";
      break;
    case 5:
      echo "Buzz\n";
      break;
    case 8:
      echo "FizzBuzz\n";
      break;
    default:
      echo $i."\n";
      break;
  }
}
