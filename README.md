Seja Bem vindo 
---------------------------------------


## Documentação da framework  - codeingniter
 * [Doc. framework](https://codeigniter.com/userguide3/index.html) - 
 

************
* Caso não consiga instalar o sistema por favor entre em contato pelo email: adrianobr00@gmail.com
************

************
Intruções de instalação e configuração
---------------------------------------

************
* Requerimento

    - PHP >= 5.5
    - MySQL

    Extensões 
        - cURL
        - GD
        - MySQLi

Instalando com o assistente de instalação

    Ambiente Linux 
        - Atribua www-data como dono dos arquivos e pastas do sistema (sudo chown www-data -R *) - Execute dentro da raiz da pasta do sistema 
        - Atribua permissão nos arquivos (sudo chmod 755 -R *) - Execute dentro da raiz da pasta do sistema 
        - Crie o banco de dados no MySQL e um usuário dedicado ao banco
        - Acesse a url do sistema e inicie o processo de instalação

    Ambiente Windows
        - Crie o banco de dados no MySQL e um usuário dedicado ao banco
        - Acesse a url do sistema e inicie o processo de instalação

Em caso de falha do instaldor vc pode instalar o sistema manualmente, seguindo o passo a passo abaixo.
    
    - Altere no arquivo index.php na raiz a linha 59 para -> define('ENVIRONMENT', 'production')
    - Crie o banco de dados no MySQL e um usuário dedicado ao banco    
    - Execute o script de criação das tabelas - arquivo banco.sql 
    - Dentro da pasta 'Application/Config' edite o arquivo 'database.php' e coloque os dados de acesso ao banco de dados.     
    - Acesse a url do sistema


----------------------------------------
@adrianoportodf2017- adrianobr00@gmail.com
----------------------------------------

