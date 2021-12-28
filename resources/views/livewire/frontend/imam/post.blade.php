<div class="row mt-2">
  <style>
    .card-img {
  border-bottom-left-radius: 0px;
  border-bottom-right-radius: 0px;
}

.card-title {
  margin-bottom: 0.3rem;
}

.cat {
  display: inline-block;
  margin-bottom: 1rem;
}

.fa-users {
  margin-left: 1rem;
}

.card-footer {
  font-size: 0.8rem;
}
  </style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
        <div class="col-12">
            <div class="card" style="background-color: #f7fbf6;">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                        <form wire:ignore.self  wire:submit.prevent="Post">
                            @csrf
                            <div wire:ignore class="form-group">
                                <textarea name="description" rows="15" cols="40" class="form-control tinymce-editor" wire:model.lazy="post" placeholder="What's on your mind?"></textarea>
                            </div>  
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-sm">Post</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    <hr>
                    <!-- Start Post Show -->
                    <div class="row">
                      @foreach($posts as $post)
                      <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="card" style="background: #cfebe8;">
        <!-- <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/pasta.jpg" alt="Bologna">
        <div class="card-img-overlay">
          <a href="#" class="btn btn-light btn-sm">Cooking</a>
        </div> -->
        <div class="card-body">
          <h4 class="card-title">{{ $post->User->name }}</h4>
          <small class="text-muted cat">
            <i class="far fa-clock text-info"></i> {{ $post->created_at->diffForHumans() }}
            <i class="fas fa-users text-info"></i> 4 portions
          </small>
          <p class="card-text">{!! $post->post !!}</p>
          <a class="btn btn-info btn-sm" style="font-size:10px;" wire:click="EditPost({{$post->id}})">Edit</a>
          <a class="btn btn-danger btn-sm" style="font-size:10px;" wire:click="DeletePost({{$post->id}})">Delete</a>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
          <div class="views">Oct 20, 12:45PM
          </div>
          <div class="stats">
            <a href="javascript:void(0);" wire:click="GiveLike({{$post->id}})"><i class="far fa-thumbs-up" style="font-size: 20px;"></i></a> {{ count($post->Like) }}
            <i class="far fa-comment"></i> 12
          </div>
           
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
    @endforeach
  </div>
                    <!-- End Post Show -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>  
    <script type="text/javascript">
        // tinymce.init({
        //     selector: 'textarea.tinymce-editor',
        //     height: 200,
        //     menubar: false,
        //     plugins: [
        //         'advlist autolink lists link image charmap print preview anchor',
        //         'searchreplace visualblocks code fullscreen',
        //         'insertdatetime media table paste code help wordcount'
        //     ],
        //     toolbar: 'undo redo | formatselect | ' +
        //         'bold italic backcolor | alignleft aligncenter ' +
        //         'alignright alignjustify | bullist numlist outdent indent | ' +
        //         'removeformat | help',
        //     content_css: '//www.tiny.cloud/css/codepen.min.css'
        // });
        tinymce.init({
      selector: "textarea.tinymce-editor",
      height: 250,
	   forced_root_block: false,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
            editor.on('change', function (e) {
            @this.set('post', editor.getContent());
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
    </script>
