# Monitor

Pré-requisitos
1.PHP instalado
2.Composer Instalado
3.Laravel Instalado
4.XAMPP para acessar o MySQL (Opcional)

Passos para a execução do projeto:
1.Clonar o projeto a partir deste reposítório.
2.Usando o prompt de comando, vá até a pasta raiz do projeto e execute os seguinte comandos:
    a.composer install
    b.php artisan migrate
 
3.crie um arquivo .env, usando o .env.example, e edite as seguintes partes:
    (Configurações do banco de dados/ caso possua alguma outra configuração de banco, sinta-se livre para usar. Para executar o sistema é necessário apenas uma base vazia, previamente criada com o nome presente em 'DB_DATABASE')
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=test
    DB_USERNAME=root
    DB_PASSWORD=root
    (configurações do serviço de email / utilizei o site: https://mailtrap.io/, que serve para criar inboxes de teste para recebimento de emails. Você pode se cadastrar nele, e acessar o menu Inboxes > SMTP Settings > Show Credentials para ter acesso as informações a seguir de protocolo, host, porta, username e password. Deixei as minhas como exemplo, mas provalvelmente as suas serão diferentes.)
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=fe54a4af5313ef
    MAIL_PASSWORD=6ae19ad379bd9e
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS=null
    MAIL_FROM_NAME="${APP_NAME}"
    Obs:caso possua outra plataforma de testagem para os emails, sinta-se livre pra usar.

4.Execute o comando 'php artisan serve' na pasta raíz do seu projeto.

5.No seu navegador, digite localhost:8000 e a tela básica de aplicações Laravel aparecerá.![inicio](https://user-images.githubusercontent.com/20564308/123499398-cea7ff00-d60c-11eb-8ea9-836d20d0fbad.PNG)

6.No canto superior direito, clique em 'Login' > 'Register New Membership' ou simplesmente pressione 'Register'. Na tela de registro, efetue o seu cadastro e entre no sistema.![login](https://user-images.githubusercontent.com/20564308/123499431-0747d880-d60d-11eb-9e37-69c3b63f937c.PNG)

7.Você será levado diretamente ao painel contendo a lista de sites sendo monitorados (caso não haja nenhum no banco, a lista estará vazia).![painel](https://user-images.githubusercontent.com/20564308/123499348-6f49ef00-d60c-11eb-84e9-286109a86a82.PNG)

8.Para adicionar um novo site para monitorar, clique em 'Novo site' e cadastre-o.![novo_site](https://user-images.githubusercontent.com/20564308/123499341-5ccfb580-d60c-11eb-9c12-a1b56921355e.PNG)

9.Notificações via email são opcionais, portanto, para habilitá-las, vá em Configurações > Notificações e marque a opção 'Habilitar'.![notificacoes](https://user-images.githubusercontent.com/20564308/123499323-432e6e00-d60c-11eb-8660-88085065dd18.PNG)

10.Exemplo de email na plataforma MailTrap:![email](https://user-images.githubusercontent.com/20564308/123499356-87ba0980-d60c-11eb-85d8-7ba4d2abf048.PNG)

11.Para efetuar o logout, clique no seu nome presente no canto superior direito e aperte o botão logout. 
