<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['projectname', 'client', 'leader_id', 'startdate', 'enddate', 'progress'];

    protected $with =['leader'];
    public function leader(){
        return $this->belongsTo(Leader::class, 'leader_id');
    }
}
