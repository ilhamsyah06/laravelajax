<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nik extends Model
{
    protected $table = 'nik_master';

    protected $fillable = ['nik','no_ktp','no_paspor','nama_lengkap','jenis_kelamin'];
}
