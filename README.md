# Tema Pragmatico - Documentação

## Visão Geral

**Pragmatico** é um tema WordPress minimalista e moderno desenvolvido com foco em simplicidade, performance e customização. O tema utiliza Tailwind CSS para estilização e segue uma arquitetura orientada a objetos em PHP.

- **Versão**: 1.0.0
- **Licença**: MIT
- **Text Domain**: pragmatico
- **Desenvolvedor**: Jonathan Matheus

---

## 📋 Estrutura do Projeto

```
pragmatico/
├── assets/
│   └── css/
│       ├── fonts.css          # Definições de tipografia customizada
│       └── main.css           # Estilos gerais da aplicação
├── includes/
│   └── classes/
│       ├── class.color.php    # Gerenciador de cores do tema
│       ├── class.css.php      # Registrador de estilos CSS
│       ├── class.navmenus.php # Registrador de menus de navegação
│       └── class.support.php  # Suporte a features do WordPress
├── footer.php                  # Template do rodapé
├── front-page.php             # Template da página inicial
├── functions.php              # Carregamento de classes e funções
├── header.php                 # Template do cabeçalho
├── index.php                  # Template padrão
└── style.css                  # Metadata do tema

```

---

## 🎨 Sistema de Design

### Paleta de Cores

O tema possui um sistema de cores customizável através do Customizer do WordPress:

| Variável                             | Padrão    | Uso                                 |
| ------------------------------------ | --------- | ----------------------------------- |
| `$c1` / `pragmatico_primary_color`   | `#f7f7f7` | Cor primária (textos, títulos)      |
| `$c5` / `pragmatico_secondary_color` | `#b2b2b2` | Cor secundária (textos descritivos) |

As cores podem ser alteradas em **Aparência > Personalizar > Configurações de Cor** no painel administrativo.

### Tipografia

O tema utiliza três famílias de fontes do Google Fonts:

| Fonte        | Weights  | Uso                                                   |
| ------------ | -------- | ----------------------------------------------------- |
| **Orbitron** | 400-900  | Títulos principais (`font-1-xl`)                      |
| **Poppins**  | 500, 600 | Navegação e subtítulos (`font-1-m`, `font-1-m-b`)     |
| **Roboto**   | 100-900  | Corpo de texto e descrições (`font-1-xs`, `font-2-s`) |

### Classes de Fonte Customizadas

Implementadas em `assets/css/fonts.css`:

```css
.font-1-xl  /* Orbitron, 32px, 600 - Títulos principais */
/* Orbitron, 32px, 600 - Títulos principais */
.font-1-m   /* Poppins, 18px, 500 - Menu e elementos médios */
.font-1-m-b /* Poppins, 18px, 600 - Menu e elementos médios (bold) */
.font-1-xs  /* Roboto, 14px, 400 - Texto pequeno */
.font-2-s; /* Roboto, 16px, 400 - Subtítulos */
```

---

## 🏗️ Arquitetura PHP

### Sistema de Classes

O tema utiliza uma arquitetura orientada a objetos com 4 classes principais:

#### 1. **NavMenus** (`class.navmenus.php`)

Responsável pelo registro de menus de navegação.

```php
new NavMenus();
// Registra: Primary Menu
```

- **Hook**: `after_setup_theme`
- **Função Principal**: `register_menus()`

#### 2. **Support** (`class.support.php`)

Adiciona suporte a features do WordPress.

```php
new Support();
```

**Features habilitadas:**

- `custom-background` - Permite customizar fundo
- `excerpt` - Suporte a excerpts em páginas

- **Hooks**: `after_setup_theme`, `init`

#### 3. **Color** (`class.color.php`)

Gerencia as configurações de cor no Customizer.

```php
new Color();
```

**Cores Registradas:**

- `pragmatico_primary_color` (#f7f7f7)
- `pragmatico_secondary_color` (#b2b2b2)

- **Hook**: `customize_register`
- **Sanitização**: `sanitize_hex_color`

#### 4. **Css** (`class.css.php`)

Enfileira e registra os arquivos CSS do tema.

```php
new Css();
```

**Estilos Registrados:**

1. `fonts` - Definições de tipografia
2. `main-style` - Estilos principais (depende de `fonts`)

- **Hook**: `wp_enqueue_scripts`

---

## 📱 Responsividade

O tema utiliza **Tailwind CSS** para responsividade com breakpoints:

| Prefixo  | Tamanho | Uso              |
| -------- | ------- | ---------------- |
| (padrão) | < 640px | Mobile           |
| `md:`    | ≥ 768px | Tablet e desktop |

### Exemplos de Uso

```html
<!-- Flex direction responsivo -->
<div class="flex flex-col md:flex-row">
  <!-- Coluna no mobile, linha no desktop -->
</div>

<!-- Padding responsivo -->
<div class="px-4 md:px-0">
  <!-- 16px lateral no mobile, 0 no desktop -->
</div>
```

---

## 🎯 Templates Principais

### Header (`header.php`)

**Responsabilidades:**

- Cabeçalho HTML e meta tags
- Logo do site com link para home
- Menu de navegação primário
- Título da página
- Descrição/excerpt da página

**Features:**

- Cores dinâmicas via customizer
- Menu responsivo (coluna em mobile, linha em desktop)
- Carregamento do Tailwind CSS via CDN
- Integração com `wp_head()` e `wp_body_open()`

**Variáveis Globais:**

- `$c1` - Cor primária
- `$c5` - Cor secundária

### Footer (`footer.php`)

**Responsabilidades:**

- Fechamento do container
- Hook `wp_footer()`
- Fechamento de tags HTML

### Front Page (`front-page.php`)

**Template dedicado para a página inicial.**

**Seções:**

1. Conteúdo principal (via editor WordPress)
2. Seção de Experiência com cards

**Exemplo de Card:**

```php
<div class="flex gap-[12px]">
  <img src="..." class="rounded-full w-[50px] h-[50px]">
  <div>
    <h3>Full Stack PHP/WordPress</h3>
  </div>
</div>
```

### Index (`index.php`)

Template padrão que carrega header e footer.

---

## 🎨 Estilização

### Main.css

Estilos gerais aplicados a elementos dentro de `<main>`:

```css
main h2 {
  color: #f7f7f7;
  font-family: "Roboto", sans-serif;
  font-size: 16px;
  margin-top: 32px;
}

main p {
  color: #dedede;
  font-family: "Roboto", sans-serif;
  font-size: 14px;
  margin-top: 12px;
}
```

---

## 🚀 Como Usar

### Instalação

1. Copie a pasta `pragmatico` para `wp-content/themes/`
2. Vá para **Aparência > Temas** no painel administrativo
3. Ative o tema **Pragmatico**

### Customização

1. Acesse **Aparência > Personalizar**
2. Navegue para **Configurações de Cor**
3. Ajuste as cores primária e secundária conforme necessário

### Criar Menus

1. Vá para **Aparência > Menus**
2. Crie um novo menu
3. Atribua ao local **Primary Menu** (Menu Primário)

### Editar Página Inicial

1. Vá para **Páginas > Adicionar Nova**
2. Defina como **Página Inicial** em **Configurações de Leitura**
3. Use o editor WordPress para adicionar conteúdo

---

## 🔧 Variáveis e Constantes Importantes

### Functions.php

```php
require_once get_template_directory() . '/includes/classes/class.navmenus.php';
require_once get_template_directory() . '/includes/classes/class.support.php';
require_once get_template_directory() . '/includes/classes/class.color.php';
require_once get_template_directory() . '/includes/classes/class.css.php';

new NavMenus();
new Support();
new Color();
new Css();
```

---

## 📋 Checklist de Desenvolvimento

- [x] Estrutura base de tema WordPress
- [x] Sistema de cores customizável
- [x] Tipografia com Google Fonts
- [x] Responsividade com Tailwind CSS
- [x] Menus de navegação
- [x] Templates básicos (header, footer, front-page)
- [x] Classe abstrata para CSS
- [ ] Suporte a widgets
- [ ] Suporte a custom post types
- [ ] Dark mode
- [ ] Multilíngue

---

## 📝 Notas de Desenvolvimento

### Padrões de Código

- **PHP**: Classes orientadas a objetos
- **CSS**: Tailwind CSS para utilidades + CSS customizado para estilos específicos
- **HTML**: Semântico com tags HTML5

### Dependências Externas

- **Tailwind CSS 4** (via CDN)
- **Google Fonts**: Orbitron, Poppins, Roboto

### Segurança

- Uso de `esc_url()` para URLs
- Uso de `wp_title()` para títulos
- Sanitização de cores com `sanitize_hex_color`

---

## 🐛 Troubleshooting

### Menu não aparece

- Verifique se o menu foi criado em **Aparência > Menus**
- Atribua o menu ao local **Primary Menu**

### Cores não mudam

- Limpe o cache do navegador
- Verifique se o Customizer foi salvo corretamente

### Fontes não carregam

- Verifique a conexão com internet (fontes do Google)
- Confira o arquivo `assets/css/fonts.css`

---

## 📄 Licença

MIT License - Veja o arquivo `license.txt` para detalhes.

---

## 👨‍💻 Autor

**Jonathan Matheus** - Desenvolvedor WordPress/PHP

Última atualização: 13 de dezembro de 2025
