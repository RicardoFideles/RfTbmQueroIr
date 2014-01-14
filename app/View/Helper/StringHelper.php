<?php
/* /app/View/Helper/StringHelper.php */
App::uses('AppHelper', 'View/Helper');
App::uses('Multibyte', 'I18n');
App::uses('Inflector', 'Utility');

class StringHelper extends AppHelper {
	
	
	public function truncate ($str, $length=10, $trailing='...') {
 
      $length-=mb_strlen($trailing);
 
      if (mb_strlen($str)> $length) {
         return mb_substr($str,0,$length).$trailing;
	  } else {
         $res = $str;
      }
 
      return $res;
	}
    
}