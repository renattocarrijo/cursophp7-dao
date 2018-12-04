<!--<html>
 <head>
 <title> TESTE </title>
 <meta name="description" content="teste">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
 </head>
    

 
 <body>
  
<form action=".php" method="post">

<fieldset>
 <legend>Consulta</legend>
 <table cellspacing="10">
  <tr>
   <td>
    <label for="nome">Login: </label>
   </td>
   <td align="left">
    <input type="text" name="email">
   </td>

  </tr>
   
   <tr>
   <td>
    <label for="sobrenome">Senha: </label>
   </td>
   <td align="left">
    <input type="text" name="sobrenome">
   </td>
  </tr>
  
  
 </table>
</fieldset>



    <fieldset>
 <legend>Cadastro</legend>
 <table cellspacing="10">
  <tr>
   <td>
    <label for="nome">Login: </label>
   </td>
   <td align="left">
    <input type="text" name="email">
   </td>
  </tr>
   
   <tr>
   <td>
    <label for="sobrenome">Senha: </label>
   </td>
   <td align="left">
    <input type="text" name="sobrenome">
   </td>
  </tr>  
 </table>
</fieldset>

<fieldset>
 <legend>Login</legend>
 <table cellspacing="10">
  <tr>
   <td>
    <label for="nome">Login: </label>
   </td>
   <td align="left">
    <input type="text" name="email">
   </td>

  </tr>
   
   <tr>
   <td>
    <label for="sobrenome">Senha: </label>
   </td>
   <td align="left">
    <input type="text" name="senha">
   </td>
  </tr>
  
  
 </table>
</fieldset>

<br />

<input type="submit">
<input type="reset" value="Limpar">
</form>

 </body>
</html> -->

<?php

require_once("config.php");

$sql = new Sql();

echo "<strong>E X E M P L O 02: Todos os usuários da tb_usuarios!</strong><hr>";

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

//var_dump($usuarios);

foreach ($usuarios as $key) {
    echo 
    
    "<strong>Id usuário: </strong>"        . $key['idusuario']."<br>".
    "<strong>Login: </strong>"             . $key['deslogin']."<br>".
    "<strong>Senha: </strong>"             . $key['dessenha']."<br>".
    "<strong>Data do cadastro: </strong>"  . $key['dtcadastro']."<br><hr>";
}

echo "<hr>";

echo "<strong>E X E M P L O 03: Carregando os usuários de um determinado 'idusuario' = 2:</strong> <hr>";

$user = new Usuario();

$user->loadById(2);

//var_dump($user);

echo     
    "<strong>Id usuário: </strong>"        . $user->getIdusuario()."<br>".
    "<strong>Login: </strong>"             . $user->getDeslogin()."<br>".
    "<strong>Senha: </strong>"             . $user->getDessenha()."<br>",
    "<strong>Data cadastro: </strong>"     . $user->getDtcadastro()->format('d/m/Y').
    "<hr>";

echo "<strong>E X E M P L O 04: </strong> Método getList() - retorna sql com toda os dados da tb_usuarios<hr>";

$userList = Usuario::getList();

//var_dump($userList);

foreach ($usuarios as $key) {
    echo 
    
    "<strong>Id usuário: </strong>"        . $key['idusuario']."<br>".
    "<strong>Login: </strong>"             . $key['deslogin']."<br>".
    "<strong>Senha: </strong>"             . $key['dessenha']."<br>".
    "<strong>Data do cadastro: </strong>"  . $key['dtcadastro']."<br><hr>";
}

echo "<strong>E X E M P L O 05: </strong> Método search() - carrega uma lista buscando por parte do login! <hr>";

$search = Usuario::search("i"); // MÉTODO ESTATICO NÃO PRECISA SER INSTANCIADO.

//var_dump($search);

foreach ($search as $key) {
    echo 
    
    "<strong>Id usuário: </strong>"        . $key['idusuario']."<br>".
    "<strong>Login: </strong>"             . $key['deslogin']."<br>".
    "<strong>Senha: </strong>"             . $key['dessenha']."<br>".
    "<strong>Data do cadastro: </strong>"  . $key['dtcadastro']."<br><hr>";
}

echo "<strong>E X E M P L O 06: </strong> Método login() - verificar usuário e senha! <hr>";
$login = new Usuario();

$login->login("felipy","365451");

//var_dump($login);

echo "Usuário <strong>".$login->getDeslogin()." </strong>logado!<br><hr>"; 

echo "<strong>E X E M P L O 07: </strong> Método insert - inserindo um novo usuário na tb_usuarios! <hr>"; 

/* $inserir = new Usuario("Priscilla", "123456789");

$inserir->insert();

echo 
    
    "<strong>Id usuário: </strong>"        . $inserir->getIdusuario()."<br>".
    "<strong>Login: </strong>"             . $inserir->getDeslogin()."<br>".
    "<strong>Senha: </strong>"             . $inserir->getDessenha()."<br>".
    "<strong>Data do cadastro: </strong>"  . $inserir->getDtcadastro()->format('d/m/Y')."<br><hr>";

*/
echo "<strong>E X E M P L O 08: </strong> Método update ! <hr>"; 

$update = new Usuario();

$update->loadById(145); // carregando o usuário 145

$update->update("teste", "&@*#&@");

echo $update;


?>