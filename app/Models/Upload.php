<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\Crypt;

class Upload extends Model
{
    use HasFactory;

    protected $table = 'upload';
    public $timestamps = true;
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'image',
    ];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    // public function setImageAttribute($value){
    //     $this->attributes['image'] = Crypt::encryptString($value);
    // }

    // public function getImageAttribute($value){
    //     try{
    //         return Crypt::decryptString($value);
    //     }catch(\Exception $e){
    //         return $value;
    //     }
    // }

    // public function getImageAttribute($value){
    //     try{
    //         return Crypt::decryptString($value);
    //     }catch(\Exception $e){
    //         return $value;
    //     }
    // }



}
