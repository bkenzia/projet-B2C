# B2C_symfony

B2C est un site internet dans le domaine rénovation et l’extension d’habitations.

## Envirenement de développement

### Pré-requis

-   PHP 7.4
-   Composer
-   Symfony CLI
-   Docker
-   Docker-compose
-   nodejs et npm

Vous pouvez vérifier les pré-requis (sauf Docker et Docker-compose)

```bash
symfony check:requirements
```

### Lancer l'environnement de développement

```bash
composer install
npm install
npm run build
docker-compose up -d
symfony serve -d
```

### Ajouter des données de tests

```bash
symfony console doctrine:fixtures:load

```

## Lancer des testes

```bash
php bin/phpunit --testdox
```
