@push('css')

@endpush
<div>
    <x-slot name="title">
        Color
    </x-slot>
    <h4 class="pb-2">All Colors</h4>
    <div class="row">

            {{-- Start Show All Colors --}}
            <div class="col-md-7">
               {{-- Card --}}
               <div class="card">
                    <div class="card-header" style="background-color: rgb(236, 239, 241);">
                      <h4 class="text-dark pb mb-0">Colors</h4>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">
                                    <div class="float-right">Options</div>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>
                                    <div class="float-right">
                                        <button class="rounded-circle btn-sm border-0 p-2 editButton" style="background-color: rgb(148, 170, 243);"><i class="fas fa-edit"></i></button>
                                        <button class="rounded-circle btn-sm border-0 p-2 deleteButton" style="background-color: rgb(229, 160, 160);"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>
                                    <div class="float-right">
                                        <button class="rounded-circle btn-sm border-0 p-2 editButton" style="background-color: rgb(148, 170, 243);"><i class="fas fa-edit"></i></button>
                                        <button class="rounded-circle btn-sm border-0 p-2 deleteButton" style="background-color: rgb(229, 160, 160);"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>
                                    <div class="float-right">
                                        <button class="rounded-circle btn-sm border-0 p-2 editButton" style="background-color: rgb(148, 170, 243);"><i class="fas fa-edit"></i></button>
                                        <button class="rounded-circle btn-sm border-0 p-2 deleteButton" style="background-color: rgb(229, 160, 160);"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
            {{-- End Show All Colors --}}

            {{-- Start Add Color --}}
            <div class="col-md-5">
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
            {{-- End Add Color --}}
    </div>

</div>

