@push('css')

@endpush
<div>
    <x-slot name="title">
        Add New Product
    </x-slot>
    <h4 class="pb-2">Add New Product</h4>
    <div class="row">

            <div class="col-md-7">
             <div class="row">
            {{-- Start Add Products --}}
              <div class="col-md-12">
               {{-- Card --}}
               <div class="card">
                    <div class="card-header" style="background-color: rgb(236, 239, 241);">
                      <h4 class="text-dark pb mb-0">New Product</h4>
                    </div>

                    <div class="card-body">
                           <div class="row">
                               {{-- Start Input --}}
                               <div class="col-md-4">Product Code <sup class="text-danger">*</sup></div>
                               <div class="col-md-8">
                                  <input type="text" class="form-control form-control-lg inputBox" wire:model.lazy="code" placeholder="Product Code"/>
                                  @error('code') <span class="error">{{ $message }}</span> @enderror
                               </div>
                               {{-- End Input --}}
                        {{-- Start Input --}}
                               <div class="col-md-4 mt-2">Product Name <sup class="text-danger">*</sup></div>
                               <div class="col-md-8 mt-2">
                                  <input type="text" class="form-control form-control-lg inputBox" wire:model.lazy="name" placeholder="Product Name"/>
                                  @error('name') <span class="error">{{ $message }}</span> @enderror
                               </div>
                        {{-- End Input --}}
                        {{-- Start Input --}}
                        <div class="col-md-4 mt-2">Category <sup class="text-danger">*</sup></div>
                        <div class="col-md-8 mt-2">
                           <select class="form-control form-control-lg inputBox">
                              <option value="">Select Category</option>
                              @foreach ($subSubCategories as $subSubCategory)
                                <option value="{{ $subSubCategory->id }}">{{ $subSubCategory->name}}</option>
                              @endforeach
                           </select>
                        </div>
                        {{-- End Input --}}

                         {{-- Start Input --}}
                         <div class="col-md-4 mt-2">Contact <sup class="text-danger">*</sup></div>
                         <div class="col-md-8 mt-2">
                            <select class="form-control form-control-lg inputBox">
                               <option value="">Select Contact</option>
                               @foreach ($contacts as $contact)
                                 <option value="{{ $contact->id }}">{{ $contact->name}}</option>
                               @endforeach
                            </select>
                         </div>
                         {{-- End Input --}}

                        {{-- Start Input --}}
                        <div class="col-md-4 mt-2">Brand</div>
                        <div class="col-md-8 mt-2">
                           <select class="form-control form-control-lg inputBox">
                              <option value="">Select Brand</option>
                              <option value="1">Brand1</option>
                              <option value="2">Brand2</option>
                              <option value="3">Brand3</option>
                           </select>
                        </div>
                        {{-- End Input --}}
                       {{-- Start Input --}}
                        <div class="col-md-4 mt-2">Unit</div>
                        <div class="col-md-8 mt-2">
                           <input type="text" class="form-control form-control-lg inputBox" placeholder="Unit"/>
                        </div>
                       {{-- End Input --}}
                       {{-- Start Input --}}
                       {{-- <div class="col-md-4 mt-2">Maximum Purchase Qty <sup class="text-danger">*</sup></div>
                       <div class="col-md-8 mt-2">
                          <input type="text" class="form-control form-control-lg inputBox" placeholder="Quantity"/>
                       </div> --}}
                       {{-- End Input --}}
                           </div>
                    </div>
               </div>
              </div>
            {{-- Start Add Products --}}

            {{-- Start Product Imgae --}}
            <div class="col-md-12">
               {{-- Card --}}
               <div class="card">
                    <div class="card-header" style="background-color: rgb(236, 239, 241);">
                      <h4 class="text-dark pb mb-0">Product Images</h4>
                    </div>

                    <div class="card-body">
                           <div class="row">

                        {{-- Start Input --}}
                               <div class="col-md-4">Product Image (600*600) <sup class="text-danger">*</sup></div>
                               <div class="col-md-8">
                                  <input type="file" class="form-control form-control-lg inputBox" wire:model.lazy="images" multiple/>
                               </div>
                        {{-- End Input --}}

                           </div>
                    </div>
               </div>
              </div>
            {{-- End Product Imgae --}}

            {{-- Start Product Video --}}
            <div class="col-md-12">
               {{-- Card --}}
               <div class="card">
                    <div class="card-header" style="background-color: rgb(236, 239, 241);">
                      <h4 class="text-dark pb mb-0">Video Link</h4>
                    </div>

                    <div class="card-body">
                           <div class="row">

                        {{-- Start Input --}}
                               <div class="col-md-4">Video Link</div>
                               <div class="col-md-8">
                                  <input type="text" class="form-control form-control-lg inputBox" wire:model.lazy="video_link" placeholder="Video Link"/>
                               </div>
                        {{-- End Input --}}

                           </div>
                    </div>
               </div>
              </div>
            {{-- End Product Video --}}

            {{-- Start Product Variation --}}
            <div class="col-md-12">
               {{-- Card --}}
               <div class="card">
                    <div class="card-header" style="background-color: rgb(236, 239, 241);">
                      <h4 class="text-dark pb mb-0">Product Variation</h4>
                    </div>

                    <div class="card-body">
                           <div class="row">

                        {{-- Start Input --}}
                               <div class="col-md-4">
                                  <input class="form-control input-lg mb-1" value="Color" style="width: 140px;" disabled/>
                               </div>
                               <div class="col-md-8">
                                  <select class="form-control form-control-lg inputBox">
                                     <option value="">Nothing Selected</option>
                                     <option value="red">Red</option>
                                  </select>
                               </div>
                        {{-- End Input --}}

                           </div>
                    </div>
               </div>
              </div>
            {{-- End Product Variation --}}

            {{-- Start Product Variation --}}
            <div class="col-md-12">
               {{-- Card --}}
               <div class="card">
                    <div class="card-header" style="background-color: rgb(236, 239, 241);">
                      <h4 class="text-dark pb mb-0">Product Description</h4>
                    </div>

                    <div class="card-body">
                           <div class="row">

                        {{-- Start Input --}}
                               <div class="col-md-4">
                                  Description
                               </div>
                               <div class="col-md-8">
                                <textarea>Next, get a free Tiny Cloud API key!</textarea>
                               </div>
                        {{-- End Input --}}

                           </div>
                    </div>
               </div>
              </div>
            {{-- End Product Description --}}


             </div>
            </div>


            {{-- Start Add Color --}}
            <div class="col-md-5">
            <div class="row">
                <div class="col-md-12">
                {{-- Card --}}
                  <div class="card">
                     <div class="card-header" style="background-color: rgb(236, 239, 241);">
                       <h4 class="text-dark pb mb-0">Add New Color</h4>
                     </div>
                     <div class="card-body">
                        {{-- Start Name Input --}}
                        <div class="form-outline mx-1">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" id="name" class="form-control form-control-lg inputBox" placeholder="Color Name"/>
                          </div>
                        {{-- End Name Input --}}
                        {{-- Start Name Input --}}
                        <div class="form-outline mx-1 mt-3">
                            <label class="form-label" for="color_code">Color Code</label>
                            <input type="text" id="color_code" class="form-control form-control-lg inputBox" placeholder="Color Code"/>
                        </div>
                        {{-- End Name Input --}}

                        <button class="btn btn-primary float-right btn-lg mt-2">Submit</button>
                     </div>
                  </div>
                </div>
            </div>
                </div>
            {{-- End Add Color --}}
    </div>

</div>

