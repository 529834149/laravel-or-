<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Areas;
class Areas extends Model
{
    protected $connection = 'mysql';
    protected $table = 'areas';
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'id';//定义主键
	public function childAreas() {
		return $this->hasMany('App\Models\Areas', 'parent_id', 'id');
	}

	public function allChildrenAreas()
	{
		return $this->childAreas()->with('allChildrenAreas');
	}
}
