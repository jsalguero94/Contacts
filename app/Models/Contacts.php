<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    public $fillable = ['name', 'birth_date', 'phone','address','credit_card','four_numbers','franchise','email','user_id','csv_file'];
}
