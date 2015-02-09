<?php

class HomeController extends BaseController {

	//home
	public function getIndex()
	{
		return View::make('pages/home')->with('models', Model::orderBy('created_at','DESC')->take(3)->get());
	}

	//services
	public function getServices()
	{
		return View::make('pages/services');
	}

	//my work
	public function getMyworks()
	{
		return View::make('pages/works')->with('models', Model::paginate(4));
	}

	//contact me
	public function postContact()
	{
		$mail = new ContactMail();

		if($mail->isValid(Input::all()))
		{
			$mail->sendMail(Input::all());

			if($mail->sentSuccessfully())
			{
				return Redirect::route('home.index.get')->with('global','Your message has been sent successfully.');
			}
			else
			{
				return Redirect::route('home.index.get')->with('global','Failed to send an email, please try again later.');
			}
		}
		else
		{
			return Redirect::route('home.index.get')->withErrors($mail->errors())->withInput();
		}
	}

}
