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


    ];


    /**
     * The accessors to append to the model's arrays form
    * @var array
    */
    protected $appends = [


    ];

    
    public function tipoTelefoneRelationship(){
        return $this->belongsTo(TipoTelefone::class, tipo_telefone_id);
    }


}
