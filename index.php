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

foreach ($usuarios as $key) {
    echo 
    
    "<strong>Id usuário: </strong>"        . $key['idusuario']."<br>".
    "<strong>Login: </strong>"             . $key['deslogin']."<br>".
    "<strong>Senha: </strong>"             . $key['dessenha']."<br>".
    "<strong>Data do cadastro: </strong>"  . $key['dtcadastro']."<br><hr>";
}

echo "<hr>";

echo "<strong>E X E M P L O 03: Carregando os usuários de um determinado 'idusuario' = 17:</strong> <hr>";

$user = new Usuario();

$user->loadById(17);

echo     
    "<strong>Id usuário: </strong>"        . $user->getIdusuario()."<br>".
    "<strong>Login: </strong>"             . $user->getDeslogin()."<br>".
    "<strong>Senha: </strong>"             . $user->getDessenha()."<br>",
    "<strong>Data cadastro: </strong>"     . $user->getDtcadastro()->format("d/m/Y").
    "<hr>";

echo "<strong>E X E M P L O 04: </strong> Método getList() - retorna sql com toda os dados da tb_usuarios<hr>";

$userList = Usuario::getList();

foreach ($usuarios as $key) {
    echo 
    
    "<strong>Id usuário: </strong>"        . $key['idusuario']."<br>".
    "<strong>Login: </strong>"             . $key['deslogin']."<br>".
    "<strong>Senha: </strong>"             . $key['dessenha']."<br>".
    "<strong>Data do cadastro: </strong>"  . $key['dtcadastro']."<br><hr>";
}

echo "<strong>E X E M P L O 05: </strong> Método search() - carrega uma lista buscando por parte do login! <hr>";

$search = Usuario::search("i");

foreach ($search as $key) {
    echo 
    
    "<strong>Id usuário: </strong>"        . $key['idusuario']."<br>".
    "<strong>Login: </strong>"             . $key['deslogin']."<br>".
    "<strong>Senha: </strong>"             . $key['dessenha']."<br>".
    "<strong>Data do cadastro: </strong>"  . $key['dtcadastro']."<br><hr>";
}

echo "<strong>E X E M P L O 06: </strong> Método login() - verificar usuário e senha! <hr>";
$login = new Usuario();

$login->login("teste","teste");

echo "Usuário <strong>".$login->getDeslogin()." </strong>logado!";






?>