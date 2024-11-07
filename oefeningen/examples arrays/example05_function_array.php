<?php
  echo ('in_array(5, array(1,2,4,5,9)) = '.in_array(5, array(1,2,4,5,9))."<br />");
  echo ('count(array(1,2,3,4)) = '.count(array(1,2,3,4))."<br />");
  echo("array_merge(array(1=>'a', 2=>'b'), array(2=>'c', 5=>'d')) = <pre>");
  print_r(array_merge(array(1=>'a', 2=>'b'), array(2=>'c', 5=>'d')));
  echo("</pre>");
  echo("array_merge(array('one'=>'a', 'two'=>'b'), array('two'=>'c', 'five'=>'d')) = <pre>");
  print_r(array_merge(array('one'=>'a', 'two'=>'b'), array('two'=>'c', 'five'=>'d')));
  echo("</pre>");
  
?>