<?php

$n     = 1000;
$count = 0;
for ($i = 1; $i < $n; $i = $i * 2) {
  $count++;
}

echo $count . "\n";