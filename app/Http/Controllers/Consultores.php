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
                            ->select('cao_usuario.no_usuario', 'permissao_sistema.co_sistema', 'permissao_sistema.in_ativo', 'permissao_sistema.co_tipo_usuario')
                            ->where('permissao_sistema.in_ativo', 'LIKE', 'S')
                            ->where('permissao_sistema.co_sistema', '=', 1)
                            ->whereBetween('permissao_sistema.co_tipo_usuario', [0,2] )
                            ->get();
        return $cao_usuarios;
    }
}
