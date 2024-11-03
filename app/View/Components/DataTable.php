<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DataTable extends Component
{
	public $id;
	public $title;
	public $columns;
	/**
		* Create a new component instance.
		*/
	public function __construct($id,$title,$columns)
	{
		$this->id = $id;
		$this->title = $title;
		$this->columns = $columns;
	}

	/**
		* Get the view / contents that represent the component.
		*/
	public function render(): View|Closure|string
	{
		return view('components.data-table');
	}
}
