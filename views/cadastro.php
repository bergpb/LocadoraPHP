<?php
	include "../scripts/usuarios.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/reset.css">
		<link rel="stylesheet" href="../css/style-home.css">
	
		<title>Cadastro de Usuários</title>
	</head>
	<body>
	<header>
	<div class="caixa">
		<img class="car-logo" src="../images/car-logo.png" width= 20%></img>
            <nav>
                <ul class="navegacao">
                    <li>
                        <a href="../index.php">Home</a>
                    </li>
                    <li>
                        <a href="#">Serviços</a>
                    </li>
                    <li>
                        <a href="#">Contatos</a>
                    </li>
                </ul>
            </nav>
        </div>	
	</header>
<?php

	//Instancio um objeto do tipo usuarios()
	$myuser = new usuarios();
	
	//Se chegam os dados incluindo o id, mostro o form preenchido e faço a alteração
	if(isset($_POST['f_nome']) and isset($_POST['f_mail']) and isset($_POST['f_senha']) and isset($_POST['f_id'])){
		$_SESSION["altera"]['f_nome'] = $_POST['f_nome'];
		$_SESSION["altera"]['f_mail'] = $_POST['f_mail'];
		$_SESSION["altera"]['f_id'] = $_POST['f_id'];
		echo "<fieldset><form method=POST action=./alterar.php>";
		echo "</br></br><p>Nome: <input type=text name=f_nome value=".$_POST['f_nome']."></p>";
		echo "<br/>";
		echo "<p>Email: <input type=text name=f_mail value=".$_POST['f_mail']."></p>";
		echo "<br/>";		
		echo "<input type=hidden name=f_id value=".$_POST['f_id'].">";
		echo "<tag><input type=submit value=Enviar></tag>";
		echo "</form></fieldset>";	
	}
	//Se chegam os dados exceto o id, faço a inserção do usuário
	elseif(isset($_POST['f_nome']) and isset($_POST['f_mail']) and isset($_POST['f_senha'])){
		$myuser->setNome($_POST['f_nome']);
		$myuser->setEmail($_POST['f_mail']);
		$myuser->setSenha(md5($_POST['f_senha']));
		$myuser->insert();
		echo "<fieldset><form method=POST action=".$_SERVER['PHP_SELF'].">";
		echo "</br></br><p>Nome: <input type=text name=f_nome></p>";
		echo "<br/>";
		echo "<p>Email: <input type=text name=f_mail></p>";
		echo "<br/>";
		echo "<p>Senha: <input type=password name=f_senha></p>";
		echo "<br/>";
		echo "<tag><input type=submit value=Enviar></tag>";
		echo "</form></fieldset>";		
	}
	//Se chega id e temp_senha... Faço o reset da Senha.
	elseif(isset($_POST['f_temp_senha']) and isset($_POST['f_id'])){
		$myuser->setSenha($_POST['f_temp_senha']);
		$myuser->setId($_POST['f_id']);
		$myuser->setNome($_POST['f_nome']);
		$myuser->setEmail($_POST['f_mail']);
		$myuser->update($myuser->getId());
		echo "<fieldset><form method=POST action=".$_SERVER['PHP_SELF'].">";
		echo "</br></br><p>Nome: <input type=text name=f_nome></p>";
		echo "<br/>";
		echo "<p>Email: <input type=text name=f_mail></p>";
		echo "<br/>";
		echo "<p>Senha: <input type=password name=f_senha></p>";
		echo "<br/>";
		echo "<tag><input type=submit value=Enviar></tag>";
		echo "</form></fieldset>";		
	}

	//Se chega somente o id faço a exclusão e mostro o formulário para cadastro
	elseif(isset($_POST['f_id'])){
		$myuser->setId($_POST['f_id']);
		$myuser->delete($_POST['f_id']);
		echo "</fieldset><form method=POST action=".$_SERVER['PHP_SELF'].">";
		echo "</br></br><p>Nome: <input type=text name=f_nome></p>";
		echo "<br/>";
		echo "<p>Email: <input type=text name=f_mail></p>";
		echo "<br/>";
		echo "<p>Senha: <input type=password name=f_senha></p>";
		echo "<br/>";
		echo "<tag><input type=submit value=Enviar></tag>";
		echo "</form></fieldset>";	
	}
	
	//Se nada chega via POST simplesmente mostro o formulário de cadastro
	else{
		echo "</fieldset><form method=POST action=".$_SERVER['PHP_SELF'].">";
		echo "</br></br><p>Nome: <input type=text name=f_nome></p>";
		echo "<br/>";
		echo "<p>Email: <input type=text name=f_mail></p>";
		echo "<br/>";
		echo "<p>Senha: <input type=password name=f_senha></p>";
		echo "<br/>";
		echo "<tag><input type=submit value=Enviar></tag>";
		echo "</form></fieldset>";				
	}
?>

	<p></p>
	<div>
		<table>
		  <tr>
			<th width="10%">NOME</th>
			<th width="10%">E-MAIL</th>
			<th width="10%">AÇÕES...</th>
		  </tr>
			<?php foreach($myuser->findAll() as $key=>$value):?>
				<tr>
					<td><?php echo "$value->nome";?></td>
					<td><?php echo "$value->email";?></td>
					<td>
						<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">	
							<input type="hidden" nome="f_nome" value=<?php echo "$value->nome";?>>
							<input type="hidden" name="f_mail" value=<?php echo "$value->email";?>>
							<input type="hidden" name="f_senha" value=<?php echo "$value->senha";?>>
							<input type="hidden" name="f_id" value=<?php echo "$value->id";?>>
							</br>
							<input type="submit" id="btn_alterar" value="Alterar">
						</form> 
						<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<input type="hidden" name="f_id" value=<?php echo "$value->id";?>>
							<input type="submit" id="btn_excluir" value="Excluir">
						</form>			
						<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<input type="hidden" name="f_id" value=<?php echo "$value->id";?>>						
							<input type="hidden" name="f_nome" value=<?php echo "$value->nome";?>>
							<input type="hidden" name="f_mail" value=<?php echo "$value->email";?>>
							<input type="hidden" name="f_temp_senha" value="123456">
							<input type="submit" id="btn_reset" value="Reset Senha">
							
						</form>				
					</td>
				</tr>
			<?php endforeach;?>	
		</table>
	</div>
	<footer>
        <p class="copyright">&copy; Copyright Rent a Car - 2020</p>
	</footer>
	</body>
</html>