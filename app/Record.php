<?php
namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Record extends Model {
    
    protected $table = 'records';

    protected $fillable = [
        'answers',
        'correct',
        'total',
        'started_at',
        'finished_at',
        'variation',
        'test',
        'age',
        'gender',
        'ip',
    ];
}