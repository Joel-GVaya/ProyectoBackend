
# Proyecto Teleasistencia

![Vista previa de la aplicación](/teleasistencia.png)

# Descripción

Nuestra aplicación de teleasistencia mejora la calidad de vida de los usuarios al facilitar el acceso a servicios médicos y apoyo emocional sin necesidad de desplazamientos. Proporciona una manera efectiva de monitorear la salud y gestionar tratamientos, así como de ofrecer compañía y asistencia en situaciones de emergencia. Además, permite a los profesionales de la salud optimizar su tiempo y recursos.

# Tabla de Contenidos

1. [Tecnologías utilizadas](#tecnologías-utilizadas)
2. [Puesta en marcha](#puesta-en-marcha)
3. [Entornos](#entornos)
4. [Documentación de desarrollo](#documentación-de-desarrollo)
5. [Guía de Contribución](#guía-de-contribución)
6. [Lista de Contribuidores](#lista-de-contribuidores)
7. [Inspiración](#inspiración)
8. [Licencia](#licencia)

## Tecnologías utilizadas

- **Frontend**: [Vue.js](https://vuejs.org/guide/introduction) para crear una interfaz de usuario interactiva y responsiva.
- **Backend**: [Laravel](https://laravel.com/docs/11.x/readme) como API para gestionar la lógica del negocio y la comunicación con la base de datos.
- **Gestión de Estado**: [Pinia](https://pinia.vuejs.org/) para manejar el estado global de la aplicación.
- **Base de Datos**: [MySQL](https://dev.mysql.com/doc/) para almacenar la información de pacientes y profesionales de la salud.

## Puesta en marcha

Para poner en marcha el proyecto, sigue estos pasos:

### Backend

```bash
mkdir backend
cd backend
git clone https://github.com/Joel-GVaya/ProyectoBackend
composer install
./vendor/bin/sail up -d
```

### Frontend

```bash
mkdir frontend
cd frontend
git clone https://github.com/Joel-GVaya/ProyectoFrontend
npm install
npm run dev
```

## Entornos

- **Frontend**
  - Desarrollo: https://localhost:3000
  - Staging: http://front.projectegrup3.ddaw.es/
  
- **Backend**
  - Desarrollo: https://localhost:8000/api
  - Staging: http://back.projectegrup3.ddaw.es/
  
- **Producción**: http://www.projectegrup3.ddaw.es/

## Guía de Contribución 

Cualquier contribución al proyecto deberá seguir las siguientes [normas de contribución](CONTRIBUTING.md).

## Documentación de desarrollo

Aquí están los enlaces a la documentación de las tecnologías utilizadas en el proyecto:

- [Vue.js](https://vuejs.org/guide/introduction)
- [Laravel](https://laravel.com/docs/11.x/readme)
- [Pinia](https://pinia.vuejs.org/)
- [MySQL](https://dev.mysql.com/doc/)

## Lista de Contribuidores

**Contributors Proyecto conjunto beta (antes de separar):**
<a href="https://github.com/Tartanillas/ProyectoFinal/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=Tartanillas/ProyectoFinal" />
</a>

**Contributors Backend:**
<a href="https://github.com/Joel-GVaya/ProyectoBackend/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=Joel-GVaya/ProyectoBackend" />
</a>

**Contributors Frontend:**
<a href="https://github.com/Joel-GVaya/ProyectoFrontend/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=Joel-GVaya/ProyectoFrontend" />
</a>

## Inspiración

Este proyecto se desarrolla como respuesta a la necesidad de nuestras compañeras del grado de Asistencia, inspirado en sus versiones anteriores obsoletas.

## Licencia

Este proyecto se desarrolla y distribuye de acuerdo a los términos de la [Licencia MIT](LICENSE) incluida.
