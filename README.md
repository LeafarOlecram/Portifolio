# Portifolio
Desenvolvimento básico utilizando HTML, CSS e PHP para realizar apresentação pessoal.

O site contitui-se de quatro arquivos, pois foi necessário adaptar para poder hospedalo gratuitamente no site Infinity Free, pois ele não aceitava fazer o upload dos arquivos da pasta vendor e .env. Por este motivo, foi preciso montar o arquivo config.php para conter os dados pessoais que fariam a ligação no serviço SMTP do Gmail e do serviço de reCaptcha para evitar Spam's. 

- Funcionamento:
  - Index.php:
    O arquivo index.php contém a páginação inicial com a apresentação de texto, link's para consulta dos projetos feitos e o formulário para contato com a verificação reCaptcha.

  - Contact.php:
    O arquivo contact.php funciona como um backend, apenas recebendo as informações do formulário e realizando verificação. Ele verifica se o reCaptcha e se os dados de nome, email e mensagem foram preenchidos.
  - Config.php:
    O config.php é onde se coloca as credenciais que o contact.php vai usar para conectar para enviar mensagem para seu email no servidor SMTP e as chaves necessárias para a validação do reCaptcha. Os dados foram usado em constantes que o contact.php usa.

  - PHPMailer:
    O PHPMailer já tem um repositório no GitHub. No meu caso especifico, precisei usar ele de forma standalone para funcionar no site que precisava, visto que não conseguia usar a pasta vendor que continha as dependências. É a dependência usada para comunicar e validar o envio de mensagem para o Gmail.
