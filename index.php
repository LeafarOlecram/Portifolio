<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Meu Portfólio</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        document.getElementById('formContato').addEventListener('submit', function(e){
            e.preventDefault(); // evita envio imediato

            let nome = this.nome.value.trim();
            let email = this.email.value.trim();
            let mensagem = this.mensagem.value.trim();

            if(nome === "" || email === "" || mensagem === ""){
                document.getElementById('feedback').innerText = "Preencha todos os campos!";
                return;
            }

            if(!email.includes("@")){
                document.getElementById('feedback').innerText = "Email inválido!";
                return;
            }

            this.submit(); // se passou nas validações, envia o formulário
        });
    </script>
    <body>
        <header>
            <h1>Olá, eu sou Marcelo R. L. Alves</h1>
            <p>Desenvolvedor Web | Freelancer</p>
            <nav>
                <a href="#projetos">Projetos</a>
                <a href="#contato">Contato</a>
            </nav>
        </header>

        <section id="sobre">
            <h2>Sobre Mim</h2>
            <img src="images/WhatsApp%20Image%202025-08-14%20at%2017.14.50.jpeg" alt="">
            <p>Sou desenvolvedor iniciante com experiência em HTML, CSS, JS e PHP. Estou criando projetos para meu portfólio e aprimorar minhas habilidades.<br>
                <br>🎓 Formação Técnica e Superior em Andamento<br>
                Formado como Técnico em Informática pelo IFMS – Campus Corumbá, atualmente curso Bacharelado em Sistemas de Informação na UFMS – Campus do Pantanal (CPAN), com foco em tecnologia e cibersegurança.<br>
                <br>
                🔐 Trilha de Formação em Cibersegurança e Pentest<br>
                Atualmente estou em formação na Trilha Profissionalizante da Cisco Networking Academy para Analista de Cibersegurança Júnior — já concluí o segundo curso, iniciei o terceiro e sigo avançando nos módulos até o exame final de certificação. Paralelamente, estou iniciando o curso Cybersecurity 101 pela plataforma TryHackMe, com foco em fundamentos de testes de penetração, mapeamento de vulnerabilidades e práticas de segurança ofensiva, utilizando ambientes virtuais como o Kali Linux.<br>
                <br>
                🧠 Habilidades e Conhecimentos em Desenvolvimento
            <ul>
                <li>Suporte técnico em informática e redes</li>
                <li>Fundamentos de segurança da informação (CIA, ataques, resposta a incidentes)</li>
                <li>Ambientes de laboratório com máquinas virtuais (VirtualBox, Kali Linux)</li>
                <li>Ferramentas como Nmap, Wireshark, Burp Suite</li>
                <li>Desenvolvimento Web Fullstack com HTML, CSS, JS e PHP</li>
                <li>Programação em Python, Java e C++</li>
            </ul>
            🚀 Objetivo Profissional<br>
            Busco oportunidades de estágio, aprendizado prático e projetos colaborativos para aplicar e expandir meus conhecimentos na área de Segurança da Informação.<br>
            <br>
            🤝 Aberto a conexões, mentorias e trocas de experiência com profissionais e entusiastas da área de TI e Cibersegurança.
            </p>
        </section>

        <section id="projetos">
            <h2>Meus Projetos</h2>
            <div class="cards">
                <div class="card">
                    <h3>Portifólio</h3>
                    <p>Desenvolvimento básico utilizando HTML, CSS, JS e PHP para realizar apresentação pessoal e receber email de contato.</p>
                    <a href="https://github.com/LeafarOlecram/Portifolio">Ver mais</a>
                </div>
                <div class="card">
                    <h3>Projeto 2</h3>
                    <p>Em breve disponível.</p>
                    <a href="https://github.com/LeafarOlecram/">Ver mais</a>
                </div>
            </div>
        </section>

        <section id="contato">
            <h2>Contato</h2>
            <form id="formContato" method="POST">
                <input type="text" name="nome" placeholder="Seu nome" required>
                <input type="email" name="email" placeholder="Seu email" required>
                <textarea name="mensagem" placeholder="Sua mensagem" required></textarea>
                <div class="g-recaptcha" data-sitekey="6LdbG6wrAAAAAAYEh53JUBuon7EqbN5P_-XpzkyA" data-action="LOGIN"></div>
                <button type="submit">Enviar</button>
            </form>
            <div id="resposta"></div>

            <script>
                document.getElementById("formContato").addEventListener("submit", async function(e) {
                    e.preventDefault();

                    let formData = new FormData(this);

                    let resposta = await fetch("contact.php", {
                        method: "POST",
                        body: formData
                    });

                    let resultado = await resposta.json();
                    document.getElementById("resposta").innerHTML = resultado.message;
                });
            </script>
        </section>

        <footer>
            <p>© 2025 Marcelo R. L. Alves. Todos os direitos reservados.</p>
        </footer>
    </body>
</html>