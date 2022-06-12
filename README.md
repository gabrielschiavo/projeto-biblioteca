# Projeto Biblioteca - Trabalho Programação WEB III
<p align="left">
    <img src="https://img.shields.io/badge/Status-Conclu%C3%ADdo-brightgreen?style=for-the-badge"/>
</p>

Este projeto visa controla o cadastro dos livros e empréstimos.

* `Gênero:` (código, descrição) deverá ter uma tela para listar os gêneros, para cadastrar e botão para excluir.

* `Livros:` (código, cod_genero, titulo, descrição, imagem da capa) deverá ter uma tela para listar os livros, para cadastrar e botão para excluir

* `Pessoa:` (código, nome, endereço, telefone, e-mail) deverá ter uma tela para listar as pessoas, para cadastrar e botão para excluir

* `Retirada/Devolução de Livros:` (codigo, data_retirada, data_entrega, pessoa_retirada, livro_retirado)

## :hammer: Funcionalidades do projeto
- `Cadastro de livros`: cadastro dos livros com titulo, descrição e imagem da capa.
- `Cadastro de pessoa`: cadastro de pessoa com nome, endereço, telefone e e-mail.
- `Cadastro da retirada e devolução`: cadastro da data dde retirada, data de entrega, pessoa que retirou o livro e o livro retirado.
- `Cadastro de gênero do livro`: cadastro de descrição do gênero do livro.


![Tela inicial do projeto](https://user-images.githubusercontent.com/84607831/173244774-e45a690b-8768-4c86-b42b-145d25b158f8.jpg)


## :file_folder: Acesso ao projeto
Você pode [acessar o código fonte do projeto](https://github.com/GabrielSchiavo/projeto-biblioteca) ou [baixá-lo](https://github.com/GabrielSchiavo/projeto-biblioteca/archive/refs/heads/main.zip).

## 	:hammer_and_wrench: Abrir e rodar o projeto
Após baixar o projeto, você pode abrir com o Visual Studio Code. Para o projeto funcionar você dever ter configurado em seu PC:
* PHP - Versão >=8.1.2
* Composer - Versão >=2.2.6
* Banco de Dados MySQL

Após configurar todas essas ferramentas, abra o arquivo .env, localizado na raiz do projeto e altere as configurações de "DB_CONNECTION" para as configurações do seu MySQL. Exclua a pasta "storage", localizada em /public. Depois abra um terminal na raiz do projeto e execute os seguintes comandos:

* php artisan migrate
* php artisan storage:link

Agora o projeto está pronto para ser iniciado. Para isso execute no terminal o seguinte comando:

* php artisan serve

## :heavy_check_mark: Tecnologias utilizadas
* `Laravel - 9.3.0`
* `Composer - 2.2.6`
* `MySQL`
* `PHP - 8.1.2`
* `Bootstrap - 5.1.3`
* `UIkit - 3.13.7`
