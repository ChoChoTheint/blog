
<x-layout>
    <div class="container my-3">
        <div class="text-center">
            <h2  class="text-ceneter">Blog Edit Page</h2>

        </div>


            <div class="row">
                <div class="col-md-6 mx-auto">
                <!-- blogs/{{$blog->id}} -->
                    <form class='form' action="/admin/blogs/{blogs}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <x-form name='title' title="Title" type="text" value="{{ $blog->title }}" :old=" old('title') "/>

                        <x-form name='slug' title="Slug" type="text" value="{{ $blog->slug }}" :old=" old('slug') "/>
                        
                        <div class="mb-3">
                            <label for="">Body</label>
                            <textarea name="body" id="summernote" cols="30" rows="10" class="form-control" value="{{ $blog->body }}" :old=" old('body') " ></textarea>
                        </div>
                        <x-error name="body" />

                        <x-form name="photo" title="Photo" type="file" value="{{ $blog->photo }}" :old=" old('photo') "/>

                        <div class="container">
                            <img src="{{ $blog->photo }}" class="img-thumbnail" alt="{{ $blog->name }}">
                        </div>


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
                        

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>

    </div>
</x-layout>