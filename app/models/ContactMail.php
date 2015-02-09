<?php

class ContactMail
{
	private $rules = array(
			'name'=>'required|min:2|max:25|alpha',
			'email'=>'required|email',
			'subject'=>'required|alpha_spaces|min:3|max:50',
			'message'=>'required');

	private $errors = array();

	//validate form data
	public  function isValid($data)
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

	//send mail 
	public function sendMail($data)
	{
		Mail::send('emails.contact', array('email'=>$data['email'],'name'=>$data['name'],'text'=>$data['message']), function($message) use ($data)
		{
		    $message->to('vuidaa@gmail.com', 'Vaidas')->subject($data['subject']);
		});
	}

	//check if email sent successfully
	public function sentSuccessfully()
	{
		if(count(Mail::failures()) > 0)
		{
			return false;	
		}
		else
		{
			return true;
		}
	}
}