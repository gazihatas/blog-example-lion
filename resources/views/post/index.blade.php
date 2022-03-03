<x-app-layout>

<div class="card">
    <div class="card-header">
        <div class="float-left font-weight-bolder">My Post</div>
        <div class="float-right">
            <a href="{{route()}}" class="btn btn-sm btn-primary">Add Post</a>
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
              <tr>
                <th scope="row">image</th>
                <td>Title</td>
                <td>Slug</td>
                <td>Body</td>
                <td>Icons</td>
              </tr>
            </tbody>
          </table>
    
    </div>

</div>

</x-app-layout>
