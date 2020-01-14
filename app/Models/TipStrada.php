<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipStrada
 *
 * @property int $id
 * @property string $nume
 *
 * @package App\Models
 */
class TipStrada extends Model
{
	protected $table = 'tip_strada';
	public $timestamps = false;

	protected $fillable = [
		'nume'
	];

    /**
     * Get streets associated with the neighbourhood
     */
    public function strazi()
    {
        return $this->hasMany('App\Models\Strazi','id_tip_strada','id');
    }
}
