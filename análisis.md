# Problemática

El sistema será capáz de manejar Lotes y cada lote contará con Fecha de Creación de Lote, nombre del cliente, cuántos artículos, costo del pedido, costo de envío, el anticipo del pedido.

También se manejará un detalle de cada pedido de cliente, donde se almacena el nombre de la prenda o artículo compró, que color, que talla, que cantidad, cuanto cuesta en app.

## Entidades
1. Lote 
    - Fecha de Creación
    - Cliente
    - Número de Artículos
    - Costo de Pedido
    - Costo de Envío
    - Anticipo de Pedido
    - Tipo de Venta:
        - Contado
        - Crédito
2. Detalle Pedido
    - Tipo Pedido:
        - Aereo
        - Marítimo
    - Cliente
    - Artículo
    - Color
    - Talla
    - Precio Artículo App
    - Cantidad
    - Precio Según Cantidad
3. Cliente
    - Nombre
    - Estado
4. Usuarios
    - UID
    - Nombre
    - Correo Electrónico
    - Rol
5. Roles:
    - Nombre


## Entidad Relación (Primera Versión)
