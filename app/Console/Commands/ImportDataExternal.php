<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\Cultores;
use App\Models\Distrital;
use App\Models\Distrito;
use App\Models\Reina;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportDataExternal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-data-external';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        // Conexión a la base de datos externa
        $externalDB = DB::connection('external_pgsql');

        // 1. Importar la tabla 'administracion'
        $externalAdmin = $externalDB->table('administracion')->get();
        foreach ($externalAdmin as $item) {
            Admin::updateOrInsert(
                ['id' => $item->id],
                [
                    'usuario' => $item->usuario,
                    'clave' => $item->clave,
                    'rol' => $item->rol,
                    'habilitado' => $item->habilitado,
                ]
            );
        }

        // 2. Importar la tabla 'cultores'
        $externalCultores = $externalDB->table('cultores')->get();
        foreach ($externalCultores as $item) {
            Cultores::updateOrInsert(
                ['id' => $item->id],
                [
                    'nombre' => $item->nombre,
                    'categoria' => $item->categoria,
                    'descripcion' => $item->descripcion,
                    'foto' => $item->foto,
                    'categoria_gral' => $item->categoria_gral,
                ]
            );
        }

        // 3. Importar la tabla 'distritos'
        $externalDistritos = $externalDB->table('distritos')->get();
        foreach ($externalDistritos as $item) {
            Distrito::updateOrInsert(
                ['id' => $item->id],
                [
                    'nombre' => $item->nombre,
                ]
            );
        }

        // 4. Importar la tabla 'distritales'
        $externalDistritales = $externalDB->table('distritales')->get();
        foreach ($externalDistritales as $item) {
            Distrital::updateOrInsert(
                ['id' => $item->id],
                [
                    'nombre' => $item->nombre,
                    'frase' => $item->frase,
                    'foto' => $item->foto,
                    'distrito' => $item->distrito,
                    'unico' => $item->unico,
                ]
            );
        }

        // 5. Importar la tabla 'reinas'
        $externalReinas = $externalDB->table('reinas')->get();
        foreach ($externalReinas as $item) {
            Reina::updateOrInsert(
                [
                    'id' => $item->id
                ],
                [
                    'nombre' => $item->nombre,
                    'frase' => $item->frase,
                    'foto' => $item->foto,
                    'distrito' => $item->distrito,
                    'observaciones' => $item?->observaciones,
                    'miniatura' => $item->miniatura,
                ]
            );
        }

        // 6. Importar la tabla 'residentes'
        $externalResidentes = $externalDB->table('residentes')->get();
        foreach ($externalResidentes as $item) {
            User::updateOrInsert(
                [
                    'dni' => $item->dni
                ],
                [
                    'dni' => $item->dni,
                    'apellido' => $item->apellido,
                    'nombre' => $item->nombre,
                    'anio' => $item->anio,
                    'domicilio' => $item->domicilio,
                    'email' => $item?->email,
                    'clave' => $item?->clave,
                    'distrital' => 0,
                    'habilitado' => $item->habilitado,
                    'observaciones' => $item->observaciones,
                    'artes' => $item->artes,
                    'educacion' => $item->educacion,
                    'salud' => $item->salud,
                    'deportes' => $item->deportes,
                    'laborsocial' => $item->laborsocial,
                    'economia' => $item->economia,
                    'tipo' => $item->tipo,
                    'vendimia' => $item->vendimia,
                    'artes_gral' => $item->artes_gral,
                    'educacion_gral' => $item->educacion_gral,
                    'salud_gral' => $item->salud_gral,
                    'deportes_gral' => $item->deportes_gral,
                    'laborsocial_gral' => $item->laborsocial_gral,
                    'economia_gral' => $item->economia_gral,
                ]
            );
        }

        $this->info('Sincronización completa.');
    }
}
