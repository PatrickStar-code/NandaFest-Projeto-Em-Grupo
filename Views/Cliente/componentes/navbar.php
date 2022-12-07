<?php
	include_once("../conexao.php");
	include_once("./Classes/cliente.class.php");



	if (isset($_POST["enviar"])) {
		if (isset($_POST["enviar"])) {
			$user = $_POST["user"];
			$senha = $_POST["password"];
			$sql = "SELECT * FROM clientes WHERE login_cliente = '$user' and senha_cliente	= '$senha' ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$cod = $row["cod_cliente"];
					$nome = $row["nome_cliente"];
					$tel = $row["telefone_cliente"];
					$email = $row["email_cliente"];
					$cel = $row["celular_cliente"];
					$cidade = $row["cidade_cliente"];
					$cep = $row["cep_cliente"];
					$cpf = $row["cpf_cliente"];
					$img = $row["img_cliente"];
				}
				$cliente = new Cliente($cod, $nome, $tel, $email, $cel, $cidade, $cep, $cpf, $img);
				$_SESSION["Login"] = $cliente;
			} else {
				echo '<div id="toast-warning" class="fixed-bottom flex items-center p-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
				<div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
					<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
					<span class="sr-only">Warning icon</span>
				</div>
				<div class="ml-3 text-sm font-normal">Login ou senha incorretos.</div>
				<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
					<span class="sr-only">Close</span>
					<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
				</button>
			</div>';
			}
		}
	}
	?>
	<nav class="relative px-4 py-4 flex justify-between items-center bg-white">
		<a class="text-3xl font-bold leading-none" href="#">
			<!-- Colocar logo -->
			<img src="<?php echo $_SESSION["Empresa"]->img ?>" alt="" style="width: 120px;top: -12px;position: absolute;">
		</a>
		<div class="lg:hidden">
			<button class="navbar-burger flex items-center text-blue-600 p-3">
				<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<title>Mobile menu</title>
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
				</svg>
			</button>
		</div>
		<ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
			<li><a class="text-sm text-gray-400 hover:text-gray-500" href="./index.php">Início</a></li>
			<li class="text-gray-300">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
				</svg>
			</li>
			<li><a class="text-sm text-gray-400 hover:text-gray-500" href="./sobre_nos.php">Sobre nós</a></li>
			<li class="text-gray-300">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
				</svg>
			</li>
			<li><a class="text-sm text-gray-400 hover:text-gray-500" href="./temas.php">Temas</a></li>
			<li class="text-gray-300">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
				</svg>
			</li>
			
		</ul>
		<!-- Se logado aparecer isso-->
		<?php
		if (isset($_SESSION["Login"])) {
		?>
			<button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
				<span class="sr-only">Open user menu</span>
				<img class="w-8 h-8 rounded-full" src="<?php echo $_SESSION["Login"]->img ?>" alt="user photo">
			</button>
			<!-- Dropdown menu -->
			<div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow" id="user-dropdown">
				<div class="px-4 py-3">
					<span class="block text-sm text-gray-900 "><?php echo $_SESSION["Login"]->nome ?></span>
					<span class="block text-sm font-medium text-gray-500 truncate "><?php echo $_SESSION["Login"]->em ?></span>
				</div>
				<ul class="py-1" aria-labelledby="user-menu-button">
					<li>
						<a href="./perfil.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Perfil</a>
					</li>
					<li>
						<a href="./agenda.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Agenda</a>
					</li>
					<li>
						<a href="./chat.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Fale Conosco</a>
					</li>
					<li>
						<a href="./deslogar.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Deslogar</a>
					</li>
				</ul>
			</div>
		<?php } else { ?>
			<!-- 
        Se não
        Botoes logar deslogar 
      -->

			<a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold  rounded-xl transition duration-200" href="./cadastrar.php">Registrar-se</a>
			<a class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200" href="#" data-modal-toggle="authentication-modal">Logar</a>
		<?php } ?>
	</nav>
	<div class="navbar-menu relative z-50 hidden">
		<div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
		<nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
			<div class="flex items-center mb-8">
				<a class="mr-auto text-3xl font-bold leading-none" href="#">
					<!-- Colocar logo -->
					<img src="" alt="">
				</a>
				<button class="navbar-close">
					<svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
					</svg>
				</button>
			</div>
			<div>
				<ul>
					<li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="./index.php">Início</a>
					</li>
					<li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="./sobre_nos.php">Sobre nós</a>
					</li>
					<li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="./temas.php">Temas</a>
					</li>
				</ul>
			</div>
			<div class="mt-auto">
				<!-- Botoes Menu Se Não estiver logado -->
				<?php if (!isset($_SESSION["Login"])) { ?>
					<div class="pt-6">
						<a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl" href="./cadastrar.php">Registrar-se</a>
						<a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-blue-600 hover:bg-blue-700  rounded-xl" data-modal-toggle="authentication-modal">Logar</a>
					</div>
					<p class="my-4 text-xs text-center text-gray-400">
						<span>Copyright © 2021</span>
					</p>
				<?php } ?>
			</div>
		</nav>
	</div>

	<button   id="topButton"
        class="fixed z-10  p-3 bg-gray-300 rounded-full drop-shadow-xl bottom-10 right-10">
        <img src="../Imgs/icons8-whatsapp-48.png" alt="To aqui">
    </button>

	<!-- MODAL RESPONSAVEL PELO LOGIN -->
	<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 w-full md:inset-0 h-modal md:h-full">
		<div class="relative w-full max-w-md h-full md:h-auto">
			<!-- Modal content -->
			<div class="relative bg-white rounded-lg shadow ">
				<button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-toggle="authentication-modal">
					<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
					</svg>
					<span class="sr-only">Close modal</span>
				</button>
				<div class="py-6 px-6 lg:px-8">
					<h3 class="mb-4 text-xl font-medium text-gray-900">Realize o Login</h3>
					<form class="space-y-6" action="#" method="POST">
						<div>
							<label for="user" class="block mb-2 text-sm font-medium text-gray-900 ">Usuario</label>
							<input type="text" name="user" id="user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
						</div>
						<div>
							<label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Senha</label>
							<input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required>
						</div>

						<button type="submit" name="enviar" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login</button>
						<div class="text-sm font-medium text-gray-500 ">
							Não esta cadastrado? <a href="./cadastrar.php" class="text-blue-700 hover:underline ">Registre-se</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- CHAT -->
	<?php if(isset($_SESSION["Login"])){ ?>


	<?php } ?>
	<script>
		// Burger menus
		document.addEventListener('DOMContentLoaded', function() {
			// open
			const burger = document.querySelectorAll('.navbar-burger');
			const menu = document.querySelectorAll('.navbar-menu');

			if (burger.length && menu.length) {
				for (var i = 0; i < burger.length; i++) {
					burger[i].addEventListener('click', function() {
						for (var j = 0; j < menu.length; j++) {
							menu[j].classList.toggle('hidden');
						}
					});
				}
			}

			// close
			const close = document.querySelectorAll('.navbar-close');
			const backdrop = document.querySelectorAll('.navbar-backdrop');

			if (close.length) {
				for (var i = 0; i < close.length; i++) {
					close[i].addEventListener('click', function() {
						for (var j = 0; j < menu.length; j++) {
							menu[j].classList.toggle('hidden');
						}
					});
				}
			}

			if (backdrop.length) {
				for (var i = 0; i < backdrop.length; i++) {
					backdrop[i].addEventListener('click', function() {
						for (var j = 0; j < menu.length; j++) {
							menu[j].classList.toggle('hidden');
						}
					});
				}
			}
		});
	</script>

