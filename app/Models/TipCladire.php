<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipCladire
 *
 * @property int $id
 * @property string $nume
 *
 * @package App\Models
 */
class TipCladire extends Model
{
	protected $table = 'tip_cladire';
	public $timestamps = false;

	protected $fillable = [
		'nume'
	];

    /**
     * Get streets associated with the neighbourhood
     */
    public function cladiri()
    {
        return $this->hasMany('App\Models\Cladiri','id_tip_cladire','id');
    }
}
