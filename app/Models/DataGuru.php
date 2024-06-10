<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGuru extends Model
{
    use HasFactory;
    
    // Specify the table name if it's different from the class name plural form
    protected $table = 'dataguru';

    // Specify the columns that are mass assignable
    protected $fillable = [
        'nama_guru',
        'email',
        'nuptk',
        'tempat_tanggal_lahir',
        'mengajar',
        'alamat',
    ];
}
