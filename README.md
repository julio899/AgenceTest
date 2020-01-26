

## Test Agence in Laravel
Requerimientos Base de Datos archivo `SQL Base`
**correr en terminal**
#### Montando la BD en Servicios Cloud de Amazon
> mysql -h bdinstanceap.server.us-east-1.rds.amazonaws.com -u username -pAlgunaClave. < ~/Descargas/banco_de_dados.sql

#### Instalacion de Dependencias
> composer install

#### Creacion de Estructuras para el Login
> php artisan migrate:fresh && php artisan db:seed

![peview0](https://raw.githubusercontent.com/julio899/AgenceTest/master/public/img/preview0.png)

![peview](https://raw.githubusercontent.com/julio899/AgenceTest/master/public/img/peview.png)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
