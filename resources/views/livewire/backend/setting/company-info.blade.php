@push('css')

@endpush
<div>
    <x-slot name="title">
        Company Info
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form wire:submit.prevent="companyInfoSave">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="search-box mr-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <h4 class="card-title">Company Info</h4>
                                    </div>
                                </div>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Name</label>
                                    <input class="form-control" type="text" wire:model.lazy="name" placeholder="Company Name">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Phone</label>
                                    <input class="form-control" type="text" wire:model.lazy="phone" placeholder="Phone">
                                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Mobile</label>
                                    <input class="form-control" type="text" wire:model.lazy="mobile" placeholder="Mobile">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Address</label>
                                    <input class="form-control" type="text" wire:model.lazy="address" placeholder="Address">
                                    @error('address') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Hotline</label>
                                    <input class="form-control" type="text" wire:model.lazy="hotline" placeholder="Hotline">
                                    @error('hotline') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Email:</label>
                                    <input class="form-control" type="text" wire:model.lazy="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Web</label>
                                    <input class="form-control" type="text" wire:model.lazy="web" placeholder="Web">
                                    @error('web') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Logo  (517.38*492 jpg)
                                        @if (!$logo)
                                        @if($CompanyInfo)
                                           <img src="{{ asset('storage/photo/'.$CompanyInfo->logo)}}"  style="height:30px; weight:30px;" alt="Image2" class="img-circle img-fluid">
                                        @endif
                                       @endif

                                        @if ($logo)
                                            <img src="{{ $logo->temporaryUrl() }}" style="height:30px; weight:30px;" alt="Image" class="img-circle img-fluid">
                                        @endif
                                    </label>
                                    <input type="file" wire:model.lazy="logo" x-ref="logo">
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div wire:ignore class="form-group">
                                    <label for="basicpill-lastname-input">Privacy Policy</label>
                                    <textarea class="form-control" id="privacy_policy" rows="3"
                                        wire:model.lazy="privacy_policy"
                                        placeholder="privacy policy"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div wire:ignore class="form-group">
                                    <label for="basicpill-lastname-input">Terms & Condition</label>
                                    <textarea class="form-control" id="terms_condition" rows="3"
                                        wire:model.lazy="terms_condition"
                                        placeholder="Terms & Condition"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div wire:ignore class="form-group">
                                    <label for="basicpill-lastname-input">Return policy</label>
                                    <textarea class="form-control" id="return_policy" rows="3"
                                        wire:model.lazy="return_policy"
                                        placeholder="Return policy"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Facebook Link</label>
                                    <input class="form-control" type="text" wire:model.lazy="facebook_link" placeholder="Facebook Link">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Youtube Link</label>
                                    <input class="form-control" type="text" wire:model.lazy="youtube_link" placeholder="Youtube Link">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <center><button type="submit" class="btn btn-success w-lg waves-effect waves-light">Update</button></center>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
     $(document).ready(function () {
  if ($("#privacy_policy").length > 0) {
    tinymce.init({
      selector: "textarea#privacy_policy",
      height: 200,
	   forced_root_block: false,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
            editor.on('change', function (e) {
            @this.set('privacy_policy', editor.getContent());
            });
        },
      plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
      style_formats: [{
        title: 'Bold text',
        inline: 'b'
      }, {
        title: 'Red text',
        inline: 'span',
        styles: {
          color: '#ff0000'
        }
      }, {
        title: 'Red header',
        block: 'h1',
        styles: {
          color: '#ff0000'
        }
      }, {
        title: 'Example 1',
        inline: 'span',
        classes: 'example1'
      }, {
        title: 'Example 2',
        inline: 'span',
        classes: 'example2'
      }, {
        title: 'Table styles'
      }, {
        title: 'Table row 1',
        selector: 'tr',
        classes: 'tablerow1'
      }]
    });

  }
  if ($("#terms_condition").length > 0) {
    tinymce.init({
      selector: "textarea#terms_condition",
      height: 300,
	   forced_root_block: false,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
            editor.on('change', function (e) {
            @this.set('terms_condition', editor.getContent());
            });
        },
      plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
      style_formats: [{
        title: 'Bold text',
        inline: 'b'
      }, {
        title: 'Red text',
        inline: 'span',
        styles: {
          color: '#ff0000'
        }
      }, {
        title: 'Red header',
        block: 'h1',
        styles: {
          color: '#ff0000'
        }
      }, {
        title: 'Example 1',
        inline: 'span',
        classes: 'example1'
      }, {
        title: 'Example 2',
        inline: 'span',
        classes: 'example2'
      }, {
        title: 'Table styles'
      }, {
        title: 'Table row 1',
        selector: 'tr',
        classes: 'tablerow1'
      }]
    });

  }

  if ($("#return_policy").length > 0) {
    tinymce.init({
      selector: "textarea#return_policy",
      height: 300,
	   forced_root_block: false,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
            editor.on('change', function (e) {
            @this.set('return_policy', editor.getContent());
            });
        },
      plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
      style_formats: [{
        title: 'Bold text',
        inline: 'b'
      }, {
        title: 'Red text',
        inline: 'span',
        styles: {
          color: '#ff0000'
        }
      }, {
        title: 'Red header',
        block: 'h1',
        styles: {
          color: '#ff0000'
        }
      }, {
        title: 'Example 1',
        inline: 'span',
        classes: 'example1'
      }, {
        title: 'Example 2',
        inline: 'span',
        classes: 'example2'
      }, {
        title: 'Table styles'
      }, {
        title: 'Table row 1',
        selector: 'tr',
        classes: 'tablerow1'
      }]
    });

  }



  $('.summernote').summernote({
    height: 300,
    // set editor height
    minHeight: null,
    // set minimum height of editor
    maxHeight: null,
    // set maximum height of editor
    focus: true // set focus to editable area after initializing summernote

  });
});
</script>

@endpush

