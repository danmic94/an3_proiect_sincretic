<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Strazi
 *
 * @property int $id
 * @property string $nume_strada
 * @property int $id_cartier
 * @property int $id_tip_strada
 * @property int $nr_cladiri
 *
 * @package App\Models
 */
class Strazi extends Model
{
	protected $table = 'strazi';
	public $timestamps = false;

	protected $casts = [
		'id_cartier' => 'int',
		'id_tip_strada' => 'int',
		'nr_cladiri' => 'int'
	];

	protected $fillable = [
		'nume_strada',
		'id_cartier',
		'id_tip_strada',
		'nr_cladiri'
	];

    /**
     * Get the neighbourhood that it belongs to.
     */
    public function neighbourhood()
    {
        return $this->belongsTo('App\Models\Cartiere','id_cartier','id');
    }

    /**
     * Get the neighbourhood that it belongs to.
     */
    public function tip_strada()
    {
        return $this->hasOne('App\Models\TipStrada','id_tip_strada','id');
    }
}
