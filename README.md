# Andromeda Licitações

Andromeda Licitações é um sistema desenvolvido para as disciplinas de Sistemas para Internet e Prática de Desenvolvimento Web do 4º ano do Curso Técnico Integrado ao Ensino Médio em Informática para Internet, do Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul - Campus Bento Gonçalves.

- Programação: [@germanocorrea](https://github.com/germanocorrea)
- Web Design e Testes: [@marcocanossa](https://github.com/marcocanossa)
- Análise e Documentação: Laura Ferronato Mezacasa

## Instalação
O processo de instalação é o mesmo do CakePHP:
- Certifique-se que seu sistema corresponde aos requisitos:
    - PHP 5.6 ou superior (PHP 7 recomendável)
    - PDO habilitada para o PHP
    - Mcrypt habilitada para o PHP
    - mod_rewrite esteja habilitado no servidor web
    - Composer
    - Alguma engine de Banco de Dados suportada pelo Cake: MySQL, MariaDB, PostgreSQL, Microsoft SQL Server ou SQLite
- Copie o arquivo `databse.php.default` como `databse.php` e edite seu conteúdo apropriadamente
- Certifique-se de que haja as permissões necessárias nos arquivos e diretórios para leitura pelo servidor web
- Certifique-se que o diretório app/temp e todos seus subdiretórios podem ser escritos tanto pelo servidor quanto pelo usuário
- Rode o comando `composer install` para instalar as dependências necessárias (utilize o parâmetro `--no-dev` para instalar as dependências no servidor de produção).

## Contribua

[CONTRIBUTING.md](CONTRIBUTING.md) - Quick pointers for contributing to the CakePHP project
