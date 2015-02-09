<?php

class AdminController extends BaseController
{
	protected $model;
	protected $album;

	public function __construct(Model $model, Album $album)
	{
		$this->model = $model;
		$this->album = $album;
	}
	//index
	public function getIndex()
	{ 

		return View::make('pages/admin/index')->with('models', $this->model->DateDescending()->paginate(10));
	}

	//create new model
	public function getCreate()
	{
		return View::make('pages/admin/create');
	}

	//edit model
	public function getEdit($slug)
	{
		$model = $this->model->where('slug','=',$slug);

		if($model->count())
		{
			return View::make('pages/admin/edit')->with('model',$model->first());
		}

		return App::abort(404);
	}

	//create new model post
	public function postCreate()
	{
		$modelData = Input::all();

		$albumData = Input::file('photos');

		if($this->model->validate($modelData))
		{
			if($this->album->validate($albumData))
			{
				$slug = $modelData['name'] .'-'.rand(1, 100);

				$this->model->name = $modelData['name'];
				$this->model->description = $modelData['description'];
				$this->model->slug = $slug;
				$this->model->save();

				mkdir(public_path()."/images/models".'/'.$slug);

				foreach ($albumData as $key => $image) 
				{
					$randName = $modelData['name'].'_'.$key.'.'.Input::file('photos.'.$key)->getClientOriginalExtension();;

					$path = public_path()."/images/models".'/'.$slug.'/'.$randName;

					Image::make(Input::file('photos.'.$key)->getRealPath())->resize(1800, 1013)->save($path); 
					
					$this->album->{$key} = $slug.'/'.$randName;
				}

				$this->album->model_id = $this->model->id;

				$this->album->save();

				return Redirect::route('admin.index.get')->with('message',['class'=>'success','message'=>'Model added !']);
			}
			else
			{
				return Redirect::route('admin.create.get')->withErrors($this->album->errors()->toArray())->withInput();
			}
		}
		else
		{	
			return Redirect::route('admin.create.get')->withErrors($this->model->errors()->toArray())->withInput();
		}
	}

	public function postDelete($slug)
	{
		$model = $this->model->where('slug','=',$slug);

		if($model->count())
		{
			$model = $model->first();

			$directory = public_path().'/images/models/'.$model->slug;

			if(File::exists($directory)) 
			{
				File::deleteDirectory($directory);
			} 

			$this->album->where('model_id','=',$model->id)->delete();

			$model->delete();

			return Redirect::route('admin.index.get')->with('message',['class'=>'success','message'=>'Deleted !']);	
		}

		return App::abort(404);
	}

	public function postEdit($slug)
	{
		$model = $this->model->where('slug','=',$slug);

		if($model->count())
		{	
			$model = $model->first();
		
			//Photos changed ?
			if(Input::hasFile('photos'))
			{	
				$rules = array('main_photo'=>'image|max:5000',
								'before_photo'=>'image|max:5000',
								'after_photo'=>'image|max:5000');

				if($this->album->validate(Input::file('photos'), 'edit'))
				{
					$album = $this->album->where('model_id','=',$model->id)->first();

					foreach (Input::file('photos') as $key => $fileObject) 
					{
						if(!is_null($fileObject))
						{
							File::delete(public_path()."/images/models".'/'.$model->album->$key);

							$randName = $model->name.'_'.$key.'.'.Input::file('photos.'.$key)->getClientOriginalExtension();;

							$path = public_path()."/images/models".'/'.$model->slug.'/'.$randName;

							Image::make(Input::file('photos.'.$key)->getRealPath())->resize(1800, 1013)->save($path);

							$album->{$key} = $slug.'/'.$randName;
						}	
					}
					//Album data changed, images swaped, save the album
					$album->save();
				}
				else
				{
					return Redirect::route('admin.edit.get',['slug'=>$model->slug])->withErrors($this->album->errors());
				}
			}
			/////

			$model->description = Input::get('description');

			$model->save();

			return Redirect::route('admin.index.get')->with('message',['class'=>'success','message'=>'Model Edited!']);
		}

		return App::abort(404);
	}
}