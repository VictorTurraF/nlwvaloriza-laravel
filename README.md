<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# NLW Valoriza - Laravel Framework
Implementação utilizando Laravel Framework do projeto [NLW Valoriza](https://github.com/VictorTurraF/nlwvaloriza/) com o objetivo de conhecer o funcionamento básico do Laravel.

## Autenticação
Implementada autenticação baseada em cookies (Cookie based authentication) utilizando o [Laravel Sactum](https://laravel.com/docs/8.x/sanctum#main-content) para armazenar os dados em sessão e com segurança. 

O fluxo de autenticação consiste em duas etapas:
- Obter o CSRF Token e o cookie de sessão temporário pela rota `/sanctum/csrf-cookie`
- Autenticar com email e senha para obter o cookie de sessão definitivo pela rota `/api/login`.

![auth-nlwvaloriza-laravel](https://user-images.githubusercontent.com/59932737/163727406-f1076ff6-2d02-41a7-b113-9e48843c511d.gif)

## Docker/Docker Compose
Implementada configuração de ambiente para laravel utilizando `Dockerfile` e `docker-compose.yml` para desenvolvimento.

![docker-nlwvaloriza-laravel](https://user-images.githubusercontent.com/59932737/163728039-7e646c1b-d5d1-4fb3-b5fd-80661b9a53a2.gif)

## Persistência de Dados com MySql
Baco de dados estruturado e com relacionamentos de *um para muitos* e *muitos para muitos*.

![mysql-nlwvaloriza-laravel](https://user-images.githubusercontent.com/59932737/163728483-f7665ce8-6787-4556-a88d-4be6a72a834d.gif)

## Funcionalidades básicas
Listar vários items:
![get-many-nlwvaloriza-laravel](https://user-images.githubusercontent.com/59932737/163728782-02f3b8c4-05a3-448a-943b-56d0d409073f.gif)

Listar um item específico (por ID)
![get-one-nlwvaloriza-laravel](https://user-images.githubusercontent.com/59932737/163728793-c25b1f85-dbb9-4ec0-85aa-83a14aeb4c58.gif)

Criar um item
![create-nlwvaloriza-laravel](https://user-images.githubusercontent.com/59932737/163728794-3affe45f-25a9-433c-9c1f-78142b0e03d2.gif)

Criação de recursos com relacionamentos.
![create-complex-nlwvaloriza-laravel](https://user-images.githubusercontent.com/59932737/163728936-c4e3c65a-c9d1-4a66-a5d5-2c94edbdfcbf.gif)

