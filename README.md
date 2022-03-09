## Sobre la API 

Se realizó el desarrollo de una API con PHP/Laravel que permite hacer registro y login de usuarios generando un token de autenticación. La API permite Crear, Leer, Editar y Eliminar productos y categorías. Para poder probar la API con postman, se debe configurar en los headers la siguiente información: Accept: application/json y Content-type: application/json.


## API endpoinds (No requieren autenticación)

### GET api/

Retorna el listado de productos que se encuentran en la tabla products. Esta información incluye todos los detalles de paginación y cantidad de productos.

### POST api/register

Permite crear un usuario agregando los parámetros obligatorios (name, email y password). Retorna el token de autenticación para los usuarios que se registran satisfactoriamente

### POST api/login

Permite hacer login a un usuario ya registrado agregando los parámetros obligatorios (email y password). Retorna el token de autenticación.


## API endpoinds (Requieren autenticación - Token)

En estos endpoinds se debe agregar el token de autenticación generado en el login o en el register, en la parte de autorización como un bearer token.

### GET api/categorias

Retorna todas las categorías de productos que se encuentran en la tabla categories.

### POST api/categorías

Permite la creación de una nueva categoría para los productos agregando el parámetro obligatorio (name). Retorna la categoría creada.

### GET api/categorías/{id}

Retorna el detalle de una categoría especifica.

### PUT api/categoias/{id}

Permite la actualización de una categoría según el id indicado en la URI y agregando el parámetro obligatorio (name). Retorna la categoría actualizada.

### DELETE api/categorías/{id}

Permite eliminar una categoría según el id indicado en la URI. Retorna un código de estado 204.

### GET api/productos
Retorna todos los productos que se encuentran en la tabla products.

### POST api/productos

Permite la creación de un nuevo producto agregando los parámetros obligatorios (category_id, name, pricing, url_image, status). Retorna el producto creado.

### GET api/productos/{id}

Retorna el detalle de un producto específico.

### PUT api/productos/{id}

Permite la actualización de un producto según el id indicado en la URI y agregando los parámetros obligatorios (category_id, name, pricing, url_image, status). Retorna el producto actualizado.

### DELETE api/productos/{id}

Permite eliminar un producto según el id indicado en la URI. Retorna un código de estado 204.

