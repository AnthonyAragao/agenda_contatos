<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model{


    /**
     * The table associated with the model
     * @var string
     */
    protected $table = 'telefones';


    /**
     * The attributes that  should be hidden for arrays
    * @var array
    */
    protected $hidden = [
        'tipoTelefoneRelationship',
        'created_at',
        'updated_at'
    ];


    /**
     * The accessors to append to the model's arrays form
    * @var array
    */
    protected $appends = [
        'tipoTelefone'
    ];

    /**
     * Get the telefone attribute
     *
     * @return string
    */
    public function getTipoTelefoneAttribute(){
        return $this->tipoTelefoneRelationship;
    }

    /**
     * Set the tipo telefone id
     * @param int $value
     * @return void
     */
    public function setTipoTelefoneAttribute($value){
        if(isset($value)){
            $this->attributes['tipo_telefone_id'] = TipoTelefone::where('id', $value)->first()->id;
        }
    }


     /**
     * Get the Tipo Telefone that owns the contato
     *
     * @return TipoTelefone
     */
    public function tipoTelefoneRelationship(){
        return $this->belongsTo(TipoTelefone::class, 'tipo_telefone_id');
    }


}
