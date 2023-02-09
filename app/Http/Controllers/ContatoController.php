<?php
namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\TipoTelefone;
use Illuminate\Http\Request;
use App\Models\Contato;




class ContatoController extends Controller{
    /**
     * Instantiate a new controller instance.
     *
     * @param \App\Models\Contato $contatos
     * @return void
     */
    public function __construct(Contato $contatos){
        $this->contatos = $contatos;
        $this->tipoTelefones = TipoTelefone::all()->pluck('nome','id');
        $this->categorias = Categoria::all()->pluck('nome','id');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $contatos = $this->contatos->all();
        return $contatos;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categorias = $this->categorias;
        $tipoTelefones = $this->tipoTelefones;
        return [$categorias, $tipoTelefones];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
