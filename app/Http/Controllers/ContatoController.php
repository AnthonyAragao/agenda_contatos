<?php
namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Endereco;
use App\Models\TipoTelefone;
use App\Models\Telefone;
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
        $this->enderecos = new Endereco();
        $this->tipoTelefones = TipoTelefone::all()->pluck('nome','id');
        $this->telefones = new Telefone();
        $this->categorias = Categoria::all()->pluck('nome','id');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $contatos = $this->contatos->all();
        return view('index', compact('contatos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categorias = $this->categorias;
        $tipoTelefones = $this->tipoTelefones;
        return view('form', compact('categorias', 'tipoTelefones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //***Testar depois***
    public function store(Request $request){
        // dd($this->enderecos);
        // dd($request->all());
        $contato = $this->contatos->create([
            'nome' => $request->nome,
            'endereco_id' => $this->enderecos->create([
                'logradouro' => $request->logradouro,
                'numero' => $request->numero,
                'cidade' => $request->cidade,
            ])->id,
        ]);


        $telefone = $this->telefones->create([
            'contato_id' => $contato->id,
            'numero'  => $request->telefone,
            'tipo_telefone_id' => $request->tipo
        ]);

        $telefone02 = $this->telefones->create([
            'contato_id' => $contato->id,
            'numero' => $request->telefone02,
            'tipo_telefone_id' => $request->tipo02,
            ]);

        // for ($i = 0; $i < $request->telefone->count(); $i++){
        //     $telefone = $this->telefone->create([
        //         'numero' => $request->numero[$i],
        //         'tipo_telefones_id' => $request->tipoTelefone[$i],
        //         ]);
        // }

        $categorias_id = $request->categoria;
        //Many to many
        if(isset($categorias_id)){
            // dd($categorias_id);
            foreach($categorias_id as $categoria_id){
                $contato->categoriaRelationship()->attach($categoria_id);
            }
        }
        return redirect()->route('contatos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $form = 'disabled';
        $contato = $this->contatos->find($id);
        $categorias = $this->categorias;
        $tipoTelefones = $this->tipoTelefones;
        return view('form', compact('contato', 'categorias', 'tipoTelefones', 'form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $contato = $this->contatos->find($id);
        $categorias = $this->categorias;
        $tipoTelefones = $this->tipoTelefones;
        return view('form', compact('contato', 'categorias', 'tipoTelefones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $contato = $this->contatos->find($id);
        $contato->update([
            'nome' => $request->nome,
            'endereco_id' => tap($this->enderecos->find($contato->endereco_id))->update([
                'logradouro' => $request->logradouro,
                'cidade' => $request->cidade,
                'numero' => $request->numero,
            ])->id,
        ]);


        //muitos para muitos
        $categorias_id = $request->categoria;
        $contato->categoriaRelationship()->sync(null);

        if(isset($categorias_id)){
            foreach($categorias_id as $categoria_id){
                $contato->categoriaRelationship()->attach(categoria_id);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $contato = $this->contatos->find($id);
        $contato->endereco->delete();
        $telefones = $this->telefones->where($id,'contato_id');
        foreach($telefones as $telefone){
            $telefone->delete();
        }
        $contato->delete();
    }
}
