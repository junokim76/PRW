<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Farmacia doBairro - CTDS - PRW  </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body>
 <h1> - Farmacia - </h1>

	<?php
	//define("DESCONTOCARTAO", 5/100);
	define("DESCONTO70",5/100);
	define("DESCONTOMAIS70",7/100);
	//Testa se vem dados
	$validaEntradaRadio = isset($_POST ['faixaEtaria']);
	$cartaoFidelidade = isset($_POST ['cartaoFidelidade']);
	
	if($validaEntradaRadio == false){
		exit("<p>AVISO: Favor selecione uma opção! <br>
			!!! Aplicação Encerrada !!!
			</p>"); //or die
	}
	//Valida cartao Fidelidade
	if ($cartaoFidelidade){
		$cartaoFidelidade = 0.05;
		$msg =  "<br>Caro Associado(a), <br>Muito bom ter sempre você conosco. <br>Aproveite seu desconto!!!";
	} else {
		$cartaoFidelidade = 0;
		$msg =	"<br>Caro Cliente, <br>Você NÃO é um associado(a),<br> Solicite mais informações a um de nossos atendentes!";
	} 

		//Recebe Valor das variaveis
$nomeCliente = $_POST ['nomeCliente'];
$valorTotalCompra = $_POST['valorTotalCompra'];
$faixaEtaria = $_POST ['faixaEtaria'];

//BOAS VINDAS
echo "<br><fieldset><p>Farmacia doBairro - Bem Vindo(a)  <span> $nomeCliente !!!</span><br></p></fieldset>";
	
	if ($faixaEtaria == 71){
		echo "<fieldset><p><span> Faixa Etária: Acima 70 </p></fieldset> ";
		$descontoCompra = $valorTotalCompra * (DESCONTOMAIS70 + $cartaoFidelidade) ;
				
	} else if ($faixaEtaria == 70){
		echo"<fieldset><p> Faixa Etária: 55 - 70 </p></fieldset>";
		$descontoCompra = $valorTotalCompra * (DESCONTO70 + $cartaoFidelidade);

	} else {
		echo"<fieldset><p> Faixa Etária: 0 -54  </p></fieldset>";
		$descontoCompra = $valorTotalCompra * $cartaoFidelidade;
	}
	$compraCliente = $valorTotalCompra - $descontoCompra;

	 echo "	<fieldset><p><span> Valor Total da Compra: R$ $valorTotalCompra </span><br>
			- Valor do desconto para o cliente = <span> R$ $descontoCompra </span> <br>
			- Valor da Total Compra  => <span> R$ $compraCliente </span> <br> 
			<span> $msg </span> <br><br>
			</fieldset>

			<fieldset><p><font size = '2'>
			- Mostra entrada Radio => $validaEntradaRadio <br>
			- Mostra Faixa Etária =>  $faixaEtaria <br>
			- Desconto Cartão Fidelidade (%) => $cartaoFidelidade <br>
			</fieldset></p>";
			
	 ?>
</body> 
</html> 