# 🌿 Studio Ser Design — Portfolio

<p align="center">
  <strong>Design com Essência, Estratégia e Propósito</strong>
</p>

<p align="center">
  <a href="https://laravel.com" target="_blank"><img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel"></a>
  <a href="https://vitejs.dev" target="_blank"><img src="https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite"></a>
  <a href="https://tailwindcss.com" target="_blank"><img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS"></a>
  <a href="https://pages.github.com" target="_blank"><img src="https://img.shields.io/badge/GitHub_Pages-222222?style=for-the-badge&logo=github&logoColor=white" alt="GitHub Pages"></a>
</p>

---

Este repositório contém o código-fonte do website oficial e portfólio do **Studio Ser Design**. O projeto foi desenvolvido utilizando Laravel como base de desenvolvimento e estruturação de templates, integrado a um pipeline de compilação estática (Static Site Generation - SSG) que exporta todo o site para HTML/CSS puros na pasta `docs/`, permitindo uma hospedagem de alta performance e custo zero via GitHub Pages.

## ✨ Características do Projeto

- 🎨 **Design Autoral e Minimalista**: Visual premium focado na experiência de marca e refinamento estético.
- 📱 **Totalmente Responsivo**: Otimizado para dispositivos móveis, tablets e desktops.
- 🖼️ **Portfólio Dinâmico**: Galeria de projetos categorizada com suporte a mockups personalizados, hovers dinâmicos e galerias de imagens dedicadas.
- 🧩 **Páginas Customizadas**: Seções interativas de detalhes para cada projeto, incluindo transições e elementos animados específicos (como a animação de dente-de-leão no projeto *Francine Longo* ou visualizadores tipo pasta/folder no projeto *Confere Quality*).
- 🚀 **Arquitetura Híbrida**: Agilidade no desenvolvimento usando Blade templates (Laravel) e Vite, com entrega via arquivos estáticos otimizados.

---

## 🛠️ Tecnologias Utilizadas

- **Framework PHP**: [Laravel 10](https://laravel.com) (Template Engine Blade e Roteamento)
- **Estilização**: [Tailwind CSS](https://tailwindcss.com) & Vanilla CSS
- **Empacotador/Assets Builder**: [Vite](https://vite.dev)
- **Servidor de Deploy**: GitHub Pages (servindo a pasta `docs/`)

---

## 📂 Estrutura de Diretórios Principais

- `app/` — Lógica do Laravel (Controllers, Providers).
- `resources/views/` — Templates Blade (layout principal, páginas estáticas e views customizadas de cada projeto).
  - `resources/views/projects/` — Views detalhadas exclusivas para cada projeto.
- `public/img/projects/` — Ativos visuais (imagens, mockups e hovers) organizados por diretórios de cada projeto.
- `routes/web.php` — Definições das rotas e lógica de ordenação e categorização dinâmica dos projetos.
- `docs/` — Destino final do build estático. Toda a compilação do site para produção reside aqui.
- `export.php` — Script customizado que varre as rotas do Laravel e as exporta como páginas HTML estáticas dentro de `docs/`.

---

## 🚀 Como Executar o Projeto Localmente

### Pré-requisitos
Certifique-se de ter instalado em sua máquina:
- **PHP >= 8.1**
- **Composer**
- **Node.js & NPM**

### Passo a Passo

1. **Clonar o Repositório:**
   ```bash
   git clone https://github.com/YuriTreichel/site-studio-ser-design.git
   cd site-studio-ser-design
   ```

2. **Instalar as Dependências:**
   ```bash
   composer install
   npm install
   ```

3. **Configurar as Variáveis de Ambiente:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Executar o Servidor de Desenvolvimento:**
   Em um terminal, inicie o servidor do Laravel:
   ```bash
   php artisan serve
   ```
   Em outro terminal, execute o Vite para compilar os assets em tempo real:
   ```bash
   npm run dev
   ```

Acesse o projeto em seu navegador no endereço: `http://localhost:8000`.

---

## 📦 Compilação e Deploy (Static Export)

Para compilar os assets do Tailwind CSS/Vite e exportar as páginas do Laravel como arquivos HTML estáticos na pasta `docs/`, execute o seguinte comando:

```bash
npm run build
```

Este comando executa a pipeline em duas etapas:
1. `vite build` — Compila, minifica e gera a hash de cache para os arquivos CSS e Javascript.
2. `php export.php` — Executa o script que renderiza cada rota definida e salva os arquivos estáticos na pasta `docs/` juntamente com as mídias e assets do diretório público.

Após a execução, basta commitar a pasta `docs/` e realizar o push para a branch principal (`main`). O GitHub Pages está configurado para publicar automaticamente a partir desta pasta.
