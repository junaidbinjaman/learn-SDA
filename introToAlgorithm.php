<?php

function linearSearch($arr, $element)
{
  $n   = count($arr);
  $key = $element;
  for ($i = 0; $i < $n; $i++) {

    if ($arr[$i] == $key) {
      return $i;
    }

  }
  return -1;
}

$array   = [11, 9, 5, 21];
$element = 5;

$index = linearSearch($array, $element);

if ($index > 0) {
  echo "Element $element found at the index $index\n";
} else {
  echo "Element not found";
}