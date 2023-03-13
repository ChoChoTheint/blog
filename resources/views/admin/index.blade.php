<x-layout>
    <h1 class="text-center">Blog Create Form</h1>
    <form class="col-md-8 mx-auto" method="POST" action="/admin/blogs" enctype="multipart/form-data">
        @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input name="title" type="text" class="form-control" id="title" placeholder="Enter Title">
    <x-error name="title" />
  </div>
  <div class="mb-3">
   <label for="slug" class="form-label">Slug</label>
   <input name="slug" type="text" class="form-control" id="slug" placeholder="Enter Slug">
   <x-error name="slug" />
 </div>


 <div class="mb-3">
  <label for="photo" class="form-label">Photo</label>
  <input name="photo" type="file" class="form-control" id="photo" placeholder="Choose file">
  <x-error name="photo" />
</div>
 <div class="mb-3">
   <label for="body" class="form-label">Body</label>
   <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
   <x-error name="body" />
 </div>
 <div class="mb-3">
  <label for="body" class="form-label">Category</label>
  <select name="category_id" id="" class="form-control">
    @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
  </select>
  <x-error name="category_id" />

</div>
  <button type="submit" class="btn btn-primary mb-5">Submit</button>
</form>
</x-layout>