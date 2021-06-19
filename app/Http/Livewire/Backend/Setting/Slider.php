<?php

namespace App\Http\Livewire\Backend\Setting;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting\Slider as SliderInfo;
use Livewire\WithFileUploads;
use Livewire\Component;

class Slider extends Component
{
    use WithFileUploads;

    public $title;
    public $image;
    public $position;
    public $status;
    public $SliderId=NULL;
    public $QueryUpdate=NULL;
    public function sliderImageEdit($id)
    {

        $Query = SliderInfo::find($id);
        $this->SliderId = $Query->id;
        $this->title = $Query->title;
        $this->image = $Query->image;
        $this->position = $Query->position;
        $this->status = $Query->status;
		$this->emit('modal', 'sliderImage');
    }
    public function sliderImageDelete($id)
    {
        SliderInfo::find($id)->delete();

        $this->emit('success', [
            'text' => 'Slider Image Deleted Successfully',
        ]);
    }
    public function sliderImageSave()
    {
        $this->validate([
            'image' => 'required',
        ]);

        if ($this->SliderId) {
            $Query = SliderInfo::find($this->SliderId);
        } else {
            $Query = new SliderInfo();
            $Query->user_id = Auth::id();
        }
        $Query->title = $this->title;
        if($this->image){
            $path = $this->image->store('/public/photo');
            $Query->image = basename($path);
        }
        $Query->position = $this->position;
        $Query->branch_id = 1;
        $Query->save();

        $this->reset();
        $this->sliderImageModal();

        $this->emit('success', [
            'text' => 'Slider Image C/U Successfully',
        ]);
    }

    public function sliderImageModal(){
        $this->emit('modal','sliderImage');
    }
    public function render()
    {
        return view('livewire.backend.setting.slider');
    }
}
