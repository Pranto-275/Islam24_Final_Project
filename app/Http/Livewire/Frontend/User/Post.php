<?php

namespace App\Http\Livewire\Frontend\User;
use App\Models\FrontEnd\Imam\Post as PostInfo;
use App\Models\FrontEnd\Imam\Like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Post extends Component
{
    public $post;
    public $PostId;

    public function GiveLike($id){
        $Like=Like::whereUserId(Auth::user()->id)->wherePostId($id)->first();
        if($Like){
         $Like=Like::whereUserId(Auth::user()->id)->wherePostId($id)->delete();
        }else{
            $Like=New Like();
            $Like->user_id=Auth::user()->id;
            $Like->post_id=$id;
            $Like->save();
        }
     }
     public function DeletePost($id){
         PostInfo::whereId($id)->delete();
         $this->emit('success', [
             'text' => 'Post Deleted Successfully',
          ]);
     }
     public function EditPost($id){
        $Query=PostInfo::find($id);
        $this->PostId=$Query->id;
        $this->post=$Query->post;
     }
     public function Post(){
         $this->validate([
             'post' => 'required',
          ]);
          if($this->PostId){
            $Query=PostInfo::find($this->PostId);
          }else{
             $Query=new PostInfo();
             $Query->status='Pending';
          }

          $Query->user_id=Auth::user()->id;
          $Query->post=$this->post;
          $Query->save();

          $this->emit('success', [
             'text' => 'Post C/U Successfully',
          ]);
          $this->reset();
     }
    public function render()
    {
        return view('livewire.frontend.user.post',[
            'posts'=>PostInfo::whereStatus('Approved')->orderBy('id','DESC')->get(),
        ])->layout('layouts.front_end_user');
    }
}
