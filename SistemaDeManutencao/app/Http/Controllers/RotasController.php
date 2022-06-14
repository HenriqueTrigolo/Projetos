<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\Equipamento;
use App\Models\User;

class RotasController extends Controller
{
    public function home(){
        return view('home');
    }

    public function suporte(){
        return view('suporte.suporte');
    }
    
    public function administrativa(){
        return view('administrativa.administrativa');
    }

    public function indexEquipamento()
    {
        $equipamentos = Equipamento::orderBy('nome')->get();
        return view('suporte.indexEquipamento', ['equipamentos' => $equipamentos]);
    }

    public function indexRegistro()
    {
        $registros = Registro::orderBy('datalimite')->get();
        return view('suporte.indexRegistro', ['registros' => $registros]);
    }

    public function indexManutencao(){
        $registros = Registro::orderBy('equipamento_id')->get();
        return view('administrativa.manutencao', ['registros' => $registros]);
    }
}
