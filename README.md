# Atividade de Middleware – Laravel

## 📌 Descrição

Este projeto foi desenvolvido como uma atividade prática utilizando o **Framework Laravel**, com o objetivo de demonstrar o funcionamento de uma **Middleware**.

A Middleware é responsável por verificar o acesso a uma determinada rota e, neste projeto, exibe uma mensagem informando ao usuário que ele não possui permissão para acessar o site.

### 💬 Mensagem exibida

> Você não tem permissão para acessar este site.
> Favor entrar em contato com o administrador.

---

## 🎯 Objetivo da atividade

Criar uma aplicação no Framework Laravel onde:

* O usuário acessa uma rota através do Controller;
* A rota utiliza uma Middleware;
* A Middleware intercepta a requisição;
* A Middleware exibe uma mensagem na Visualização (View);
* A execução da Middleware é demonstrada no README.

---

## 🛠️ Tecnologias utilizadas

* **PHP**
* **Laravel 13.29.0**
* **Blade**
* **HTML5**
* **CSS3**
* **Git e GitHub**

---

## 📂 Estrutura principal do projeto

```
atividade-middleware/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── SiteController.php
│   │   │
│   │   └── Middleware/
│   │       └── VerificarPermissao.php
│
├── bootstrap/
│   └── app.php
│
├── public/
│   └── css/
│       └── style.css
│
├── resources/
│   └── views/
│       ├── sem-permissao.blade.php
│       └── site.blade.php
│
├── routes/
│   └── web.php
│
├── prints/
│   ├── middleware-terminal.png
│   └── mensagem-site.png
│
├── artisan
├── composer.json
└── README.md
```

---

# 🔐 Funcionamento da Middleware

O funcionamento da aplicação ocorre da seguinte maneira:

```
Usuário
   ↓
Acessa /site
   ↓
Route
   ↓
Middleware verificar.permissao
   ↓
Verifica a permissão
   ↓
Sem permissão
   ↓
View sem-permissao.blade.php
   ↓
Mensagem de acesso negado
```

---

## 💻 Controller

O Controller utilizado na atividade é o `SiteController`.

Arquivo:

```
app/Http/Controllers/SiteController.php
```

Código:

```
<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function acessar()
    {
        return view('site');
    }
}
```

O método `acessar()` é responsável por acessar a View `site`.

---

# 🛡️ Middleware

A Middleware utilizada no projeto está localizada em:

```
app/Http/Middleware/VerificarPermissao.php
```

Código:

```
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarPermissao
{
    public function handle(Request $request, Closure $next): Response
    {
        return response()->view('sem-permissao');
    }
}
```

A Middleware intercepta a requisição e direciona o usuário para a View `sem-permissao`, onde a mensagem de acesso negado é apresentada.

---

# 🌐 Rota

A rota está configurada no arquivo:

```
routes/web.php
```

Código:

```
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/site', [SiteController::class, 'acessar'])
    ->middleware('verificar.permissao');
```

A rota `/site` utiliza a Middleware:

```
verificar.permissao
```

---

# ⚙️ Registro da Middleware

A Middleware foi registrada no arquivo:

```
bootstrap/app.php
```

Utilizando o alias:

```
->withMiddleware(function (Middleware $middleware): void {
    $middleware->alias([
        'verificar.permissao' => \App\Http\Middleware\VerificarPermissao::class,
    ]);
})
```

Dessa forma, o alias `verificar.permissao` pode ser utilizado diretamente na rota.

---

# 🖥️ Execução da Middleware

## 1. Verificação da rota

Para verificar as rotas cadastradas no Laravel, foi utilizado o comando:

```
php artisan route:list -v
```

O resultado demonstra que a rota `/site` está vinculada ao `SiteController` e à Middleware `verificar.permissao`.

### 📸 Middleware registrada na rota

![Middleware registrada na rota](prints/middleware-terminal.png)

### Resultado observado

Na execução é possível identificar:

```
GET|HEAD  site
SiteController@acessar
web
verificar.permissao
```

Isso comprova que a Middleware está associada à rota `/site`.

---

## 2. Execução no navegador

Após iniciar o servidor Laravel com:

```
php artisan serve
```

foi acessada a seguinte rota:

```
http://127.0.0.1:8000/site
```

A Middleware interceptou a requisição e exibiu a mensagem definida na View.

### 📸 Mensagem exibida pela Middleware

![Mensagem exibida pela Middleware](prints/mensagem-site.png)

### Mensagem apresentada

```
Você não tem permissão para acessar este site.

Favor entrar em contato com o administrador.
```

---

# 📋 Resultado

A atividade demonstra o funcionamento de uma Middleware no Laravel.

Ao acessar a rota `/site`, a requisição passa pela Middleware `verificar.permissao`. Como o acesso não é permitido, a Middleware interrompe o fluxo normal e apresenta a View `sem-permissao.blade.php`.

### Fluxo final

```
/site
  ↓
SiteController
  ↓
verificar.permissao
  ↓
sem-permissao.blade.php
  ↓
"Você não tem permissão para acessar este site.
Favor entrar em contato com o administrador."
```

---

# ▶️ Como executar o projeto

### 1. Clonar o repositório

```
git clone https://github.com/GiT0rres/Atividade-Middleware.git
```

### 2. Entrar na pasta

```
cd Atividade-Middleware
```

### 3. Instalar as dependências

```
composer install
```

### 4. Iniciar o servidor

```
php artisan serve
```

### 5. Acessar no navegador

```
http://127.0.0.1:8000/site
```

---

# 📦 Entrega

**Repositório GitHub:**

https://github.com/GiT0rres/Atividade-Middleware

---

## 👩‍💻 Desenvolvido por

**Giovanna**

Atividade acadêmica — Desenvolvimento de Sistemas
**Laravel – Middleware**
