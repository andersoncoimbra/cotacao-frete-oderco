<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CotacaoFrete;
use App\Models\Transportadora;

use Illuminate\Support\Collection;


class CotacaoController extends Controller
{

    function index()
    {
        $transportadoras = Transportadora::all();
        $cotacoes = CotacaoFrete::all();
        $ufs = CotacaoFrete::select('uf')->distinct()->get();
        return view('index', compact('cotacoes', 'transportadoras', 'ufs'));
    }

    function cotacoes()
    {
        $cotacoes = CotacaoFrete::all();
        return response()->json($cotacoes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'uf' => 'required|string|max:2',
            'percentual_cotacao' => 'required|numeric|min:0|max:100',
            'valor_extra' => 'required|numeric|min:0',
            'transportadora_id' => 'required|integer|min:1',
        ], [
            'uf.required' => 'O campo UF é obrigatório',
            'uf.string' => 'O campo UF deve ser uma string',
            'uf.max' => 'O campo UF deve ter no máximo 2 caracteres',
            'percentual_cotacao.required' => 'O campo Percentual de Cotação é obrigatório',
            'percentual_cotacao.numeric' => 'O campo Percentual de Cotação deve ser um número',
            'percentual_cotacao.min' => 'O campo Percentual de Cotação deve ser maior ou igual a 0',
            'percentual_cotacao.max' => 'O campo Percentual de Cotação deve ser menor ou igual a 100',
            'valor_extra.required' => 'O campo Valor Extra é obrigatório',
            'valor_extra.numeric' => 'O campo Valor Extra deve ser um número',
            'valor_extra.min' => 'O campo Valor Extra deve ser maior ou igual a 0',
            'transportadora_id.required' => 'O campo Transportadora é obrigatório',
            'transportadora_id.integer' => 'O campo Transportadora deve ser um número inteiro',
            'transportadora_id.min' => 'O campo Transportadora deve ser maior ou igual a 1',
        ]);

        $cotacoes = CotacaoFrete::where('uf', $request->uf)->where('transportadora_id', $request->transportadora_id)->count();

        if($cotacoes > 0) {
            return response()->json([
                'success' => false,
                'msg' => 'Já existe uma cotação para esta transportadora e estado.',
            ], 400);
        }



        try{
            $cotacao = new CotacaoFrete();
            $cotacao->uf = $request->uf;
            $cotacao->percentual_cotacao = $request->percentual_cotacao;
            $cotacao->valor_extra = $request->valor_extra;
            $cotacao->transportadora_id = $request->transportadora_id;
            $cotacao->save();
            return response()->json(['msg' => 'Sucesso'], 200);
        }
        catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }


    }

    public function update(Request $request)
    {
        $request->validate([
            'uf' => 'required|string|max:2',
            'valor_pedido' => 'required|numeric|min:0',
        ], [
            'uf.required' => 'O campo UF é obrigatório',
            'uf.string' => 'O campo UF deve ser uma string',
            'uf.max' => 'O campo UF deve ter no máximo 2 caracteres',
            'valor_pedido.required' => 'O campo Valor do Pedido é obrigatório',
        ]);

        $cotacoes = CotacaoFrete::where('uf', $request->uf)->get();

        $cotacoes_ordenadas = collect([]);
        foreach($cotacoes as $cotacao) {
            //Gera o calculo de cotação
            $valores = ($request->valor_pedido / 100*$cotacao->percentual_cotacao) + $cotacao->valor_extra;
            $cotacoes_ordenadas->push(['transportadora' => $cotacao->transportadora_id, 'valor' => $valores]);
        }
        //Ordena o array de cotações ASCENDENTE
        $melhores_cotacoes = $cotacoes_ordenadas->sortBy('valor', SORT_ASC)->take(3);
        $melhores_cotacoes_ordenadas = collect([]);
        foreach($melhores_cotacoes as $cotacao) {
            $melhores_cotacoes_ordenadas->push($cotacao);
        }
        //Retorna os 3 melhores cotações
        return response()->json($melhores_cotacoes_ordenadas, 200);

    }
}
