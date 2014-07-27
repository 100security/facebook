<?php
/*
Marcos Henrique
marcos@marcoshenrique.com
@100security
www.100security.com.br
*/

// $id ='648521495';
$id ='marcoshenrique.face';
    $facebook = file_get_contents("https://graph.facebook.com/$id");
    $facebook = preg_replace('~[{}\\\\\"]~','',$facebook).'<br>';
    $exibir = explode(',',$facebook);
echo '<pre>';
print_r ($exibir);

echo '<hr>';

$id_i = 648521495;
$id_f = 648521495;

for ($x = $id_i; $x <= $id_f; $x++)
{
   $facebook= file_get_contents("http://graph.facebook.com/$x");

   $objeto=json_decode($facebook);

   $id = $objeto->id;
   $usuario = $objeto->username;
   $nome = $objeto->name;
   $sexo = ucfirst($objeto->gender);
   $idioma = strtolower($objeto->locale);
   $perfil = $objeto->link;
   if(!$id) continue; // Nao exibe $id excluidos.
   echo "<br>";
   echo "<b>ID: </b>".$id."<br>";
   echo "<b>Usuario: </b>".$usuario.'</b></font><br>';
   echo "<b>Nome: </b>".$nome.'<br>';
   echo "<b>Sexo: </b>".$sexo.'<br>';
   echo "<b>Idioma: </b>".$idioma.'<br>';
   echo "<b>Perfil: </b><a href=".$perfil." target='_blank'>".substr($perfil,8)."</a>";
   echo "<br>";
}

?>