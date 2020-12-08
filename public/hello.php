<?php

echo "Hello PHP";

  $file = fopen("2018-2019_890_ks4final.csv","r");
  while(! feof($file))
  {
  print_r(fgetcsv($file));
  }
fclose($file);


?>
