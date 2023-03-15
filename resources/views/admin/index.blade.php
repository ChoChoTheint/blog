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
                <button class="btn btn-warning mx-2">Edit</button>
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