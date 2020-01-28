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

    public function getGananciasGraphi(Request $request)
    {
       $consultores = $this->getConsultores($request);
       $request['fecha']='-';
       $dataConsultoresFull = [ ];
       foreach($consultores as $consultor)
       {
            $consultor->data = $this->getGanancias($request,$consultor->co_usuario);
            $liquido = 0;
            foreach( $consultor->data as $fac)
            {
                /* 
                    sólo se debe considerar el valor líquido de la factura (valor da factura (VALOR)) 
                    y restarle el valor del campo total de impuestos (TOTAL_IMP_INC), que es un porcentaje 
                */
                $resultado = ( $fac->valor - ( $fac->total/(( $fac->total_imp_inc/100)+1) ) );
                $liquido = $liquido + $resultado; 
            }
            
            $consultor->liquido = number_format($liquido,2,'.',''); // Formateando a 2 decimales
            unset( $consultor->data ); // quitando matriz de invoices
            array_push($dataConsultoresFull,$consultor);
       }
       return $dataConsultoresFull;
    }

    public function getGanancias(Request $request,$userConsultor)
    {
        // validamos para ver si llego la fecha vacia 
        $yymm = ($request->get('fecha')=='-') ? '' : $request->get('fecha');
        // En caso que reciba solo el dia
        $yymm = (substr($yymm,0,1) == '-' ) ? '%'.$yymm : $yymm;
        
        # Nota Importante en el PDF dice -> en una determinada fecha (DATA_EMISSAO).
        // PERO DATA_EMISSAO en las tablas que me pasaron NO EXISTE
        $facturasGananciasNetas = DB::select(
        "SELECT os.dt_inicio,os.dt_fim,os.dt_sol,os.dt_imp,os.co_sistema,os.co_usuario,os.ds_os,os.ds_caracteristica,fac.co_cliente,fac.comissao_cn,fac.valor,fac.total_imp_inc,fac.total
            FROM `cao_os`as os ,cao_fatura as fac 
            WHERE os.co_usuario LIKE '$userConsultor'
            AND fac.co_os LIKE os.co_os
            AND `os`.`dt_inicio` LIKE '$yymm%'
            ORDER BY `os`.`dt_inicio` DESC"
        );
        return $facturasGananciasNetas;
    }
}
