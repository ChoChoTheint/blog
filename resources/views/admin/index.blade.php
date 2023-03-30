<x-admin-layout>
    <h1>All Blogs</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
        @foreach ($blogs as $blog)
        <tr>
            <th scope="row">{{$blog->id}}</th>
            <td>{{$blog->title}}</td>
            <td>{{$blog->slug}}</td>
            <td class="d-flex">
              <div class="mx-2">
                <button class="btn btn-primary ">
                  <a href="/admin/blogs/{{$blog->id}}" style="text-decoration: none;color:white">Edit</a>
                </button>              
              </div>
                <form action="/admin/blogs/{{$blog->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
  </tbody>
</table>
{{$blogs->links()}}
</x-admin-layout>