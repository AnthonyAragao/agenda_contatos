<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model{

    /**
     * The table associated with the model
     * @var string
     */
    protected $table = 'contatos';

    /**
     * The attributes that  should be hidden for arrays
    * @var array
    */
    protected $hidden = [

    ];

    /**
     * The accessors to append to the model's arrays form
    * @var array
    */
    protected $appends = [

    ];


    //Getters e Setters
    //Get the endereco attribute
    public function getEnderecoAttribute(){
        return $this->enderecoRelationship;
    }

    //Get the telefone attribute
    public function getTelefoneAttribute(){
        return $this->telefoneRelationship;
    }


    //Get the categoria attribute
    public function getCategoriaAttribute(){
        return $this->categoriaRelationship;
    }

    /**
     * Set the telefone's id
     * @param int $value
     * @return void
     */
    public function setTelefoneAttribute($value){
        if(isset($value)){
            $this->attributes['telefone_id'] = Telefone::where('id', $value)->first()->id;
        }
    }


    /**
     * Set the endereco's id
     * @param int $value
     * @return void
     */
    public function setEnderecoAttribute($value){
        if(isset($value)){
            $this->attributes['endereco_id'] = Endereco::where('id', $value)->first()->id;
        }
    }

    /**
     * Set the categoria attribute
     * @param array $value
     * @return void
     */
    public function setCategoriaAttribute($value){
        $this->categoriaRelationship()->sync($value);
    }

    /**
     * Get the Endereco that owns the contato
     *
     * @return Endereco
     */
    public function enderecoRelationship(){
        return $this->belongsTo(Endereco::class, 'endereco_id');
    }

     /**
     * Get the Endereco that owns the contato
     *
     * @return Telefone
     */
    public function telefoneRelationship(){
        return $this->hasMany(Telefone::class, 'contato_id');
    }

     /**
     * Get the Endereco that owns the contato
     *
     * @return Categoria
     */
    public function categoriaRelationship(){
        return $this->belongsToMany(Categoria::class, 'contatos_has_categorias', 'contato_id', 'categoria_id');
    }

}
