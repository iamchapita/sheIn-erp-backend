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
    - Tipo:
        - Aereo
        - Marítimo
2. Detalle Pedido
    - Cliente
    - Artículo
    - Color
    - Talla
    - Precio Artículo App
    - Cantidad
    - Precio Según Cantidad
3. Seguimientos de Pagos
    - Cliente
    - Detalle Pedido
    - Estado
    - Fecha
    - Pedido
    - Envío
    - Pagado
    - Restante
4. Cliente
    - Nombre
    - Estado
5. Usuarios
    - UID
    - Nombre
    - Correo Electrónico
    - Rol
6. Roles:
    - Nombre

## Tablas Y relaciones

1. Cliente:
	- Nombre
	- Estado
2. Lote:
	- id
	- Nombre
	- idPedido
	- Cobrado al Cliente (Calculado)
	- Pagado por Lote
	- Envío Cobrado al Cliente (Calculado)
	- Envío pagado
	- Precio pedidos (Calculado)
	- Tipo Pedido:
        - Aereo
        - Marítimo
	- Fecha de Llegada/Entrega
	- Estado (Archivado)
3. Pedido:
	- id
	- idCliente
	- Precio Pedido (Calculado)
	- Envió Cobrado al Cliente (Calculado)
	- Total a Cobrar al Cliente(Calculado)
	- Pedido Realizado
	- Entregado
	- Tipo Venta:
		- Contado
		- Cŕedito
	- Asignado (Asignado a Lote, True o False)
4. Detalle Pedido:
	- id
	- idPedido
	- Nombre Artículo
    - Color Artículo
    - Talla Artículo
    - Precio Unitario App 
	- Envío Unitario Artículo
    - Cantidad Artículo
    - Total Artículo (Calculado)
	- Cancelado (El cliente canceló el artículo, True o False)
5. Seguimientos de Pagos:
	- id
	- idPedido
	- Estado (Pendiente, Pagado)
	- Anticipo
	- Pagado
	- Restante (Calculado)
	- Fechas
6. Bitácora
	- id
	- Acción Sobre
	- Tipo Acción
	- Usuario

## Entidad Relación (Primera Versión)
