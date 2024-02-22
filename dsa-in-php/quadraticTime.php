<?php

$n     = 50;
$count = 0;

for ($i = 0; $i < $n; $i++) {
  for ($j = 0; $j < $n; $j++) {
    $count++;
  }
}

echo $count . "\n";