<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    // jika id diganti   
    // protected $primaryKey = 'id_siswa';
    protected $guarded = ['id'];
    // cara alternatif
    // protected $fillable = ['nama','no_induk','email','password'];
}
