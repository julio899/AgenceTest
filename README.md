

## Test Agence in Laravel
Requerimientos Base de Datos archivo `SQL Base`
**correr en terminal**
#### Montando la BD en Servicios Cloud de Amazon
> mysql -h bdinstanceap.server.us-east-1.rds.amazonaws.com -u username -pAlgunaClave. < ~/Descargas/banco_de_dados.sql

#### Instalacion de Dependencias
> composer install

#### Creacion de Estructuras para el Login
> php artisan migrate:fresh --seed

        - Otra forma para correr sin confirmar
        > `heroku run /app/php/bin/php /app/www/artisan migrate:fresh --seed`

        - Entrada a **bash** en heroku
        
        `heroku run bash`
        `git push heroku master`


#### Actualizando contenedor
> heroku run "php artisan migrate:fresh --seed"

![peview0](https://raw.githubusercontent.com/julio899/AgenceTest/master/public/img/preview0.png)

![peview](https://raw.githubusercontent.com/julio899/AgenceTest/master/public/img/preview.png)

![phpunit](https://raw.githubusercontent.com/julio899/AgenceTest/master/public/img/test.png)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
