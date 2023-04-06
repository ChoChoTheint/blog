
<x-admin-layout>
  <h1 class="mx-auto">Blog Create Form</h1>
 
    <form class="mx-auto" method="POST" action="/admin/blogs" enctype="multipart/form-data">
    
        @csrf
        <x-form name='title' title="Title" type="text" :old=" old('title') "/>
        
        <x-form name='slug' title="Slug" type="text" :old=" old('slug') "/> 

        <x-form name='photo' title="Photo" type="file" :old=" old('photo') "/>
        
        <div class="mb-3">
          <label for="">Body</label>
          <textarea name="body" id="summernote" cols="30" rows="10" class="form-control" :old=" old('body')"></textarea>
        </div>
        <x-error name="body" />

        <div class="mb-3">
				<label for="category_id" class="mb-1">Category</label>
				<select class="form-select" name="category_id">
				  <option selected disabled>Select category</option>

				  @foreach($categories as $category)

				  <option value="{{$category->id}}">{{$category->name}}</option>

				  @endforeach

				</select>
			  
			  <x-error name="category" />
 
        </div>
       
   
    <button type="submit" class="btn btn-primary mb-2">Submit</button>
   
 

</form>
</x-admin-layout>