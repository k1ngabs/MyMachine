<?php
session_start();
include_once('includes/components/functions.php');
include_once('includes/components/connect.php');
if($_GET['h']){
	$h=$_GET['h'];
    $_SESSION["msg"]=''; //inicializa msg
	

	$array = array($h);


	$linha=pesquisarPessoaEmail($connect,$array);

	if($linha)
	{

		$array=array($linha['codpessoa']);

		$retorno=alterarStatustrue($connect,$array);
		
		if($retorno)
		{
			
		
			   $_SESSION["msg"]= "Cadastro Validado - Entre com seu email e senha";

		}
		else
		{
			   $_SESSION["msg"]= 'Problema na validação';
			   
		}	
	}

	else
	{
		$_SESSION["msg"]= 'Problema na validação';
	}	

header("Location:index.php");
	
}
