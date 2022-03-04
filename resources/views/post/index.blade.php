<x-app-layout>

<div class="card">
    <div class="card-header">
        <div class="float-left font-weight-bolder">My Post</div>
        <div class="float-right">
            <a href="{{route('post.create')}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i> Add Post</a>
        </div>
    </div>
    
    <div class="card-body">
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Body</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as  $post)
                <tr>
                  <th scope="row"> <img src="{{ asset('images')}}/{{ $post->image_path}}" alt="" style="width:50px"> </th>
                  <td> {{ $post->title }} </td>
                  <td> {{ $post->slug }} </td>
                  <td> {{ \Illuminate\Support\Str::limit($post->body, 50) }} </td>
                  <td>
                      <a href="#" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                      <a href="#" class="btn btn-sm btn-warning"><i class="fa-solid fa-circle-info"></i></a>
                      <a href="#" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    
    </div>

</div>

</x-app-layout>
