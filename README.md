# Proyecto Final Grupo 6 ADSI #1834480

### TUTORIAL DE INSTALACIÓN (Laragon)

***Antes de Empezar ve a al gestor de bases de datos y crea una base de datos con el nombre*** `agapectg`

Ve a la carpeta `www` (Root), click derecho, selecciona `Git Bash Here` y ejecuta los siguientes comandos.
1. `git clone https://github.com/Juan0209/agapectg.git`
2. `cd agapectg`
3. `composer install`
4. `php artisan key: generate`
5. `php artisan migrate –seed`
6. `php artisan storage:link`

Listo, con eso ya deberías tener el proyecto funcionando correctamente.


### TARJETAS DE PRUEBA PARA REALIZAR EL PROCESO DE COMPRA

###### Transacción Aceptada
- Franquicia: Visa
- Número: 4575623182290326
- Fecha Expiración: 12/2025
- CVV: 123
- Estado: Aceptada
- Response: Aceptada


###### Transacción Fondos insuficientes
- Franquicia: Visa
- Número: 4151611527583283
- Fecha Expiración: 12/2025
- CVV: 123
- Estado: Rechazada
- Response: Fondos insuficientes


###### Transacción Fallida
- Franquicia: Mastercard
- Número: 5170394490379427
- Fecha Expiración: 12/2025
- CVV: 123
- Estado: Fallida
- Response: Error de comunicación con el centro de autorizaciones


###### Transacción Pendiente
- Franquicia: American Express
- Número: 373118856457642
- Fecha Expiración: 12/2025
- CVV: 123
- Estado: Pendiente
- Response: Transacción pendiente por validación


### REQUERIMIENTOS
- PHP `^7.8`
- Composer
- Node.js
- Git (Opcional)
- Laragon (Obligatorio)

***Actualizar `PHP` a la ultima versión `^8.1` en `Laragon`***



### INFORMACIÓN ADICIONAL

Nombre del proyecto: agapectg.

Destinatario: ÁgapeDesign ([@agapectg](https://www.instagram.com/agapectg/)).

Creado por: Juan García ([@juang_0209](https://www.instagram.com/juang_0209/)), Sebastián Blanquicet ([@seblanquicett](https://www.instagram.com/sebastianblanquicett/)) y wilfer Bru ([@wilferjose](https://www.instagram.com/wilferjose/)).

Tipo de proyecto: Tienda Online.
