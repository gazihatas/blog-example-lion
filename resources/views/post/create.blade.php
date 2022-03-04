<x-app-layout>

    <div class="card">
        <div class="card-header">
            <div class="float-left font-weight-bolder">Post Add</div>
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

            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" id="title">
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" name="body" id="description" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="photo">Image</label>
                    <input type="file" class="form-control" name="image" id="photo"></input>
                  </div>

                <button type="submit" class="btn btn-sm bg-success float-right">Post Add</button>
              </form>
        </div>
    
    </div>
    
    </x-app-layout>
    