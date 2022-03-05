<x-app-layout>

    <div class="card">
        <div class="card-header">
            <div class="float-left font-weight-bolder">Post Update</div>
            <div class="float-right">
                <a href="{{ route('index')}}" class="btn btn-sm btn-primary">My Post</a>
            </div>
        </div>

        <div class="card-body">
            @if (Session::has('messages'))
                <div class="alert alert-primary" role="alert">
                    {{ Session::get('messages') }}
                </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
                @endforeach
            @endif

            <form action="{{route('post.update', $post->slug)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}">
                </div>

                <div class="form-group">
                  <label for="editor">Description</label>
                  <textarea class="form-control" name="body" id="editor" rows="3"> {{ $post->body }} </textarea>
                </div>

                <div class="form-group">
                    <label for="">Choose Image</label>
                    <img src="{{asset('images')}}/{{$post->image_path}}" alt="" class="form-control" style="width:300px; height: 400px;">
                </div>

                <div class="form-group">
                    <label for="photo">Choose Image</label><br>
                    <input type="file" name="image" id="photo" class="formcontrol">
                </div>

                <button type="submit" class="btn btn-sm bg-success float-right">Post Update</button>
              </form>
                <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                <script>
                    class MyUploadAdapter {
                        constructor( loader ) {
                            // The file loader instance to use during the upload.
                            this.loader = loader;
                        }

                        // Starts the upload process.
                        upload() {
                            return this.loader.file
                                .then( file => new Promise( ( resolve, reject ) => {
                                    this._initRequest();
                                    this._initListeners( resolve, reject, file );
                                    this._sendRequest( file );
                                } ) );
                        }

                        // Aborts the upload process.
                        abort() {
                            if ( this.xhr ) {
                                this.xhr.abort();
                            }
                        }

                        // Initializes the XMLHttpRequest object using the URL passed to the constructor.
                        _initRequest() {
                            const xhr = this.xhr = new XMLHttpRequest();

                            // Note that your request may look different. It is up to you and your editor
                            // integration to choose the right communication channel. This example uses
                            // a POST request with JSON as a data structure but your configuration
                            // could be different.
                            xhr.open( 'POST', "{{ route('post.store', ['_token' => csrf_token() ]) }}", true );
                            xhr.responseType = 'json';
                        }

                        // Initializes XMLHttpRequest listeners.
                        _initListeners( resolve, reject, file ) {
                            const xhr = this.xhr;
                            const loader = this.loader;
                            const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                            xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                            xhr.addEventListener( 'abort', () => reject() );
                            xhr.addEventListener( 'load', () => {
                                const response = xhr.response;

                                // This example assumes the XHR server's "response" object will come with
                                // an "error" which has its own "message" that can be passed to reject()
                                // in the upload promise.
                                //
                                // Your integration may handle upload errors in a different way so make sure
                                // it is done properly. The reject() function must be called when the upload fails.
                                if ( !response || response.error ) {
                                    return reject( response && response.error ? response.error.message : genericErrorText );
                                }

                                // If the upload is successful, resolve the upload promise with an object containing
                                // at least the "default" URL, pointing to the image on the server.
                                // This URL will be used to display the image in the content. Learn more in the
                                // UploadAdapter#upload documentation.
                                resolve( response);
                            } );

                            // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                            // properties which are used e.g. to display the upload progress bar in the editor
                            // user interface.
                            if ( xhr.upload ) {
                                xhr.upload.addEventListener( 'progress', evt => {
                                    if ( evt.lengthComputable ) {
                                        loader.uploadTotal = evt.total;
                                        loader.uploaded = evt.loaded;
                                    }
                                } );
                            }
                        }

                        // Prepares the data and sends the request.
                        _sendRequest( file ) {
                            // Prepare the form data.
                            const data = new FormData();

                            data.append( 'upload', file );

                            // Important note: This is the right place to implement security mechanisms
                            // like authentication and CSRF protection. For instance, you can use
                            // XMLHttpRequest.setRequestHeader() to set the request headers containing
                            // the CSRF token generated earlier by your application.

                            // Send the request.
                            this.xhr.send( data );
                        }
                    }

                    // ...

                    function MyCustomUploadAdapterPlugin( editor ) {
                        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                            // Configure the URL to the upload script in your back-end here!
                            return new MyUploadAdapter( loader );
                        };
                    }

                    // ...

                    ClassicEditor
                        .create( document.querySelector( '#editor' ), {
                            extraPlugins: [ MyCustomUploadAdapterPlugin ],

                            // ...
                        } )
                        .catch( error => {
                            console.log( error );
                        } );

                </script>
        </div>

    </div>

    </x-app-layout>
