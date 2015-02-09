<?php

class Album extends Eloquent 
{
	protected $fillable = array('main_photo','before_photo','after_photo');

	public $timestamps = false;

	private $rules = array(
		'main_photo'=>array('required','image','max:5000'),
		'before_photo'=>array('required','image','max:5000'),
		'after_photo'=>array('required','image','max:5000'));

	private $errors = array();

	//relation to model
    public function model()
    {
        return $this->hasOne('Model');
    }

	//form validation
	public  function validate($data, $rules = 'create')
	{
		$validationRules = $this->rules;

		if($rules != 'create')
		{
			switch ($rules) 
			{
				case 'edit':
						
					foreach ($validationRules as $key => $array) 
					{	
						unset($validationRules[$key][array_search('required', $array)]);
						
					}

					break;

				default:
					return false;
			}
		}

		$v = Validator::make($data,$validationRules);

		if($v->fails())
		{
			$this->errors = $v->messages();

			return false;
		}
		return true;
	}

	//validation errors
	public function errors()
	{
		return $this->errors;
	}
}