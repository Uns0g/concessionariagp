# Concessionária GP :car:

O projeto foi feito como avaliação para o curso de Desenvolvimento de Sistemas na ETEC Amélia Dos Santos Musa em Ribeirão Preto. 

Esse sistema web foi construído para uma concessionária fictícia onde o usuário pode fazer todas as operações de um CRUD para cores, marcas, modelos e veículos.

## Usando O Sistema :computer:

Para usar o sistema é necessário primeiro ter o XAMPP instalado na sua máquina. Para instalar o XAMPP [clique aqui](https://www.apachefriends.org/download.html).

### Banco De Dados

Inicie o painel de controle do XAMPP e logo após inicie o MySQL. **Não feche o painel de controle ainda**.

Vá para o prompt de comando e por meio do comando e se mova para o local onde está o XAMPP (por padrão ele está na pasta C: no Windows). Logo após ter ido para a pasta "xampp" avance até a pasta "bin" que está dentro de outra pasta chamada "mysql". 

Agora que está no caminho ```C:\xampp\mysql\bin``` digite o seguinte comando:  ```mysql -u root -p``` 
Agora você deve criar um novo banco de dados com o nome que desejar e, logo após, voltar para o caminho onde estava anteriormente (C:\xampp\mysql\bin) para colocar no banco recém criado as tabelas e a view do banco de dados.

Digite ```mysql -u root -p nomedobancocriado < caminho/do/arquivo.sql``` e logo depois entre no banco de dados que você acabou de inserir as tabelas e a view com o comando ```mysql -u root -p nomedobancocriado```.

Pronto **o banco de dados está pronto**, agora você pode excluir o arquivo sql se preferir.

### Iniciando O Localhost

Para iniciar o localhost você deve usar o painel de controle do XAMPP, clicando sobre o botão "Config" na linha de "Apache". Quando clicar várias opções aparecerão, mas você deve selecionar apenas a opção "Apache (httpd.conf)" que irá abrir um arquivo de texto.

No arquivo procure por duas linhas onde esteja escrito em sequência ```DocumentRoot "C:\xampp\htdocs"``` e ```<Directory "C:\xampp\htdocs">``` modifique os dois indicando o caminho onde se encontra a pasta deste projeto em sua máquina. 

Após ter feito isso, e ter iniciado o Apache, quando digitar localhost no seu navegador, o index do projeto aparecerá.

## Notas :notebook_with_decorative_cover:

O sistema foi feito em colaboração com um amigo meu Gabriel Ledolini Morais que ficou responsável por criar o banco de dados, a logo e testar o funcionamento do sistema.