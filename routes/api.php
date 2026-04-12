<?php

use App\Http\Controllers\Api\CategoriaConceptoController;
use App\Http\Controllers\Api\ConceptoCobroController;
use App\Http\Controllers\Api\ParametroConjuntoController;
use App\Http\Controllers\Api\RolPermisoController;
use App\Http\Controllers\Api\PermisoController;
use App\Http\Controllers\Api\ParametroSistemaController;
use App\Http\Controllers\Api\ConjuntoController;
use App\Http\Controllers\Api\BloqueController;
use App\Http\Controllers\Api\UnidadController;
use App\Http\Controllers\Api\DepartamentoController;
use App\Http\Controllers\Api\MunicipioController;
use App\Http\Controllers\Api\ConjuntoEstadoController;
use App\Http\Controllers\Api\ConjuntoTipoController;
use App\Http\Controllers\Api\PaisController;
use App\Http\Controllers\Api\RolController;
use App\Http\Controllers\Api\UnidadEstadoController;
use App\Http\Controllers\Api\UsuarioEstadoController;
use App\Http\Controllers\Api\UsuarioTipoDocumentoController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\ConjuntoUsuarioController;
use App\Http\Controllers\Api\UnidadOcupanteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('permisos')->group(function () {
    Route::get('/', [PermisoController::class, 'index']);
    Route::post('/', [PermisoController::class, 'store']);
    Route::get('{id}', [PermisoController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [PermisoController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [PermisoController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [PermisoController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('unidades')->group(function () {
    Route::get('/', [UnidadController::class, 'index']);
    Route::post('/', [UnidadController::class, 'store']);
    Route::get('{id}', [UnidadController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [UnidadController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [UnidadController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [UnidadController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('bloques')->group(function () {
    Route::get('/', [BloqueController::class, 'index']);
    Route::post('/', [BloqueController::class, 'store']);
    Route::get('{id}', [BloqueController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [BloqueController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [BloqueController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [BloqueController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('conjuntos')->group(function () {
    Route::get('/', [ConjuntoController::class, 'index']);
    Route::post('/', [ConjuntoController::class, 'store']);
    Route::get('{id}', [ConjuntoController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [ConjuntoController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [ConjuntoController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [ConjuntoController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('parametros-sistema')->group(function () {
    Route::get('/', [ParametroSistemaController::class, 'index']);
    Route::post('/', [ParametroSistemaController::class, 'store']);
    Route::get('{id}', [ParametroSistemaController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [ParametroSistemaController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [ParametroSistemaController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [ParametroSistemaController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('municipios')->group(function () {
    Route::get('/', [MunicipioController::class, 'index']);
    Route::post('/', [MunicipioController::class, 'store']);
    Route::get('{id}', [MunicipioController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [MunicipioController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [MunicipioController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [MunicipioController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('departamentos')->group(function () {
    Route::get('/', [DepartamentoController::class, 'index']);
    Route::post('/', [DepartamentoController::class, 'store']);
    Route::get('{id}', [DepartamentoController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [DepartamentoController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [DepartamentoController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [DepartamentoController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('paises')->group(function () {
    Route::get('/', [PaisController::class, 'index']);
    Route::post('/', [PaisController::class, 'store']);
    Route::get('{id}', [PaisController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [PaisController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [PaisController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [PaisController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('conjuntos-tipos')->group(function () {
    Route::get('/', [ConjuntoTipoController::class, 'index']);
    Route::post('/', [ConjuntoTipoController::class, 'store']);
    Route::get('{id}', [ConjuntoTipoController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [ConjuntoTipoController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [ConjuntoTipoController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [ConjuntoTipoController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('conjuntos-estados')->group(function () {
    Route::get('/', [ConjuntoEstadoController::class, 'index']);
    Route::post('/', [ConjuntoEstadoController::class, 'store']);
    Route::get('{id}', [ConjuntoEstadoController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [ConjuntoEstadoController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [ConjuntoEstadoController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [ConjuntoEstadoController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('unidades-estados')->group(function () {
    Route::get('/', [UnidadEstadoController::class, 'index']);
    Route::post('/', [UnidadEstadoController::class, 'store']);
    Route::get('{id}', [UnidadEstadoController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [UnidadEstadoController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [UnidadEstadoController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [UnidadEstadoController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('users-estados')->group(function () {
    Route::get('/', [UsuarioEstadoController::class, 'index']);
    Route::post('/', [UsuarioEstadoController::class, 'store']);
    Route::get('{id}', [UsuarioEstadoController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [UsuarioEstadoController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [UsuarioEstadoController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [UsuarioEstadoController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('unidades-ocupantes')->group(function () {
    Route::get('/', [UnidadOcupanteController::class, 'index']);
    Route::post('/', [UnidadOcupanteController::class, 'store']);
    Route::get('{id}', [UnidadOcupanteController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [UnidadOcupanteController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [UnidadOcupanteController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [UnidadOcupanteController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('conjuntos-usuarios')->group(function () {
    Route::get('/', [ConjuntoUsuarioController::class, 'index']);
    Route::post('/', [ConjuntoUsuarioController::class, 'store']);
    Route::get('{id}', [ConjuntoUsuarioController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [ConjuntoUsuarioController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [ConjuntoUsuarioController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [ConjuntoUsuarioController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('usuarios')->group(function () {
    Route::get('/', [UsuarioController::class, 'index']);
    Route::post('/', [UsuarioController::class, 'store']);
    Route::get('{id}', [UsuarioController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [UsuarioController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [UsuarioController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [UsuarioController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('users-tipos-documentos')->group(function () {
    Route::get('/', [UsuarioTipoDocumentoController::class, 'index']);
    Route::post('/', [UsuarioTipoDocumentoController::class, 'store']);
    Route::get('{id}', [UsuarioTipoDocumentoController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [UsuarioTipoDocumentoController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [UsuarioTipoDocumentoController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [UsuarioTipoDocumentoController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('roles')->group(function () {
    Route::get('/', [RolController::class, 'index']);
    Route::post('/', [RolController::class, 'store']);
    Route::get('{id}', [RolController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [RolController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [RolController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [RolController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('roles-permisos')->group(function () {
    Route::get('/', [RolPermisoController::class, 'index']);
    Route::post('/', [RolPermisoController::class, 'store']);
    Route::get('{id}', [RolPermisoController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [RolPermisoController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [RolPermisoController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [RolPermisoController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('parametros-conjuntos')->group(function () {
    Route::get('/', [ParametroConjuntoController::class, 'index']);
    Route::post('/', [ParametroConjuntoController::class, 'store']);
    Route::get('{id}', [ParametroConjuntoController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [ParametroConjuntoController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [ParametroConjuntoController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [ParametroConjuntoController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('conceptos-cobro')->group(function () {
    Route::get('/', [ConceptoCobroController::class, 'index']);
    Route::post('/', [ConceptoCobroController::class, 'store']);
    Route::get('{id}', [ConceptoCobroController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [ConceptoCobroController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [ConceptoCobroController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [ConceptoCobroController::class, 'destroy'])->whereNumber('id');
});

Route::prefix('categorias-conceptos')->group(function () {
    Route::get('/', [CategoriaConceptoController::class, 'index']);
    Route::post('/', [CategoriaConceptoController::class, 'store']);
    Route::get('{id}', [CategoriaConceptoController::class, 'show'])->whereNumber('id');
    Route::put('{id}', [CategoriaConceptoController::class, 'update'])->whereNumber('id');
    Route::patch('{id}', [CategoriaConceptoController::class, 'update'])->whereNumber('id');
    Route::delete('{id}', [CategoriaConceptoController::class, 'destroy'])->whereNumber('id');
});
