<x-app-layout>
    <div class="container bg-slate-400 ml-auto mr-auto py-3 px-3">
        <main>
            @include('banner')
            <section class="pb-20 bg-gray-300 -mt-24">
                <div class="container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-3">
                    @foreach ($posts as $post)
                    <div class="flex flex-wrap">
                      <div class="lg:pt-12 pt-6 w-full px-4 text-center">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                          <div class="px-4 py-5 flex-auto">
                            <div class="mb-2">
                                  <span class="absolute left-6 top-6 italic bg-yellow-400 rounded-lg px-2 shadow-md text-sm">Categoría: {{$post->category->name}}</span>
                                  <img src="@if($post->image){{Storage::url($post->image->url)}}@else /storage/posts/default.jpg @endif" >
                            </div>
                            @foreach ($post->tags as $tag )
                                <a href="{{ route('posts.tag',$tag) }}" class="inline-block px-3 h-6 bg-purple-600 text-white rounded-full text-sm">{{$tag->name}}</a>
                            @endforeach
                            <a href="{{ route('posts.show',$post) }}" class="mt-2 mb-4 text-gray-600">
                              <p>{{$post->name}}</p>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                </div>
                <div class="mx-4 mt-4">
                    {{$posts->links()}}
                </div>
              </section>

          </main>
        @include('footer')
    </div>

</x-app-layout>
