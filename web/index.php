<title>:: 100 SECURITY ::</title>
<!--
Marcos Henrique
marcos@marcoshenrique.com
@100security
www.100security.com.br
-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><style type="text/css">
<!--
body {
	background-color: #E9EAED;
}
.style7 {color: #FFFFFF}
.style8 {
	font-family: Calibri;
	font-size: 18px;
}

#search-main {
	margin: 10px auto 20px; width: 80%; text-align: center; clear: both; font-size: 1.4em;
}
#search-main input {
	padding: 6px; font-size: 1.1em;
}
#search-submit {
	width: 20px; height: 20px; margin-left: 4px; vertical-align: text-bottom;
}
.style11 {color: #45619D}

body
{ 
background-image:url('top.jpg');
background-repeat:no-repeat;
background-attachment:fixed;
}

a:link {
color:#47639E;
text-decoration:none; 
}
a:visited {
color:#47639E;
text-decoration:none;
}
a:hover {
color:#47639E;
text-decoration:none;
}
a:active {
color:#47639E;
text-decoration:none;
}
.style14 {
	color: #45619D;
	font-size: 18px;
}
</style>
<body>
<div>
   <div>
   <form id="search-main" method="GET">
   <p><span class="style5 style7 style8"><br>
   <img class="teste" src="facebook.png" width="258" height="53" /></span></p>
   <p><span class="style5 style7 style8"><br /> 
   <span class="style11"><br>
   <br>
   Insira um Intervalo de IDs para realizar a pesquisa.<br>
   <br>
   Caso queira descobrir seu ID do Facebook digite o nome do usuário nos dois campos abaixo.<br>
   </span></span><br />
   <input name="id_i" type="text" size="15" value="ID Inicial" onFocus="javascript:this.value=''" />
   <span class="style14">até</span>
   <input name="id_f" type="text" size="15" value="ID Final" onFocus="javascript:this.value=''" />
   <input value="Exibir" type="submit" />
   </p>
</form>  
</div></div>
<div class="center">
<div align="center"><span style="background:#FFF; text-align:left; padding:20px; border-radius:20px; float:left;">
<?php 

$meta = get_meta_tags($_GET['id_i']); // Armazena do ID informado no Formulário.

// id_i = ID Inicial
// id_f = ID Final

for ($i = $_GET['id_i']; $i <= $_GET['id_f']; $i++) // De acordo com os IDs informados realize o processo de exibição.
{
        $facebook= file_get_contents("http://graph.facebook.com/$i"); // Exibe o Array através do ID informado.
        $miniatura = file_get_contents("https://graph.facebook.com/?ids=$i&fields=picture");
        $miniatura = preg_replace('~[{}\\\\\"]~','',$miniatura).'<br>';
        $foto = explode(',',$miniatura);
		
		$objeto=json_decode($facebook);
        
		$id = $objeto->id; // $id = Armazena o ID.
		$usuario = $objeto->username; // $usuario = Armazena o Usuário do Facebook.
		$nome = $objeto->name; // $nome - Armazena o Nome Completo do Usuário ( Nome + Sobrenome ) informados no Perfil.
		$sexo = ucfirst($objeto->gender); // $sexo - Armazena o Sexo ( Male = Masculino or Female = Feminino ) e ucfirt = Exibe a primeira letra em MAIÚSCULO.
		$idioma = strtolower($objeto->locale); // $idiome = Armaneza o Idioma do Perfil e strtolower = Exibe todo o texto em minúsculo.
		$perfil = $objeto->link; // $perfil = Armaneza a URL do Perfil (https://www.facebook.com/marcoshenrique.face)
        if(!$id) continue; // Nao exibe $id excluidos.
		echo "<br>";
		echo "<img src=".substr($foto[1],4)."><br>"; //Foto do Perfil (miniatura)
		echo "<font face=Calibri color=#000000><b>ID: </b>".$id."<br>";
        echo "<font face=Calibri color=#000000><b>Usuário: </b>"."<font face=Calibri color=#FF0000><b>".$usuario.'</b></font><br>';
        echo "<font face=Calibri color=#000000><b>Nome: </b>".$nome.'<br>';
        echo "<font face=Calibri color=#000000><b>Sexo: </b>".$sexo.'<br>';
        echo "<font face=Calibri color=#000000><b>Idioma: </b>".$idioma.'<br>';
        echo "<font face=Calibri color=#000000><b>Perfil: </b><a href=".$perfil." target='_blank'>".substr($perfil,8)."</a><br>"; // substr '8' - Remove o https://
        echo "<br>";
}

?>
</span> </div></div></div></p>

<!-- Google Analytics -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27791585-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>