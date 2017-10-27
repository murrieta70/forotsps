<?php

$cha = '
<pre>
echo \'<br>\'.$txt;
</pre>
I have for example 2 Entities: User and Post. 
I want to have OneToMany relation( one User has many Posts) but I don\'t know how to do 
that. I\'ve used yii2-user module to have authorization, registration etc. 
That works fine but now I faced in question how to create that relation. 
I\'ve created that in my Post model:
<pre>
<?php 
public function getUser()
{
    return $this->hasOne(User::className(),[\'id\' => \'user_id\']);
}
?>
</pre>
I\'ve created that in my Post model:

<pre>
public function getUser()
{
    return $this->hasOne(User::className(),[\'id\' => \'user_id\']);
}
</pre>
<br> Esto es todo amigos!!!
';



$partes = explode('<pre>',$cha);

foreach ($partes as $item=>$value){
   echo '<br>'. $item . ' = ' . $value;

   echo '<br>';
print_r(explode('</pre>', $value));

}
$partes = explode('<pre>',$cha);

$txt= '';

foreach ($partes as $value){
   $sub = explode('</pre>', $value);
   
   if( trim($sub[0]) != '' &&  count($sub) == 2 ) {
   	$code = str_replace(['<?=', '<?php', '<' ] , 
   	                    ['&lt;?=','&lt;?php', '&lt;'], 
                           $sub[0]);
      $txt .= '<pre>'.$code.'</pre>';
      $txt .= $sub[1]; 	
   } else {
   	   	
      $txt .= $sub[0];	

   }
}
echo '<hr>';
echo $txt;
/*
$begin = stripos($cha, '<pre>');
$end   = stripos($cha, '</pre>');

echo $begin . ' '. $end . '<br>'; 

$split = str_split( $cha, $begin);

//echo $split;

foreach ($split as $item=>$value){
echo '<br>'. $item . ' = ' . $value; 

}
*/
?>

<hr>
Cadena original<br>
<?= $cha?>
