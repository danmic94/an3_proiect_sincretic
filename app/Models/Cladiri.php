<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cladiri
 *
 * @property int $id
 * @property string $numar_cladire
 * @property int $id_tip_cladire
 * @property int $nr_apartamente
 * @property string $cod_postal
 *
 * @package App\Models
 */
class Cladiri extends Model
{
	protected $table = 'cladiri';
	public $timestamps = false;

	protected $casts = [
		'id_tip_cladire' => 'int',
		'nr_apartamente' => 'int',
        'id_strada' => 'int'
	];

	protected $fillable = [
		'numar_cladire',
		'id_tip_cladire',
		'nr_apartamente',
        'id_strada',
		'cod_postal'
	];

    /**
     * Get the neighbourhood that it belongs to.
     */
    public function street()
    {
        return $this->hasOne('App\Models\Strazi','id_strada');
    }

    /**
     * Get the neighbourhood that it belongs to.
     */
    public function tip_cladire()
    {
        return $this->hasOne('App\Models\TipCladire','id_tip_cladire');
    }
}
