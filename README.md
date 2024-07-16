![Banner](banner.png)


![Banner](capture1.png)


![Banner](capture2.png)


![Banner](capture3.png)

### Requisitos importantes
```
php 8.2
Si estas en Mac
https://www.mamp.info/en/mamp/mac/

Si estas en windows
https://laragon.org/

node v20
https://nodejs.org/en/download/package-manager
```

### Instalacion de la Api

#### PASO 1:
```
git clone https://github.com/gsanchez1687/DECAMERON.git
```

#### PASO 2:
```
En la carpeta de API, entrar y ejecutar este codigo

composer install
```

#### PASO 3:
```
En la misma carpeta de API, ejecutar este codigo para correr las migracioes de la DB y llenar las tablas catalogo

php artisan migrate --seed
```

#### PASO 4
```
Agregar Host
sudo nano /etc/hosts
127.0.0.1 decameron.local
```

#### PASO 5:

```
Ahora vamos a correr el proyecto API
php artisan serve --host=decameron.local --port=8000
```

### Instalacion del Frontend

#### PASO 1

```
Vamos a la carpeta admin, ejecutamos este codigo para instala node en el proyecto
npm install
```

#### PASO 2
```
Ejecutamos este codigo para correr el frontend
npm run dev
```

### Otra alternativa (Aun trabajando en eso)

```
Con Docker no hace falta hacer nada, solo tener docker instalado
https://www.docker.com/

docker-compose up
```

## 🔗 Links

[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/gsanchez1687/)