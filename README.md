# Generador de Números Aleatorios

Aplicación PHP orientada a objetos que genera N números aleatorios y muestra estadísticas.

## Requisitos

- Docker
- docker-compose
- Puerto 8082 disponible

## Despliegue

1. Colocar esta carpeta en `./html/noo/` del proyecto que contiene `docker-compose.yml`.
2. Ejecutar `docker-compose up -d`
3. Abrir http://localhost:8082/noo/

## Uso

1. Ingrese la cantidad de números a generar (1-1000).
2. (Opcional) Establezca valores mínimo y máximo.
3. Click en "Generar".
4. La tabla muestra: índice, número aleatorio, suma, promedio, mínimo y máximo.

## Notas

- PHP 7.4 compatible (sin sintaxis de PHP 8+).
- Sin Composer; todas las clases se cargan con `require_once`.
- Implementa patrón PRG (Post/Redirect/Get) para evitar reenvío de formularios.
- Salida escapada para prevenir XSS.