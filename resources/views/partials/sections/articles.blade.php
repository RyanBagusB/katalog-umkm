<section class="px-4 sm:px-8 lg:px-16 xl:px-20 py-20 bg-white flex flex-col gap-y-12">
  <!-- Header -->
  <div class="flex justify-between items-center">
    <p class="text-2xl sm:text-3xl lg:text-4xl font-semibold text-[#1E1E1E]">Berita Terbaru</p>
    <a
      href="{{ route('news.index') }}"
      class="text-sm sm:text-base px-5 py-2 border border-[#CCC] rounded-full hover:bg-gray-100 transition-all"
    >
      Lihat Semua
    </a>
  </div>

  <!-- Content Grid -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mx-auto">
    {{-- Left Featured Article --}}
    @if($news->isNotEmpty())
      @php $featured = $news->first(); @endphp
      <a href="{{ route('news.show', $featured->slug) }}" class="group block">
        <div class="flex flex-col gap-y-4">
          <div class="overflow-hidden rounded-2xl shadow-lg">
            @if($featured->image)
              <img
                src="{{ asset('storage/' . $featured->image) }}"
                alt="{{ $featured->title }}"
                class="w-full aspect-[3/2] object-cover transform group-hover:scale-105 transition duration-500"
              />
            @endif
          </div>
          <div>
            <h3 class="text-xl font-semibold text-[#1E1E1E]">{{ $featured->title }}</h3>
            <p class="text-gray-500 mt-2">
              {{ Str::limit(strip_tags($featured->content), 150) }}
            </p>
          </div>
        </div>
      </a>
    @endif

    {{-- Right Article List --}}
    <div class="flex flex-col gap-4">
      @foreach($news->skip(1)->take(3) as $item)
      <a href="{{ route('news.show', $item->slug) }}" class="group block">
        <div class="md:grid grid-cols-3 gap-4 items-start md:items-center lg:items-start">
          <div class="col-span-1 overflow-hidden rounded-2xl shadow-md">
            @if($item->image)
              <img
                src="{{ asset('storage/' . $item->image) }}"
                alt="{{ $item->title }}"
                class="w-full aspect-[3/2] sm:aspect-[4/3] object-cover transform group-hover:scale-105 transition duration-500"
              />
            @endif
          </div>
          <div class="col-span-2 flex flex-col justify-center">
            <h3 class="text-xl font-semibold text-[#1E1E1E]">{{ $item->title }}</h3>
            <p class="text-gray-500 text-sm sm:text-base mt-1">
              {{ Str::limit(strip_tags($item->content), 100) }}
            </p>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>
