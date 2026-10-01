<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PaisController;
use App\Http\Controllers\Api\CiudadController;
use App\Http\Controllers\Api\DestinoController;
use App\Http\Controllers\Api\CategoriaDestinoController;
use App\Http\Controllers\Api\AtraccionTuristicaController;
use App\Http\Controllers\Api\PersonaController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\EmpleadoController;
use App\Http\Controllers\Api\GuiaTuristicoController;
use App\Http\Controllers\Api\ProveedorController;
use App\Http\Controllers\Api\ProveedorContactoController;
use App\Http\Controllers\Api\MembresiaController;
use App\Http\Controllers\Api\ClienteMembresiaController;
use App\Http\Controllers\Api\TipoViajeController;
use App\Http\Controllers\Api\TemporadaController;
use App\Http\Controllers\Api\ViajeController;
use App\Http\Controllers\Api\ItinerarioController;
use App\Http\Controllers\Api\CategoriaActividadController;
use App\Http\Controllers\Api\ActividadTuristicaController;
use App\Http\Controllers\Api\ItinerarioActividadController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\TipoHabitacionController;
use App\Http\Controllers\Api\HabitacionController;
use App\Http\Controllers\Api\ServicioHotelController;
use App\Http\Controllers\Api\EmpresaTransporteController;
use App\Http\Controllers\Api\VehiculoController;
use App\Http\Controllers\Api\RutaController;
use App\Http\Controllers\Api\TransporteController;
use App\Http\Controllers\Api\SeguroViajeController;
use App\Http\Controllers\Api\ReservaController;
use App\Http\Controllers\Api\CancelacionController;
use App\Http\Controllers\Api\DestinoCategoriasController;
use App\Http\Controllers\Api\ActividadCategoriasController;
use App\Http\Controllers\Api\ViajeHotelesController;
use App\Http\Controllers\Api\ViajeTransportesController;

Route::prefix('v1')->name('api.v1.')->group(function () {

    Route::apiResource('paises', PaisController::class)
        ->where(['pais' => '[0-9]+'])
        ->parameters(['paises' => 'pais'])
        ->only(['index', 'show']);

    Route::apiResource('ciudades', CiudadController::class)
        ->where(['ciudad' => '[0-9]+'])
        ->parameters(['ciudades' => 'ciudad'])
        ->only(['index', 'show']);

    Route::apiResource('destinos', DestinoController::class)
        ->where(['destino' => '[0-9]+'])
        ->parameters(['destinos' => 'destino'])
        ->only(['index', 'show']);

    Route::apiResource('categorias-destino', CategoriaDestinoController::class)
        ->where(['categoriaDestino' => '[0-9]+'])
        ->parameters(['categorias-destino' => 'categoriaDestino'])
        ->only(['index', 'show']);

    Route::apiResource('atracciones-turisticas', AtraccionTuristicaController::class)
        ->where(['atraccionTuristica' => '[0-9]+'])
        ->parameters(['atracciones-turisticas' => 'atraccionTuristica'])
        ->only(['index', 'show']);

    Route::apiResource('personas', PersonaController::class)
        ->where(['persona' => '[0-9]+'])
        ->parameters(['personas' => 'persona'])
        ->only(['index', 'show']);

    Route::apiResource('usuarios', UsuarioController::class)
        ->where(['usuario' => '[0-9]+'])
        ->parameters(['usuarios' => 'usuario'])
        ->only(['index', 'show']);

    Route::apiResource('clientes', ClienteController::class)
        ->where(['cliente' => '[0-9]+'])
        ->parameters(['clientes' => 'cliente'])
        ->only(['index', 'show']);

    Route::apiResource('empleados', EmpleadoController::class)
        ->where(['empleado' => '[0-9]+'])
        ->parameters(['empleados' => 'empleado'])
        ->only(['index', 'show']);

    Route::apiResource('guias-turisticos', GuiaTuristicoController::class)
        ->where(['guiaTuristico' => '[0-9]+'])
        ->parameters(['guias-turisticos' => 'guiaTuristico'])
        ->only(['index', 'show']);

    Route::apiResource('proveedores', ProveedorController::class)
        ->where(['proveedor' => '[0-9]+'])
        ->parameters(['proveedores' => 'proveedor'])
        ->only(['index', 'show']);

    Route::apiResource('proveedores-contactos', ProveedorContactoController::class)
        ->where(['proveedorContacto' => '[0-9]+'])
        ->parameters(['proveedores-contactos' => 'proveedorContacto'])
        ->only(['index', 'show']);

    Route::apiResource('membresias', MembresiaController::class)
        ->where(['membresia' => '[0-9]+'])
        ->parameters(['membresias' => 'membresia'])
        ->only(['index', 'show']);

    Route::apiResource('clientes-membresias', ClienteMembresiaController::class)
        ->where(['clienteMembresia' => '[0-9]+'])
        ->parameters(['clientes-membresias' => 'clienteMembresia'])
        ->only(['index', 'show']);

    Route::apiResource('tipos-viaje', TipoViajeController::class)
        ->where(['tipoViaje' => '[0-9]+'])
        ->parameters(['tipos-viaje' => 'tipoViaje'])
        ->only(['index', 'show']);

    Route::apiResource('temporadas', TemporadaController::class)
        ->where(['temporada' => '[0-9]+'])
        ->parameters(['temporadas' => 'temporada'])
        ->only(['index', 'show']);

    Route::apiResource('viajes', ViajeController::class)
        ->where(['viaje' => '[0-9]+'])
        ->parameters(['viajes' => 'viaje'])
        ->only(['index', 'show']);

    Route::apiResource('itinerarios', ItinerarioController::class)
        ->where(['itinerario' => '[0-9]+'])
        ->parameters(['itinerarios' => 'itinerario'])
        ->only(['index', 'show']);

    Route::apiResource('categorias-actividad', CategoriaActividadController::class)
        ->where(['categoriaActividad' => '[0-9]+'])
        ->parameters(['categorias-actividad' => 'categoriaActividad'])
        ->only(['index', 'show']);

    Route::apiResource('actividades-turisticas', ActividadTuristicaController::class)
        ->where(['actividadTuristica' => '[0-9]+'])
        ->parameters(['actividades-turisticas' => 'actividadTuristica'])
        ->only(['index', 'show']);

    Route::apiResource('itinerario-actividades', ItinerarioActividadController::class)
        ->where(['itinerarioActividad' => '[0-9]+'])
        ->parameters(['itinerario-actividades' => 'itinerarioActividad'])
        ->only(['index', 'show']);

    Route::apiResource('hoteles', HotelController::class)
        ->where(['hotel' => '[0-9]+'])
        ->parameters(['hoteles' => 'hotel'])
        ->only(['index', 'show']);

    Route::apiResource('tipos-habitacion', TipoHabitacionController::class)
        ->where(['tipoHabitacion' => '[0-9]+'])
        ->parameters(['tipos-habitacion' => 'tipoHabitacion'])
        ->only(['index', 'show']);

    Route::apiResource('habitaciones', HabitacionController::class)
        ->where(['habitacion' => '[0-9]+'])
        ->parameters(['habitaciones' => 'habitacion'])
        ->only(['index', 'show']);

    Route::apiResource('servicios-hotel', ServicioHotelController::class)
        ->where(['servicioHotel' => '[0-9]+'])
        ->parameters(['servicios-hotel' => 'servicioHotel'])
        ->only(['index', 'show']);

    Route::apiResource('empresas-transporte', EmpresaTransporteController::class)
        ->where(['empresaTransporte' => '[0-9]+'])
        ->parameters(['empresas-transporte' => 'empresaTransporte'])
        ->only(['index', 'show']);

    Route::apiResource('vehiculos', VehiculoController::class)
        ->where(['vehiculo' => '[0-9]+'])
        ->parameters(['vehiculos' => 'vehiculo'])
        ->only(['index', 'show']);

    Route::apiResource('rutas', RutaController::class)
        ->where(['ruta' => '[0-9]+'])
        ->parameters(['rutas' => 'ruta'])
        ->only(['index', 'show']);

    Route::apiResource('transportes', TransporteController::class)
        ->where(['transporte' => '[0-9]+'])
        ->parameters(['transportes' => 'transporte'])
        ->only(['index', 'show']);

    Route::apiResource('seguros-viaje', SeguroViajeController::class)
        ->where(['seguroViaje' => '[0-9]+'])
        ->parameters(['seguros-viaje' => 'seguroViaje'])
        ->only(['index', 'show']);

    Route::apiResource('reservas', ReservaController::class)
        ->where(['reserva' => '[0-9]+'])
        ->parameters(['reservas' => 'reserva'])
        ->only(['index', 'show']);

    Route::apiResource('cancelaciones', CancelacionController::class)
        ->where(['cancelacion' => '[0-9]+'])
        ->parameters(['cancelaciones' => 'cancelacion'])
        ->only(['index', 'show']);

    Route::apiResource('destinos.categorias', DestinoCategoriasController::class)
        ->parameters(['destinos' => 'destino','categorias' => 'categoriaDestino'])
        ->where(['destino' => '[0-9]+','categoriaDestino' => '[0-9]+'])
        ->only(['index', 'show']);

    Route::apiResource('actividades-turisticas.categorias', ActividadCategoriasController::class)
        ->parameters(['actividades-turisticas' => 'actividadTuristica','categorias' => 'categoriaActividad'])
        ->where(['actividadTuristica' => '[0-9]+','categoriaActividad' => '[0-9]+'])
        ->only(['index', 'show']);

    Route::apiResource('viajes.hoteles', ViajeHotelesController::class)
        ->parameters(['viajes' => 'viaje','hoteles' => 'hotel'])
        ->where(['viaje' => '[0-9]+','hotel' => '[0-9]+'])
        ->only(['index', 'show']);

    Route::apiResource('viajes.transportes', ViajeTransportesController::class)
        ->parameters(['viajes' => 'viaje','transportes' => 'transporte'])
        ->where(['viaje' => '[0-9]+','transporte' => '[0-9]+'])
        ->only(['index', 'show']);

    Route::middleware('throttle:10,1')->group(function () {
        Route::apiResource('paises', PaisController::class)
        ->where(['pais' => '[0-9]+'])
        ->parameters(['paises' => 'pais'])
            ->except(['index', 'show']);

        Route::apiResource('ciudades', CiudadController::class)
        ->where(['ciudad' => '[0-9]+'])
        ->parameters(['ciudades' => 'ciudad'])
            ->except(['index', 'show']);

        Route::apiResource('destinos', DestinoController::class)
        ->where(['destino' => '[0-9]+'])
        ->parameters(['destinos' => 'destino'])
            ->except(['index', 'show']);

        Route::apiResource('categorias-destino', CategoriaDestinoController::class)
        ->where(['categoriaDestino' => '[0-9]+'])
        ->parameters(['categorias-destino' => 'categoriaDestino'])
            ->except(['index', 'show']);

        Route::apiResource('atracciones-turisticas', AtraccionTuristicaController::class)
        ->where(['atraccionTuristica' => '[0-9]+'])
        ->parameters(['atracciones-turisticas' => 'atraccionTuristica'])
            ->except(['index', 'show']);

        Route::apiResource('personas', PersonaController::class)
        ->where(['persona' => '[0-9]+'])
        ->parameters(['personas' => 'persona'])
            ->except(['index', 'show']);

        Route::apiResource('usuarios', UsuarioController::class)
        ->where(['usuario' => '[0-9]+'])
        ->parameters(['usuarios' => 'usuario'])
            ->except(['index', 'show']);

        Route::apiResource('clientes', ClienteController::class)
        ->where(['cliente' => '[0-9]+'])
        ->parameters(['clientes' => 'cliente'])
            ->except(['index', 'show']);

        Route::apiResource('empleados', EmpleadoController::class)
        ->where(['empleado' => '[0-9]+'])
        ->parameters(['empleados' => 'empleado'])
            ->except(['index', 'show']);

        Route::apiResource('guias-turisticos', GuiaTuristicoController::class)
        ->where(['guiaTuristico' => '[0-9]+'])
        ->parameters(['guias-turisticos' => 'guiaTuristico'])
            ->except(['index', 'show']);

        Route::apiResource('proveedores', ProveedorController::class)
        ->where(['proveedor' => '[0-9]+'])
        ->parameters(['proveedores' => 'proveedor'])
            ->except(['index', 'show']);

        Route::apiResource('proveedores-contactos', ProveedorContactoController::class)
        ->where(['proveedorContacto' => '[0-9]+'])
        ->parameters(['proveedores-contactos' => 'proveedorContacto'])
            ->except(['index', 'show']);

        Route::apiResource('membresias', MembresiaController::class)
        ->where(['membresia' => '[0-9]+'])
        ->parameters(['membresias' => 'membresia'])
            ->except(['index', 'show']);

        Route::apiResource('clientes-membresias', ClienteMembresiaController::class)
        ->where(['clienteMembresia' => '[0-9]+'])
        ->parameters(['clientes-membresias' => 'clienteMembresia'])
            ->except(['index', 'show']);

        Route::apiResource('tipos-viaje', TipoViajeController::class)
        ->where(['tipoViaje' => '[0-9]+'])
        ->parameters(['tipos-viaje' => 'tipoViaje'])
            ->except(['index', 'show']);

        Route::apiResource('temporadas', TemporadaController::class)
        ->where(['temporada' => '[0-9]+'])
        ->parameters(['temporadas' => 'temporada'])
            ->except(['index', 'show']);

        Route::apiResource('viajes', ViajeController::class)
        ->where(['viaje' => '[0-9]+'])
        ->parameters(['viajes' => 'viaje'])
            ->except(['index', 'show']);

        Route::apiResource('itinerarios', ItinerarioController::class)
        ->where(['itinerario' => '[0-9]+'])
        ->parameters(['itinerarios' => 'itinerario'])
            ->except(['index', 'show']);

        Route::apiResource('categorias-actividad', CategoriaActividadController::class)
        ->where(['categoriaActividad' => '[0-9]+'])
        ->parameters(['categorias-actividad' => 'categoriaActividad'])
            ->except(['index', 'show']);

        Route::apiResource('actividades-turisticas', ActividadTuristicaController::class)
        ->where(['actividadTuristica' => '[0-9]+'])
        ->parameters(['actividades-turisticas' => 'actividadTuristica'])
            ->except(['index', 'show']);

        Route::apiResource('itinerario-actividades', ItinerarioActividadController::class)
        ->where(['itinerarioActividad' => '[0-9]+'])
        ->parameters(['itinerario-actividades' => 'itinerarioActividad'])
            ->except(['index', 'show']);

        Route::apiResource('hoteles', HotelController::class)
        ->where(['hotel' => '[0-9]+'])
        ->parameters(['hoteles' => 'hotel'])
            ->except(['index', 'show']);

        Route::apiResource('tipos-habitacion', TipoHabitacionController::class)
        ->where(['tipoHabitacion' => '[0-9]+'])
        ->parameters(['tipos-habitacion' => 'tipoHabitacion'])
            ->except(['index', 'show']);

        Route::apiResource('habitaciones', HabitacionController::class)
        ->where(['habitacion' => '[0-9]+'])
        ->parameters(['habitaciones' => 'habitacion'])
            ->except(['index', 'show']);

        Route::apiResource('servicios-hotel', ServicioHotelController::class)
        ->where(['servicioHotel' => '[0-9]+'])
        ->parameters(['servicios-hotel' => 'servicioHotel'])
            ->except(['index', 'show']);

        Route::apiResource('empresas-transporte', EmpresaTransporteController::class)
        ->where(['empresaTransporte' => '[0-9]+'])
        ->parameters(['empresas-transporte' => 'empresaTransporte'])
            ->except(['index', 'show']);

        Route::apiResource('vehiculos', VehiculoController::class)
        ->where(['vehiculo' => '[0-9]+'])
        ->parameters(['vehiculos' => 'vehiculo'])
            ->except(['index', 'show']);

        Route::apiResource('rutas', RutaController::class)
        ->where(['ruta' => '[0-9]+'])
        ->parameters(['rutas' => 'ruta'])
            ->except(['index', 'show']);

        Route::apiResource('transportes', TransporteController::class)
        ->where(['transporte' => '[0-9]+'])
        ->parameters(['transportes' => 'transporte'])
            ->except(['index', 'show']);

        Route::apiResource('seguros-viaje', SeguroViajeController::class)
        ->where(['seguroViaje' => '[0-9]+'])
        ->parameters(['seguros-viaje' => 'seguroViaje'])
            ->except(['index', 'show']);

        Route::apiResource('reservas', ReservaController::class)
        ->where(['reserva' => '[0-9]+'])
        ->parameters(['reservas' => 'reserva'])
            ->except(['index', 'show']);

        Route::apiResource('cancelaciones', CancelacionController::class)
        ->where(['cancelacion' => '[0-9]+'])
        ->parameters(['cancelaciones' => 'cancelacion'])
            ->except(['index', 'show']);

        Route::apiResource('destinos.categorias', DestinoCategoriasController::class)
        ->parameters(['destinos' => 'destino','categorias' => 'categoriaDestino'])
        ->where(['destino' => '[0-9]+','categoriaDestino' => '[0-9]+'])
            ->except(['index', 'show']);

        Route::apiResource('actividades-turisticas.categorias', ActividadCategoriasController::class)
        ->parameters(['actividades-turisticas' => 'actividadTuristica','categorias' => 'categoriaActividad'])
        ->where(['actividadTuristica' => '[0-9]+','categoriaActividad' => '[0-9]+'])
            ->except(['index', 'show']);

        Route::apiResource('viajes.hoteles', ViajeHotelesController::class)
        ->parameters(['viajes' => 'viaje','hoteles' => 'hotel'])
        ->where(['viaje' => '[0-9]+','hotel' => '[0-9]+'])
            ->except(['index', 'show']);

        Route::apiResource('viajes.transportes', ViajeTransportesController::class)
        ->parameters(['viajes' => 'viaje','transportes' => 'transporte'])
        ->where(['viaje' => '[0-9]+','transporte' => '[0-9]+'])
            ->except(['index', 'show']);
    });
});
