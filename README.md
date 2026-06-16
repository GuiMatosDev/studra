# 📚 Studra

Studra é uma plataforma de organização de estudos desenvolvida em PHP utilizando arquitetura MVC.  
O projeto foi criado com foco em produtividade acadêmica, permitindo centralizar matérias, tarefas e anotações em um único ambiente.

---

# ✨ Funcionalidades

## 🔐 Autenticação
- Cadastro de usuários
- Login
- Logout
- Controle de sessão

---

## 📚 Matérias
- Criar matérias
- Editar matérias
- Arquivar matérias
- Apagar matérias
- Sistema de ícones personalizados
- Pontuação por matéria

---

## ✅ Tarefas
- Criar tarefas
- Editar tarefas
- Concluir tarefas
- Excluir tarefas
- Data de término
- Status de conclusão

---

## 📝 Anotações
- Criar anotações
- Editar anotações
- Excluir anotações
- Organização por matéria

---

## 📊 Dashboard
- Total de matérias
- Total de tarefas
- Tarefas concluídas
- Total de anotações
- Pontuação do usuário
- Navegação integrada entre matérias e conteúdos

---

# 🛠️ Tecnologias Utilizadas

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- XAMPP

---

# 🧱 Arquitetura

O projeto segue o padrão MVC:

```txt
models/
views/
controllers/
```

# 📁 Estrutura das Pastas

```txt
studra/
│
├── assets/
│   ├── css/
│   ├── js/
│   └── img/
│
├── config/
├── controllers/
├── database/
├── models/
├── views/
│
└── index.php
```

# ⚙️ Como Executar

1. Clonar o projeto
```txt
git clone https://github.com/seu-usuario/studra
```

2. Colocar no htdocs
```txt
C:\xampp\htdocs\
```
3. Iniciar o XAMPP

4. Criar banco de dados
No phpMyAdmin:

Criar um banco chamado:
```txt
studra
```

5. Importar o banco
```txt
database/studra.sql
```

6. Acessar o sistema
```txt
http://localhost/studra
```

