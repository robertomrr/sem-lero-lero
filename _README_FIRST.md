# Objetivo desta aplicação

Criar um ambiente que mantenha informações sobre Ambiente Computacional, Agentes, Ferramentas, Procedimentos...

## Links

    https://www.youtube.com/watch?v=e83fM_0mGa8&t=133s
    https://livewire.laravel.com/docs/quickstart
    https://livewire.laravel.com/docs/quickstart
    https://github.com/lucascudo/laravel-pt-BR-localization

## sem-lero-lero

## Criar Aplicação

 > composer create-project --prefer-dist laravel/laravel sem-lero-lero
 > cd sem-lero-lero
 > git init
 > git add .
 > git commit -m "First commit"
 > npm install

## Instalação do Breeze (livewire)

Laravel Breeze é uma implementação mínima e simples de todos os recursos de autenticação do Laravel , incluindo:
 login, registro, redefinição de senha, verificação de e-mail e confirmação de senha.
 Além disso, o Breeze inclui uma página simples de “perfil” onde o usuário pode atualizar seu nome, endereço de e-mail e senha

 > composer require laravel/breeze --dev
 > php artisan breeze:install
    Which Breeze stack would you like to install?
        Blade with Alpine .................................................................... blade
        Livewire (Volt Class API) with Alpine ................................................ livewire
        Livewire (Volt Functional API) with Alpine ........................................... livewire-functional
        React with Inertia ................................................................... react
        Vue with Inertia ..................................................................... vue
        API only ............................................................................. api
 > livewire
    Would you like dark mode support? (yes/no) [no]
 > yes
   Which testing framework do you prefer? [PHPUnit]
        PHPUnit .............................................................................. 0
        Pest ................................................................................. 1
 > 0
 > git add .
    warning: in the working copy of 'package.json', CRLF will be replaced by LF the next time Git touches it
 > git commit -m "Instalação do Breeze (livewire)"

## Instalação Tailwind

    > npm install -D tailwindcss postcss autoprefixer
    > npx tailwindcss init -p
    > git add .
    > git commit -m "Instalação Tailwind" 

## > code

    Ativar VSCode

### Configurar Idioma/Timezone

        link
            https://github.com/lucascudo/laravel-pt-BR-localization
        > php artisan lang:publish
        > composer require lucascudo/laravel-pt-br-localization --dev
        > php artisan vendor:publish --tag=laravel-pt-br-localization
        Alterar \config\app.php para: (Linha 86 do arquivo )
            De > 'locale' => 'en',
            P/ > 'locale' => 'pt_BR'
        Alterar \config\app.php para: (Linha 73 do arquivo )
            De 'timezone' => 'UTC',
            P\ 'timezone' => 'America/Sao_Paulo',
        > git add .
        > git commit -m "Configurar Idioma/Timezone" 

### Apontar banco de dados no arquivo .env ( De laravel P/ db_sll)

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=db_sll
        DB_USERNAME=root
        DB_PASSWORD=

#### Criar tabela padrão no banco de dados ( users)

        > php artisan migrate:fresh

#### Descomentar database\seeders\DatabaseSeeder.php

        \App\Models\User::factory(10)->create();

#### Popular tabela users

        > php artisan db:seed

## Publicar GitHub

    > git remote add origin https://github.com/robertomrr/sem-lero-lero.git
    > git branch -M main
    > git push -u origin main

## Ativar Aplicação utilizando terminal CMD | Git Bash

    > CMD 
        > cd C:\laragon\www\sem-lero-lero
        > npm run dev
        > php artisan serve
    > Browser
        > localhost:8000

## Após clone recompor aplicação com os arquivos ignorados

    > composer update
    > npm install
    > copy .env.example .env
    > php artisan key:generate

## Criar CRUD para Usuarios utilizando recursos Livewire

    > php artisan make:livewire Users

    > php artisan make:livewire UserCrud

### Inclua no arquivo (app/Livewire/UserCrud.php)

#### Atributos

    public $users, $name, $email, $user_id;
    public $isModalOpen = 0;
    public $ShowHideUser = true;

#### Métodos

    public function create()
    public function store()
    public function edit($id)
    public function delete($id)

    public function openModal()
    public function closeModal()
    public function ShowDashboard()

    private function resetInputFields()

### Crie a VIEW Livewire  (resources/views/livewire/user-crud.blade.php)

    Utilize o arquivo (user-crud.blade.php) criado previamente 

### Crie a VIEW para o Formulario de Criação/Edição dos registros

    Crie a view para o modal de criação e edição (resources/views/livewire/create.blade.php):

### Crie a rota para o componente UserCrud

    Adicione a rota para o componente Livewire em routes/web.php:

        use App\Http\Livewire\UserCrud;

        Route::get('users', UserCrud::class);

## Criando endereços___________________________________________________________________

    > php artisan make:migration create_addresses_table --create=addresses
    > php artisan migrate
    > php artisan make:factory AddressFactory --model=Address
    > php artisan make:seeder AddressSeeder
    > php artisan make:model Address  
    > php artisan db:seed

## Criando Aplicação Livewire

    - **
    > php artisan make:livewire CreateEndereco
        Só com este comando e a inclusão da rota ( Route::get('/post', CreateEndereco::class); ) é o suficiente para a aplicação rodar
    > php artisan make:model Post -mfs
    > php artisan livewire:form PostForm
_____________________________________________________________________________
Criação de Rotas
Retornar conteúdo padronizado utilizando Resources
_____________________________________________________________________________
Criação de uma Model, um Controller uma factory e um migration - Invoice
Entrar no ambiente Tinker
Remover o Controller InvoiceController criado anteriormente
> php artisan make:controller Api/v1/InvoiceController --resource
> php artisan make:controller Api/v1/UserController --resource
Acrescentar FirstName e lastName
> php artisan migrate:fresh --seed
Configura um new resource
> php artisan make:resource v1/UserResource
> php artisan make:resource v1/InvoiceResource
>
