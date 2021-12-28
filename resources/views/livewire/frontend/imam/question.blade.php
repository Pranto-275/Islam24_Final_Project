<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="card mt-2">
  <div class="card-header">
      <span>Add Question</span>
    <h5 class="text-center">{{$quiz->name}}</h5>
  </div>
  <div class="card-body">
  <form wire:submit.prevent="AddQuestion">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Question</label>
                                    <input class="form-control" type="text" wire:model.lazy="ques" style="border: 2px solid red;border-radius: 8px;" placeholder="Question">
                                    @error('ques') <span class="error" style="color:red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" wire:model.lazy="A" placeholder="Option A">
                                    @error('A') <span class="error" style="color:red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" wire:model.lazy="B" placeholder="Option B">
                                    @error('B') <span class="error" style="color:red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" wire:model.lazy="C" placeholder="Option C">
                                    @error('C') <span class="error" style="color:red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" wire:model.lazy="D" placeholder="Option D">
                                    @error('D') <span class="error" style="color:red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select class="form-control" wire:model.lazy="ans">
                                        <option value="">--Select Option--</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                    @error('ans') <span class="error" style="color:red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm float-right">Add Question</button>
                </form>
  </div>
</div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>