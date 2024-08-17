<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $type;

    public $label;

    public $multiple;

    public $default;
    /**
     * Create a new component instance.
     */
    public function __construct($name="input_name",$type="text",$label="Post label",$multiple=false,$default=null)
    {
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
        $this->multiple = $multiple;
        $this->default = $default;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
