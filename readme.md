----

## Requisitos

Para rodar esse boilerplate, verifique se possui instalados em sua máquina:

- WSL
- Docker

## Hora de subir seu container
_Nesse ponto, acredito que você já tenha feito um clone desse projeto dentro do seu wsl._

### No diretorio do seu projeto, abra o terminal WSL e rode:
```cmd
docker-compose up --build -d
```
### Abra o repositório no seu editor de preferência. (VS Code obviamente), e no contexto do Docker, execute os comandos:

```cmd
composer install
```


```cmd
copy /y .env.example .env && php artisan key:generate
```
