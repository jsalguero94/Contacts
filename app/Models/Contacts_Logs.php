<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts_Logs extends Model
{
    use HasFactory;
    public $fillable = ['name', 'birth_date', 'phone','address','credit_card','four_numbers','franchise','email','error_message','user_id','csv_file'];
    protected $table = 'contacts_logs';
}
