<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    use HasFactory;

    protected $table ='brand';

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecord(){
        return self::select('brand.*', 'users.name as created_by_name')
        ->where('brand.is_delete', "=", 0)
        ->join('users','users.id','=','brand.created_by')
        ->orderBy('brand.id','desc')
        ->get();
    }

    static public function getRecordActive(){
        return self::select('brand.*')
        ->where('brand.is_delete', "=", 0)
        ->where("brand.status", "=", 0)
        ->join('users','users.id','=','brand.created_by')
        ->orderBy('brand.name','asc')
        ->get();
    }

}
