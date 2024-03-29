<?php
 
namespace App\Livewire;
 
use Livewire\Component;
use App\Http\Controllers\ApiTestController;
 
class Counter extends Component
{
    public $count = 1;
 
    public function increment()
    {
        $this->count++;
    }
 
    public function decrement()
    {
        $this->count--;
    }
    public function json()
    {
        $this->count--;
    }
 
    public function render()
    {
        return view('livewire.counter');
    }
}