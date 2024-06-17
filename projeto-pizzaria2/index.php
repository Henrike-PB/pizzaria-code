<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcurt icon" href="media/short-icon.png">
    <title>Pizzaria Code</title>
    <link rel="stylesheet" href="php.css">

    <!-- Efeito do AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

     <!-- efeito de revelar no scroll, função localizada em script.js -->
     <script src="https://unpkg.com/scrollreveal"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+SK:wght@100..400&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Box Icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<?php
$mensagem = '';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Conexão com o banco de dados 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pedidos_pizza";

    // Criando a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificando a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Recebendo os dados do formulário (verificando se estão definidos)
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $telefone = isset($_POST['numero']) ? $_POST['numero'] : '';
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
    $sabor = isset($_POST['sabor']) ? $_POST['sabor'] : '';
    $tamanho = isset($_POST['tamanho']) ? $_POST['tamanho'] : '';

    // Preparando a query SQL para inserção
    $sql = "INSERT INTO pedidos (nome, email, telefone, endereco, sabor, tamanho)
            VALUES ('$nome', '$email', '$telefone', '$endereco', '$sabor', '$tamanho')";

    // Executando a query e verificando se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        // Mensagem de sucesso
        $mensagem = "Pedido registrado com sucesso!";
    } else {
        $mensagem = "Erro ao registrar o pedido: " . $conn->error;
    }

    // Fechando a conexão com o banco de dados
    $conn->close();
}
?>


<body>

  

    <header class="bg-vermelho text-white text-center py-3">
    <nav>
        <div class="menu-hamburger">
            <button id="hamburger-btn" class="hamburger">&#9776;</button>
        </div>
        <ul class="nav justify-content-center" id="nav-menu">
            <li class="nav-item"><a class="nav-link text-white" href="#php.index">Home</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#cardapio">Cardápio</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#contato">Contato</a></li>
        </ul>
    </nav>
    </header>

    


   <div class="wave">
        <svg class="onda-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#7e1a22" fill-opacity="1" d="M0,192L21.8,208C43.6,224,87,256,131,250.7C174.5,245,218,203,262,197.3C305.5,192,349,224,393,245.3C436.4,267,480,277,524,266.7C567.3,256,611,224,655,229.3C698.2,235,742,277,785,272C829.1,267,873,213,916,213.3C960,213,1004,267,1047,272C1090.9,277,1135,235,1178,202.7C1221.8,171,1265,149,1309,165.3C1352.7,181,1396,235,1418,261.3L1440,288L1440,0L1418.2,0C1396.4,0,1353,0,1309,0C1265.5,0,1222,0,1178,0C1134.5,0,1091,0,1047,0C1003.6,0,960,0,916,0C872.7,0,829,0,785,0C741.8,0,698,0,655,0C610.9,0,567,0,524,0C480,0,436,0,393,0C349.1,0,305,0,262,0C218.2,0,175,0,131,0C87.3,0,44,0,22,0L0,0Z"></path>
        </svg>
</div>

    <!-- CONTEÚDO DO SITE -->
    <main class="conteudo">
       
            <!-- LOGOTIPO -->
            <div class="logo-icone" data-aos="fade-up">
                <img src="media/icone-pizzaria.png" alt="Logotipo da Pizzaria" class="img-fluid">
            </div>
        

            <!-- CARROSSEL -->
        <section class="section2 container mb-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://cdn.pixabay.com/photo/2020/06/08/16/49/pizza-5275191_640.jpg" class="d-block w-100" alt="Pizza 1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.pixabay.com/photo/2017/12/05/20/08/pizza-3000273_640.jpg" class="d-block w-100" alt="Pizza 2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.pixabay.com/photo/2015/04/07/19/49/pizza-711662_1280.jpg" class="d-block w-100" alt="Pizza 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <!-- CARDÁPIO -->
        <section id="cardapio" class="text-center mb-5"  data-aos="fade-down">
            <h2 class="frase text-verde">Cardápio</h2>
        </section>

        <section class="menu cardapio"  data-aos="fade-up"
     data-aos-anchor-placement="top-bottom">
        <div class="menu-item">
            <img src="media/java-pizza.jpg" alt="Pizza Java">
            <div class="item-details">
                <h3 class="item-name">Pizza Java</h3>
                <p class="item-description">Deliciosa pizza com ingredientes tradicionais e sabor inconfundível.</p>
            </div>
        </div>
        
        <div class="menu-item">
            <img src="media/js-pizza.jpg" alt="Pizza JavaScript">
            <div class="item-details">
                <h3 class="item-name">Pizza JavaScript</h3>
                <p class="item-description">Pizza com ingredientes frescos e um toque de modernidade.</p>
            </div>
        </div>
        
        <div class="menu-item">
            <img src="media/c-pizza.jpg" alt="Pizza C">
            <div class="item-details">
                <h3 class="item-name">Pizza C</h3>
                <p class="item-description">Pizza clássica com ingredientes selecionados para satisfazer seu paladar.</p>
            </div>
        </div>
        
        <div class="menu-item">
            <img src="media/python-pizza.jpg" alt="Pizza Python">
            <div class="item-details">
                <h3 class="item-name">Pizza Python</h3>
                <p class="item-description">Pizza autêntica com uma combinação única de sabores.</p>
            </div>
        </div>
        
        <div class="menu-item">
            <img src="media/ruby-pizza.jpg" alt="Pizza Ruby">
            <div class="item-details">
                <h3 class="item-name">Pizza Ruby</h3>
                <p class="item-description">Pizza sofisticada com ingredientes frescos e cuidadosamente selecionados.</p>
            </div>          
        </div>

        <div class="menu-item">
            <img src="media/php-pizza.jpg" alt="Pizza PHP">
            <div class="item-details">
                <h3 class="item-name">Pizza PHP</h3>
                <p class="item-description">Pizza rústica com ingredientes raros e cuidadosamente selecionados.</p>
            </div>
    </section>

        <!-- FRASE DE AÇÃO -->
        <section class="text-center mb-5"  data-aos="fade-right">
            <h2 class="frase text-verde">Faça seu Pedido</h2>
        </section>

        <!-- MENSAGEM DE PEDIDO -->
        <div class="container-mensagem">
        <?php if ($mensagem): ?>
           <div class="mensagem">
              <?php echo $mensagem; ?>
              
              <style>
              .container-mensagem {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            margin-top: 50px;
            display: <?php echo $mensagem ? 'block' : 'none'; ?>;
        }
        .mensagem {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            border-radius: 8px;
            animation: fadeInOut 3s ease;
        }
        @keyframes fadeInOut {
            0% { opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { opacity: 0; }
        }
              </style>
           </div>
           <?php endif; ?>
        </div>

        <!-- FORMULÁRIO -->
        <section class="section3 container mb-5">
            <div class="formulario bg-light p-4 rounded shadow">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@email.com" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Telefone</label>
                        <input type="number" class="form-control" id="numero" name="numero" placeholder="(51) 99999-9999" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua fulano de tal" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="sabor" class="form-label">Sabor</label>
                        <select class="form-select" id="sabor" name="sabor" required>
                            <option value="">Selecione o sabor</option>
                            <option value="Java">Java</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="C">C</option>
                            <option value="Python">Python</option>
                            <option value="Ruby">Ruby</option>
                            <option value="PHP">PHP</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tamanho" class="form-label">Tamanho</label>
                        <select class="form-select" id="tamanho" name="tamanho" required>
                            <option value="">Selecione o tamanho</option>
                            <option value="Pequeno">Pequeno / R$ 35,00</option>
                            <option value="Médio">Médio / R$ 45,90</option>
                            <option value="Grande">Grande / R$ 69,90</option>
                        </select>
                    </div>
                    <button type="submit" class="botao">Faça seu pedido!</button>
                </form>
            </div>
        </section>
    </main>

    <svg class="onda-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#7e1a22" fill-opacity="1" d="M0,64L34.3,90.7C68.6,117,137,171,206,170.7C274.3,171,343,117,411,112C480,107,549,149,617,186.7C685.7,224,754,256,823,256C891.4,256,960,224,1029,229.3C1097.1,235,1166,277,1234,266.7C1302.9,256,1371,192,1406,160L1440,128L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>


        <!-- FOOTER -->
    <footer id="contato" class="footer" style="visibility: visible;">
    
                <div class="footerContent">
                 

                    <div class="buttons-footer" data-aos="zoom-out-up">
                        <a title="LinkedIn" href="https://www.linkedin.com/in/henrikebraga/">
                            <i class="bx bxl-linkedin-square"></i>
                        </a>
                        <a title="GitHub" href="https://github.com/Henrike-PB">
                            <i class="bx bxl-github"></i>
                        </a>
                        <a title="Instagram" href="https://www.instagram.com/dev_henrike/">
                            <i class="bx bxl-instagram"></i>
                        </a>
                    </div>
                    
                

                </div>

                
                <p class="copy-footer">&copy; 2024 Desenvolvido por Dupla Dinâmica | Todos os direitos reservados. </p>
            </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

   <!-- AOS  -->
   <script>
  AOS.init();
</script>

    <!-- js principal -->
    <script src="script.js"></script>
    
</body>

</html>
