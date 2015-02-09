<?php

class Model extends Eloquent
{
	protected $fillable = array('name','slug','description','album_id');

	private $rules = array(
		'name'=>'required|min:2|max:25|alpha',
		'description'=>'max:1000');

	private $errors = array();

	//relation to album
	public function album()
    {
        return $this->hasOne('Album');
    }

	//validate form data
	public  function validate($data)
	{
		$v = Validator::make($data,$this->rules);

		if($v->fails())
		{
			$this->errors = $v->messages();

			return false;
		}
		return true;
	}

	//form data validation errors
	public function errors()
	{
		return $this->errors;
	}

    //get all models and order by rule
	public function scopeDateDescending($query)
    {
        return $query->orderBy('created_at','DESC');
    } 
}