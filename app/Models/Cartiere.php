<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cartiere
 *
 * @property int $id
 * @property string $nume_cartier
 *
 * @package App\Models
 */
class Cartiere extends Model
{
	protected $table = 'cartiere';
	public $timestamps = false;

	protected $fillable = [
		'nume_cartier'
	];

    /**
     * Get streets associated with the neighbourhood
     */
    public function strazi()
    {
        return $this->hasMany('App\Models\Strazi','id_cartier','id');
    }
}
