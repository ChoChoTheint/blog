

<x-layout>

    <x-hero></x-hero>
    
    <x-blog-section 
    :blogs="$blogs" 
    :categories="$categories" 
    
    ></x-blog-section>
    <x-subscribe></x-subscribe>
</x-layout>
  

<!-- :currentCategory="$currentCategory" -->