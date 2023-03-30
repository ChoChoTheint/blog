@props(['blog'])
<div class="card">
    <img
        src="/storage/{{$blog->photo}}"
        class="card-img-top"
        alt="..."
    />
    <div class="card-body">
        <h3 class="card-title">{{$blog->title}}</h3>
        <p class="fs-6 text-secondary">
            <a href="/?author={{$blog->author->username}}">{{$blog->author->name}}</a>
            <span> -{{\Carbon\Carbon::parse($blog->created_at)->diffForHumans()}}</span>
        </p>
        <div class="tags my-3">
        <!--  -->
        <!--/categories/{{$blog->category->name}} -->
            <a href="/?category={{$blog->category->slug}}"><span
                    class="badge bg-primary">{{$blog->category->name}}</span></a>
        </div>
        <p class="card-text">
            {{$blog->intro}}
        </p>

       <!-- <p> -->
            <!-- {{$blog->slug}} -->
       <!-- </p> -->


       <!-- 
            /?users=/{$user->username}
            /blogs/{blog:slug}
        -->
       <a href="/blogs/{{$blog->slug}} " 
            class="btn btn-primary"
        >Read More</a>
    </div>
</div>
