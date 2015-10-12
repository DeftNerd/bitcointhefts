<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Carbon\Carbon;

class Thefts extends Model implements SluggableInterface {
        use SoftDeletes;
	use SluggableTrait;

	protected $sluggable = array(
		'build_from' => 'name',
		'save_to'    => 'slug',
	);


        protected $dates = ['created_at', 'updated_at', 'deleted_at', 'started_at', 'ended_at'];

        public function setStartedAtAttribute($value)
        {
                $this->attributes['started_at'] = Carbon::parse($value);
        }

        public function setEndedAtAttribute($value)
        {
                $this->attributes['ended_at'] = Carbon::parse($value);
        }

        public function setBtcThenAttribute($value)
        {
                $this->attributes['btc_then'] = filter_var($value * 100000000, FILTER_SANITIZE_NUMBER_INT);
        }

        public function setBtcNowAttribute($value)
        {
                $this->attributes['btc_now'] = filter_var($value * 100000000, FILTER_SANITIZE_NUMBER_INT);
        }

        public function setUsdThenAttribute($value)
        {
                $this->attributes['usd_then'] = filter_var($value * 100, FILTER_SANITIZE_NUMBER_INT);
        }

        public function setUsdNowAttribute($value)
        {
                $this->attributes['usd_now'] = filter_var($value * 100, FILTER_SANITIZE_NUMBER_INT);
        }

	public function getBtcThenAttribute($value)
	{
		return number_format(round($value / 100000000));
	}

	public function getBtcNowAttribute($value)
	{
		return number_format(round($value / 100000000));
	}

	public function getUsdThenAttribute($value)
	{
		return number_format(round($value / 100));
	}

	public function getUsdNowAttribute($value)
	{
		return number_format(round($value / 100));
	}



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'thefts';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'started_at', 'ended_at', 'type', 'victims', 'denomination', 'btc_then', 'btc_now', 'usd_then', 'usd_now', 'transactions', 'status', 'description', 'details', 'suspects'];

}
