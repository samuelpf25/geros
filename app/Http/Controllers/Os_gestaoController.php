<?php

namespace App\Http\Controllers;

use App\Models\Os_gestao;
use App\Models\Os_ufes;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class Os_gestaoController extends Controller
{
    public function index()
    {
        $os_gestao = Os_gestao::all();
        $os_ufes = Os_ufes::all();

        // Subconsulta para obter o último registro de os_gestao para cada id_ufes
        $subquery = Os_gestao::select('id_ufes', DB::raw('MAX(created_at) as max_created_at'))
            ->groupBy('id_ufes');

        // Consulta principal com left join da subconsulta
        $os_join = Os_ufes::leftJoinSub($subquery, 'latest_os_gestao', function ($join) {
            $join->on('os_ufes.id_ufes', '=', 'latest_os_gestao.id_ufes');
        })
            ->leftJoin('os_gestao', function ($join) {
                $join->on('os_gestao.id_ufes', '=', 'latest_os_gestao.id_ufes')
                    ->on('os_gestao.created_at', '=', 'latest_os_gestao.max_created_at');
            })
            ->leftJoin('status', 'os_gestao.fk_Status_id_status', '=', 'status.id')
            ->leftjoin('usuarios', 'os_gestao.fk_Usuario_id_usuario', '=', 'usuarios.id')
            ->leftJoin('categorias', 'os_gestao.fk_Categoria_id_categoria', '=', 'categorias.id')
            ->leftJoin('areas', 'categorias.id_area', '=', 'areas.id')
            ->select(
                'os_ufes.*',
                'status.nome as nome_status',
                'usuarios.nome as nome_usuario',
                'areas.nome as nome_area',
                'categorias.nome as nome_categoria',
                'os_gestao.urgencia as urgencia',
                'os_gestao.observacao as observacao'
            )
            ->get(); // Executa a consulta

        // Processar a localização para obter os índices desejados
        foreach ($os_join as $os) {
            $os->entidade_parts = explode(' > ', $os->entidade);
        }
        foreach ($os_join as $os) {
            $os->categoria_parts = explode(' > ', $os->categoria);
        }

        return view('os_gestao.index', compact('os_gestao', 'os_ufes', 'os_join'));
    }

    public function create()
    {
        return view('os_gestao.create');
    }

    public function store(Request $request)
    {
        // Log para verificar a entrada do request
        Log::info('Request Data:', $request->all());


        try {
            // Criação do novo registro
            $os_gestao = new Os_gestao();
            $os_gestao->id_ufes = $request->id_ufes; // Certifique-se de que a coluna `id_ufes` existe na tabela `os_gestao`
            $os_gestao->fk_Status_id_status = $request->id_status;
            $os_gestao->fk_Usuario_id_usuario = $request->id_usuario;
            $os_gestao->fk_Categoria_id_categoria = 1; // Ajuste conforme necessário
            $os_gestao->observacao = $request->observacao;
            $os_gestao->urgencia = $request->urgencia;
            $os_gestao->save();

            Log::info('Record Created Successfully:', ['os_gestao' => $os_gestao]);

            return redirect()->route('os_gestao.index')->with('success', 'OS editada com sucesso.');
        } catch (\Exception $e) {
            // Log para capturar qualquer exceção
            Log::error('Error Creating Record:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Erro ao editar OS.');
        }
    }

public function show($id)
{
    $os_ufes = Os_ufes::findOrFail($id);

    $os = Os_ufes::join('os_gestao', 'os_ufes.id_ufes', '=', 'os_gestao.id_ufes')
        ->leftjoin('usuarios', 'os_gestao.fk_Usuario_id_usuario', '=', 'usuarios.id')
        ->leftjoin('status', 'os_gestao.fk_Status_id_status', '=', 'status.id')
        ->leftJoin('categorias', 'os_gestao.fk_Categoria_id_categoria', '=', 'categorias.id')
        ->leftJoin('areas', 'categorias.id_area', '=', 'areas.id')
        ->select(
            'os_ufes.*',
            'status.nome as nome_status',
            'usuarios.nome as nome_usuario',
            'os_gestao.observacao as observacao',
            'areas.nome as nome_area',
            'categorias.nome as nome_categoria',
            'os_gestao.urgencia as urgencia'
        )
        ->where('os_ufes.id_ufes', $os_ufes->id_ufes)
        ->orderBy('os_gestao.id', 'desc')
        ->first();

    if (!$os) {
        // Tratar o caso em que nenhum registro foi encontrado
        return redirect()->back()->with('error', 'Registro não encontrado.');
    }

    // Processar a localização para obter os índices desejados, se necessário
    $os->entidade_parts = explode(' > ', $os->entidade);
    $os->categoria_parts = explode(' > ', $os->nome_categoria);

    return view('os_gestao.show', compact('os'));
}


    public function edit($id)
    {
        $status = Status::all();
        $os_ufes = Os_ufes::findOrFail($id);
        //fk_Status_id_status	fk_Usuario_id_usuario	fk_Categoria_id_categoria	observacao	created_at	updated_at
        $os_join = Os_ufes::join('os_gestao', 'os_ufes.id_ufes', '=', 'os_gestao.id_ufes')
            ->leftjoin('usuarios', 'os_gestao.fk_Usuario_id_usuario', '=', 'usuarios.id')
            ->leftjoin('status', 'os_gestao.fk_Status_id_status', '=', 'status.id')
            ->leftJoin('categorias', 'os_gestao.fk_Categoria_id_categoria', '=', 'categorias.id')
            ->leftJoin('areas', 'categorias.id_area', '=', 'areas.id')
            ->select(
                'os_ufes.*',
                'status.nome as nome_status',
                'usuarios.nome as nome_usuario',
                'os_gestao.observacao as observacao',
                'areas.nome as nome_area',
                'categorias.nome as nome_categoria',
                'os_gestao.urgencia as urgencia'
            )
            ->where('os_ufes.id_ufes', $os_ufes->id_ufes) // Certifique-se de filtrar corretamente
            ->orderBy('os_gestao.id', 'desc') // Ordena pela coluna desejada (ajuste conforme necessário)
            ->first(); // Obtém o último registro baseado na ordenação

        return view('os_gestao.edit', compact('os_join', 'os_ufes', 'status'));
    }

    public function update(Request $request, $id)
    {
        $os_gestao = Os_gestao::findOrFail($id);
        $os_gestao->title = $request->title;
        $os_gestao->content = $request->content;
        $os_gestao->save();

        return redirect()->route('os_gestao.index');
    }

    public function destroy($id)
    {
        $os_gestao = Os_gestao::findOrFail($id);
        $os_gestao->delete();

        return redirect()->route('os_gestao.index');
    }
}
