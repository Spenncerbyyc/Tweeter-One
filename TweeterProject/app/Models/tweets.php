<?php
//look up eloquent model notes to see how table will work, add user ID and content to table,
namespace App;

use Illuminate\Database\Eloquent\Model;

class tweets extends Model
{
    protected $table = "tweets";

    protected $primaryKey = 'id';

}
