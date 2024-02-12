# API PARLADOR IDEAL COM LARAVEL
# Indice
1.  [SOBRE O PROJETO](#1)
2.  [CONFIGURANDO AMBIENTE WINDOWS PARA A API LARAVEL](#2)
    - 2.2 [instalando WSl](#22)
        - [2.2.1 Comandos de instalação do WSL](#221)
        - [2.2.2 Habilitar o WSL para a versão 2](#222)
        - [2.2.3 Instale o terminal ubuntu](#223)
        - [2.2.4 Criar o arquivo .wslconfig](#224)
    - [2.3 - Instalando o Docker](#23)
        - [2.3.1 Baixe o instalador do docker do site oficial](#231)
        - [2.3.2 Habilitando integração do Docker ao WSL](#232)
3. [INSTALANDO O LARAVEL](#3)
     - [3.1 Baixando proeto do repositório](#31)
     - [3.2 Configurando o containers do projeto com o Docker](#32)
4.  [POPULANDO BANCO DE DADOS](#4)
    - [4.1 - Criando seeder](#41)
    - [4.2 Definindo os dados dos usuários](#42)
    - [4.3 Criando seeder de postagens](#43)
5.  [ROTAS DA API](#5)
    - [5.1 Rotas de usuários](#51)
    - [5.2 Rodas de postagens](#52)
6.  [Consumindo API com aplicação React Native](#6)

<br>

<div id="1" />
## 1- SOBRE O PROJETO 
 O Parlador Ideal, consiste em um projeto de Software,  que visa facilitar a troca de ideias libertárias do grupo em questão. Então foi criado um software de blog para que as pessoas do grupo possam compartilhar suas ideias. Para contruir o software foram usadas tecnologias de Frontend e Backend.
 
<div style="text-align: center;">   
    <img src="https://firebasestorage.googleapis.com/v0/b/werlen-dev.appspot.com/o/projects%2Freadmes%2Fparlador%20ideal%2Fapplogin.jpg?alt=media&token=25243eed-e669-40a4-bd35-e2a46e16f316" heigth="200" width="200">
</div>

    
Neste repositório, está detalhado o processo da construção da API RestFull para esse software, usando as seguintes tecnologias: Framework Laravel, Servidor Nginx, Banco de dados SQL e Redis para armazenamento de cache.

No Frontend, foi criado uma aplicação para android em React Native, que terá o processo da sua construção documentada [neste repositório](https://github.com/UhCardoso/Parlador-Ideal-React-Native).

<div id="2" />
## 2 - CONFIGURANDO AMBIENTE WINDOWS PARA RODAR API LARAVEL
Para configurar este ambiente iremos instalar as seguintes ferramentas em seu desktop: 
- WSL: Um módulo de sistemas operacionais Windows para rodar um ambiente linux no ambiente da microsoft.
- Docker: Serviço de virtualização de nível de sistema operacional para entregar software em pacotes chamados contêineres.
- Laravel: Laravel é um framework PHP livre e open-source para o desenvolvimento de sistemas web que utilizam o padrão MVC.

<div id="22" />
### 2.2- Instalando WSl

<div id="221" />
#### 2.2.1 Comandos de instalação do WSL
Abra o PowerShell como admnistrador e execute os seguintes comandos:
```
cmd: dism.exe /online /enable-feature /featurename:Microsoft-Windows-Subsystem-Linux /all /norestart
```
```
cmd: dism.exe /online /enable-feature /featurename:VirtualMachinePlatform /all /norestart

<div id="222" />
```
#### 2.2.2 Habilitar o WSL para a versão 2
```
cmd wsl --set-default-version 2
```
<div id="223" />
#### 2.2.3 Instale o terminal Ubuntu
Entre na loja da microsoft do windows e instale o Ububnu
<div>   
    <img src="https://firebasestorage.googleapis.com/v0/b/werlen-dev.appspot.com/o/projects%2Freadmes%2Fparlador%20ideal%2Fubuntu.png?alt=media&token=ba0b1f53-4b35-46a2-b781-acfd75e5cc40" heigth="450" width="450">
</div>

<div id="224" />
#### 2.2.4 Criar o arquivo .wslconfig
Vá para caminho "```C:\Users\<seu_usuario>```" em seu computador. Dentro do arquivo cole as seguintes configurações:
```
[wsl2]
memory=4GB
processors=4
swap=2GB
```

<div id="23" />
### 2.3 - Instalando o Docker
<div id="231" />
#### 2.3.1 Baixe o instalador do docker do site oficial
Entre no site https://www.docker.com/products/docker-desktop/, faça o download do executavel e abra ele para iniciar o procedimento da instalação do Docker.
<div id="232" />
#### 2.3.2 Habilitando integração do Docker ao WSL
- Vá na configuração

<div>   
    <img src="https://firebasestorage.googleapis.com/v0/b/werlen-dev.appspot.com/o/projects%2Freadmes%2Fparlador%20ideal%2Fconf.png?alt=media&token=f33c6e7a-53f3-4abf-a4a2-b2def8632638" heigth="450" width="450">
</div>
- Clique em "Resources" e em seguida em "WSL integration"
<div>   
    <img src="https://firebasestorage.googleapis.com/v0/b/werlen-dev.appspot.com/o/projects%2Freadmes%2Fparlador%20ideal%2Fresources.png?alt=media&token=c8351f41-1457-43b4-8026-7dc7286ae0ec" heigth="450" width="450">
</div>
- Deixe habilitado a opção "Enable integration with my default WSL distro" e a opção "Ubuntu". Em seguida no canto inferior da tela clique em "Apply & restart"
<div>   
    <img src="https://firebasestorage.googleapis.com/v0/b/werlen-dev.appspot.com/o/projects%2Freadmes%2Fparlador%20ideal%2Fapply.png?alt=media&token=c4e91c49-b54c-4fd5-a5d0-b19d4165da35" heigth="450" width="450">
</div>

<div id="3" />
## 3- Instalando o Laravel
<div id="31" />
### 3.1 Baixando projeto do repositório
- Abra o Terminal ubuntu e instale o repositório da API Parlador Ideal com o seguinte comando:
```
git clone https://github.com/UhCardoso/API-Parlador-Ideal.git
```
- Entre na pasta do projeto:
```
cd API-Parlador-Ideal
```
- Crie o arquivo .env
```
cp .env.example .env
```
- Atualize as seguintes variáveis de ambiente no arquivo .env
```
APP_NAME="Parlador Ideal"
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```
### 3.2 Configurando o containers do projeto com o Docker
- Ainda com o terminal Ubuntu aberto, suba os containers do projeto

```
docker-compose up -d
```

OBS: Caso dê algum erro, reinicie o seu computador, abra o programa Docker instalado no seu Windows e tente o comando acima novamente.
- Acesse o container do App
```
docker-compose exec app bash
```
- Instale as dependências do projeto
```
composer install
```
- Gere a key do projeto Parlador Ideal
```
php artisan key:generate
```
Acesse o projeto [http://localhost:8989](http://localhost:8989) e veja mostrou uma página semelhante a da página abaixo.

<div style="text-align: center;">   
    <img src="https://firebasestorage.googleapis.com/v0/b/werlen-dev.appspot.com/o/projects%2Freadmes%2Fparlador%20ideal%2Flocalhost.png?alt=media&token=baf361a7-e782-4cc7-9618-e64cc0ff1230" heigth="600" width="600">
</div>

## 4 - POPULANDO BANCO DE DADOS
Para que possamos fazer o teste das rotas da API, primeiro deveremos popular o banco de dados da nossa API.
No terminal "Ubuntu" usando o bash do Docker, vamos executar os seguintes comandos:
### 4.1 - Criando seeder de usuário
Para gerar os dados de usuário

```
php artisan make:seeder UserSeeder
```

#### 4.2 Definindo os dados dos usuários
Vá no diretório ```database/seeders``` e Abra o arquivo ```UserSeeder.php``` e dentro do método run, escreva o seguinte script para gerar 20 usuários na nossa aplicação, como no exemplo abaixo:
```
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            User::create([
                'name' => 'Usuário ' . $i,
                'email' => 'usuario' . $i . '@gmail.com',
                'password' => Hash::make('123456'), // Defina a senha desejada
            ]);
        }
    }
}
```

Lembre-se de importar o "```use Illuminate\Support\Facades\Hash;```" e o "```use App\Models\User;```"

Após confugura o seeder, execute o comando:
```
php artisan db:seed --class=UserSeeder
```

### 4.3 Criando seeder de postagens
Para gerar os dados de postagem:
```
php artisan make:seeder PostSeeder
```
### 4.4 Definindo os dados das postagens
Vá no diretório ```database/seeders``` e Abra o arquivo PostSeeder.php e dentro do método run, escreva o seguinte script para gerar várias postagens na nossa aplicação, como no exemplo abaixo:
```
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            for ($i = 1; $i <= 20; $i++) {
                Post::create([
                    'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dictum justo vitae augue hendrerit, nec eleifend metus dapibus. Donec nec orci sed sem mollis mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed condimentum accumsan justo at volutpat. Nam viverra ante id tellus volutpat $i",
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
```
Lembre-se de importar o "```use App\Models\Post;```" e o "```use App\Models\User;```". 
Após configurar o seeder, execute o comando:

```
php artisan db:seed --class=PostSeeder
```

#### ATENÇÃO!!! LEMBRE-SE DE APAGAR OS ARQUIVOS "```PostSeeder.php```" E "```UserSeeder.php```" APÓS CONCLUIR AS ETAPAS ACIMA.

## 5 - ROTAS DA API
Após a conclusão das etapas descritas acima, você poderá usar o programa Postman para realizar o teste das rotas da API.
As Rotas utilizadas durante o nosso projeto foram:

### 5.1 Rotas de usuários
- Cadastrar usuario via método POST

```
http://localhost:8989/api/users
```

<div>   
    <img src="https://firebasestorage.googleapis.com/v0/b/werlen-dev.appspot.com/o/projects%2Freadmes%2Fparlador%20ideal%2Fcadastrar%20usuario.png?alt=media&token=0db92639-885d-4910-aa26-a00d2d1d6a72" heigth="600" width="600">
</div><br><br>


- Fazer login de usuário via método POST

```
http://localhost:8989/api/login
```

<div>   
    <img src="https://firebasestorage.googleapis.com/v0/b/werlen-dev.appspot.com/o/projects%2Freadmes%2Fparlador%20ideal%2Flogar%20usuario.png?alt=media&token=55993479-e6b8-42e9-8a4f-cfaef1301065" heigth="600" width="600">
</div>

### 5.2 Rodas de postagens
- Criar postagem via método POST

```
http://localhost:8989/api/posts/{userId}/store
```

<div>   
    <img src="https://firebasestorage.googleapis.com/v0/b/werlen-dev.appspot.com/o/projects%2Freadmes%2Fparlador%20ideal%2FCriar%20postagem.png?alt=media&token=8e632452-aacc-4a8f-bddb-6a8f8e268874" heigth="600" width="600">
</div><br><br>

- Listar postagens via método GET

```
http://localhost:8989/api/posts
```

<div>   
    <img src="https://firebasestorage.googleapis.com/v0/b/werlen-dev.appspot.com/o/projects%2Freadmes%2Fparlador%20ideal%2Flistar%20postagens.png?alt=media&token=9c9d9071-89f7-4c49-93fe-c61d84ad8628" heigth="600" width="600">
</div><br><br>

- Atualizar postagens via método PATCH

```
http://localhost:8989/api/posts/{userId}/update/{postId}
```

<div>   
    <img src="https://firebasestorage.googleapis.com/v0/b/werlen-dev.appspot.com/o/projects%2Freadmes%2Fparlador%20ideal%2Feditar%20postagem.png?alt=media&token=cf3b2867-b89c-43d3-ac28-d71d183c9b17" heigth="600" width="600">
</div><br><br>

- Deletar Postagem via método DELETE

```
http://localhost:8989/api/posts/{userId}/delete/{postId}
```

<div>   
    <img src="https://firebasestorage.googleapis.com/v0/b/werlen-dev.appspot.com/o/projects%2Freadmes%2Fparlador%20ideal%2Fdelete%20postagem.png?alt=media&token=e1ff6c59-005c-4d71-80c9-7348dcb14943" heigth="600" width="600">
</div>

## 6. Consumindo API com aplicação React Native
Agora chegou a hora de configurarmos o projeto da Aplicação Frontend para consumirmos os dados da nossa API.
Acesse este [este link](https://github.com/UhCardoso/Parlador-Ideal-React-Native) para ver o passo a passo de como confugurar o App Parlador Ideal.
