# Portfolio

_Portfolio développé en Symfony 5_

[![forthebadge](http://forthebadge.com/images/badges/built-with-love.svg)](http://forthebadge.com)

## Installation

```bash
git clone https://github.com/madxmind/portfolio.git
cd portfolio
composer install
npm install
composer prepare
```

## Configuration

Créer un fichier `.env.local` :

```dotenv
DATABASE_URL=mysql://root:@127.0.0.1:3306/portfolio
```

## Démarer le serveur

```
symfony serve -d
npm run dev
```

### Travailler sur le projet

```
_Compiler les assets en temps réel :_
* npm run watch
```
