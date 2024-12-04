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


        config(["database.connections.mysql.database" => $this->db_name]);
        config(["database.connections.mysql.host"=> $this->db_host]);
        config(["database.connections.mysql.port"=> $this->db_port]);
        config(["database.connections.mysql.username"=> $this->db_username]);
        config(["database.connections.mysql.password"=> $this->db_password]);

        Config::set('nexon.installation_step', 2);

        session()->flash('message', 'Database details saved successfully.');
    }
}
