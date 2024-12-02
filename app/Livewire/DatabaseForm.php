<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Config;
use Livewire\Component;

class DatabaseForm extends Component
{
    public $db_host = '';
    public $db_username = '';
    public $db_password = '';
    public $db_name = '';
    public $db_port = 3306;

    // Define validation rules
    protected $rules = [
        'db_host' => 'required',
        'db_username' => 'required',
        'db_password' => 'required',
        'db_name' => 'required',
        'db_port' => 'required|integer|min:1|max:65535',
    ];

    public function render()
    {
        return view('livewire.database-form');
    }

    public function save()
    {
        $this->validate();

        Config::set('app.install.step', 2);

        session()->flash('message', 'Database details saved successfully.');
    }
}
