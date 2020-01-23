<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Consultores extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {

    }
    
    public function getConsultores(Request $request)
    {

        $cao_usuarios = DB::table('cao_usuario')
                            ->join('permissao_sistema', 'cao_usuario.co_usuario', '=', 'permissao_sistema.co_usuario')
                            ->join('cao_salario', 'cao_usuario.co_usuario', '=', 'cao_salario.co_usuario')
                            ->select('cao_usuario.co_usuario','cao_usuario.no_usuario', 'permissao_sistema.co_sistema', 'permissao_sistema.in_ativo', 'permissao_sistema.co_tipo_usuario','cao_salario.brut_salario')
                            ->where('permissao_sistema.in_ativo', 'LIKE', 'S')
                            ->where('permissao_sistema.co_sistema', '=', 1)
                            ->whereBetween('permissao_sistema.co_tipo_usuario', [0,2] )
                            ->get();
        return $cao_usuarios;
    }
    public function getGanancias()
    {
        /*
            SELECT os.co_sistema,os.co_usuario,os.ds_os,os.ds_caracteristica,fac.co_cliente,fac.valor,fac.total_imp_inc,fac.total
            FROM `cao_os`as os ,cao_fatura as fac 
            WHERE os.co_usuario LIKE 'carlos.arruda'
            AND fac.co_os LIKE os.co_os      
            
            -- SALARIO [BRUT_SALARIO]
            SELECT * from cao_salario WHERE co_usuario = 'carlos.arruda' 
        
        */
    }
}
