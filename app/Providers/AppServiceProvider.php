<?php

namespace App\Providers;

use App\Domain\CategoriaConcepto\Repositories\CategoriaConceptoRepositoryInterface;
use App\Domain\ConceptoCobro\Repositories\ConceptoCobroRepositoryInterface;
use App\Domain\Departamento\Repositories\DepartamentoRepositoryInterface;
use App\Domain\Municipio\Repositories\MunicipioRepositoryInterface;
use App\Domain\ParametroConjunto\Repositories\ParametroConjuntoRepositoryInterface;
use App\Domain\ParametroSistema\Repositories\ParametroSistemaRepositoryInterface;
use App\Domain\Permiso\Repositories\PermisoRepositoryInterface;
use App\Domain\RolPermiso\Repositories\RolPermisoRepositoryInterface;
use App\Domain\Bloque\Repositories\BloqueRepositoryInterface;
use App\Domain\Conjunto\Repositories\ConjuntoRepositoryInterface;
use App\Domain\ConjuntoUsuario\Repositories\ConjuntoUsuarioRepositoryInterface;
use App\Domain\ConjuntoEstado\Repositories\ConjuntoEstadoRepositoryInterface;
use App\Domain\ConjuntoTipo\Repositories\ConjuntoTipoRepositoryInterface;
use App\Domain\Pais\Repositories\PaisRepositoryInterface;
use App\Domain\Rol\Repositories\RolRepositoryInterface;
use App\Domain\Unidad\Repositories\UnidadRepositoryInterface;
use App\Domain\UnidadOcupante\Repositories\UnidadOcupanteRepositoryInterface;
use App\Domain\UnidadEstado\Repositories\UnidadEstadoRepositoryInterface;
use App\Domain\Usuario\Repositories\UsuarioRepositoryInterface;
use App\Domain\UsuarioEstado\Repositories\UsuarioEstadoRepositoryInterface;
use App\Domain\UsuarioTipoDocumento\Repositories\UsuarioTipoDocumentoRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\EloquentCategoriaConceptoRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentConceptoCobroRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentDepartamentoRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentMunicipioRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentParametroConjuntoRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentParametroSistemaRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentPermisoRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentRolPermisoRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentBloqueRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentConjuntoRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentConjuntoUsuarioRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentConjuntoEstadoRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentConjuntoTipoRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentPaisRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentRolRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentUnidadRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentUnidadOcupanteRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentUnidadEstadoRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentUsuarioRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentUsuarioEstadoRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentUsuarioTipoDocumentoRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PaisRepositoryInterface::class, EloquentPaisRepository::class);
        $this->app->bind(DepartamentoRepositoryInterface::class, EloquentDepartamentoRepository::class);
        $this->app->bind(MunicipioRepositoryInterface::class, EloquentMunicipioRepository::class);
        $this->app->bind(PermisoRepositoryInterface::class, EloquentPermisoRepository::class);
        $this->app->bind(ParametroConjuntoRepositoryInterface::class, EloquentParametroConjuntoRepository::class);
        $this->app->bind(ParametroSistemaRepositoryInterface::class, EloquentParametroSistemaRepository::class);
        $this->app->bind(BloqueRepositoryInterface::class, EloquentBloqueRepository::class);
        $this->app->bind(ConjuntoRepositoryInterface::class, EloquentConjuntoRepository::class);
        $this->app->bind(ConjuntoUsuarioRepositoryInterface::class, EloquentConjuntoUsuarioRepository::class);
        $this->app->bind(ConjuntoTipoRepositoryInterface::class, EloquentConjuntoTipoRepository::class);
        $this->app->bind(ConjuntoEstadoRepositoryInterface::class, EloquentConjuntoEstadoRepository::class);
        $this->app->bind(UnidadRepositoryInterface::class, EloquentUnidadRepository::class);
        $this->app->bind(UnidadOcupanteRepositoryInterface::class, EloquentUnidadOcupanteRepository::class);
        $this->app->bind(UnidadEstadoRepositoryInterface::class, EloquentUnidadEstadoRepository::class);
        $this->app->bind(UsuarioRepositoryInterface::class, EloquentUsuarioRepository::class);
        $this->app->bind(UsuarioEstadoRepositoryInterface::class, EloquentUsuarioEstadoRepository::class);
        $this->app->bind(UsuarioTipoDocumentoRepositoryInterface::class, EloquentUsuarioTipoDocumentoRepository::class);
        $this->app->bind(RolPermisoRepositoryInterface::class, EloquentRolPermisoRepository::class);
        $this->app->bind(RolRepositoryInterface::class, EloquentRolRepository::class);
        $this->app->bind(CategoriaConceptoRepositoryInterface::class, EloquentCategoriaConceptoRepository::class);
        $this->app->bind(ConceptoCobroRepositoryInterface::class, EloquentConceptoCobroRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
