<!DOCTYPE html>

<html class="light" lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Questions Feed - Grand Line Questions</title>
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;700;900&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#e53734",
            "background-light": "#f8f6f6",
            "background-dark": "#211111",
            "paper-light": "#ffffff",
            "paper-dark": "#2d1b1b",
            "text-main": "#171111",
            "text-sub": "#876464",
          },
          fontFamily: {
            "display": ["Spline Sans", "Noto Sans", "sans-serif"],
            "body": ["Noto Sans", "sans-serif"]
          },
          borderRadius: {
            "DEFAULT": "0.25rem",
            "lg": "0.5rem",
            "xl": "0.75rem",
            "2xl": "1rem",
            "full": "9999px"
          },
          boxShadow: {
            'map': '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
          }
        },
      },
    }
  </script>
</head>

<body class="bg-background-light dark:bg-background-dark text-text-main dark:text-gray-100 font-display min-h-screen flex flex-col overflow-x-hidden">
  <!-- TopNavBar -->
  <header class="sticky top-0 z-50 flex items-center justify-between border-b border-solid border-b-[#e5dcdc] dark:border-b-[#3a2525] bg-paper-light/95 dark:bg-paper-dark/95 backdrop-blur-sm px-6 py-3 lg:px-10">
    <div class="flex items-center gap-4">
      <div class="size-10 flex items-center justify-center rounded-full bg-primary/10 text-primary">
        <span class="material-symbols-outlined text-2xl">explore</span>
      </div>
      <h2 class="text-text-main dark:text-white text-xl font-bold leading-tight tracking-[-0.015em] hidden sm:block">Grand Line Questions</h2>
    </div>
    <div class="flex items-center gap-4 lg:gap-8">
      <nav class="hidden md:flex items-center gap-6">
        <a class="text-text-main dark:text-gray-200 text-sm font-bold hover:text-primary transition-colors" href="#">Home</a>
        <a class="text-text-sub dark:text-gray-400 text-sm font-medium hover:text-primary transition-colors" href="{{route('favorites.index')}}">Favorites</a>
        <a class="text-text-sub dark:text-gray-400 text-sm font-medium hover:text-primary transition-colors" href="#">Crew</a>
        <a class="text-text-sub dark:text-gray-400 text-sm font-medium hover:text-primary transition-colors" href="{{auth()->check() ? route('logout') : route('login')}}">logout</a>
      </nav>
      <a href="{{route('questions.create')}}" class="flex items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary hover:bg-red-600 transition-colors text-white text-sm font-bold leading-normal tracking-[0.015em] shadow-lg shadow-primary/20">
        <span class="material-symbols-outlined text-[20px] mr-2">add_circle</span>
        <span class="truncate">Post a Question</span>
      </a>
      <div class="bg-center bg-no-repeat bg-cover rounded-full size-10 border-2 border-primary/20 cursor-pointer" data-alt="User avatar illustration of a pirate character" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA2ireMT5ongGX8ZMM8ypUT_z-8aN_kUCiAlde-ngUenwQRtGv5kOSVnDXUmAGukOzJx_keOGhVorSLdI2zdlaRFIzzxQOZggIlrnAzw8-T6gH2gCZztwo0lkA0-0F73T3k59JINdSQrqprQEzyCjEL5gr2_kF3P8mik6jRLoQ-SZSKnI3K3w1gW1nP_yNtHR3EJmAolQUlYKoHojMJ77A_HUfAcPs5InWQrksMzuNEKpyjK27vl40L_-GGXJ1RJJElgUvnAMVjoKSF");'>
      </div>
    </div>
  </header>
  <div class="layout-container flex h-full grow flex-col">
    <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center py-8">
      <div class="layout-content-container flex flex-col max-w-[960px] flex-1 gap-8">
        <!-- PageHeading & Search -->
        <div class="flex flex-col gap-6">
          <div class="flex flex-col gap-2">
            <h1 class="text-text-main dark:text-white text-4xl md:text-5xl font-black leading-tight tracking-[-0.033em]">
              Questions from the Grand Line
            </h1>
            <p class="text-text-sub dark:text-gray-400 text-lg font-normal leading-normal max-w-2xl">
              Seek knowledge across the seas, from the East Blue to the New World. Find the treasure you seek.
            </p>
          </div>
          <!-- Search Bar -->
          <div class="w-full">
            <div class="flex w-full items-stretch rounded-xl h-14 shadow-sm ring-1 ring-inset ring-gray-200 dark:ring-gray-700 bg-paper-light dark:bg-paper-dark">
              <div class="flex items-center pl-4 text-text-sub">
                <span class="material-symbols-outlined">search</span>
              </div>
              <input class="flex w-full min-w-0 flex-1 resize-none bg-transparent border-none focus:ring-0 text-text-main dark:text-white placeholder:text-text-sub px-3 text-base font-normal leading-normal" placeholder="Search for treasures, routes, or mysteries..." value="" />
              <div class="flex items-center pr-2">
                <button class="flex items-center justify-center rounded-lg h-10 px-6 bg-primary hover:bg-red-700 text-white text-sm font-bold transition-colors">
                  Find
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- Feed List -->
        <div class="flex flex-col gap-4">
          <!-- Card 1 -->
          @foreach ($questions as $question)
          <div class="group flex flex-col gap-0 bg-paper-light dark:bg-paper-dark rounded-xl border border-gray-200 dark:border-gray-800 shadow-map hover:-translate-y-1 transition-transform duration-300">
            <div class="p-5 flex gap-4 items-start">
              <div class="bg-center bg-no-repeat bg-cover rounded-xl h-16 w-16 shrink-0 border border-gray-200 dark:border-gray-700 shadow-sm" data-alt="Close up of a fantasy map showing an island" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBeE42kPwPqK5RICq1w97CFW67xErBRvtwU47LJjA9B3x1xlnVO-oajfqlYNZ8VOxpARPDdg2O_puifyXoR4OhcRyq3CH61bBRdd4JgamNJgI863lxC-V_s2mT__7ArUU9Irg_KCWW92UiQcvgJJW0ZTAL5YkDWsszCw8_GjvECF-UHhPlO2yvC4jOD6qRo7h0ZbVBv6rn_6Ne-5ALbKHwhtGlTCOm55Y8XqWwkIHNQp7EAr2Vw_4Du6Gt6tFQQE9H4XaJbfgqv792d");'>
              </div>
              <div class="flex flex-1 flex-col gap-2">
                <div class="flex justify-between items-start">
                  <h3 class="text-text-main dark:text-white text-lg font-bold leading-snug cursor-pointer group-hover:text-primary transition-colors">{{ $question->title}}</h3>
                  <span class="shrink-0 inline-flex items-center gap-1 rounded-full bg-primary/10 px-2 py-1 text-xs font-bold text-primary border border-primary/20">
                </div>
                <p class="text-text-main dark:text-gray-300 text-sm font-normal leading-relaxed line-clamp-2">
                  {{ $question->content}}
                </p>
                <div class="flex items-center gap-2 mt-1">
                  <span class="text-xs font-bold text-text-sub dark:text-gray-500 uppercase tracking-wider flex items-center gap-1">
                    <span class="text-xs text-text-sub dark:text-gray-500">{{ $question->created_at}}</span>
                </div>
              </div>
            </div>
            <!-- Nautical Divider -->
            <div class="relative h-px w-full bg-gray-100 dark:bg-gray-800">
              <div class="absolute left-1/2 -top-2 -translate-x-1/2 bg-paper-light dark:bg-paper-dark px-2 text-gray-300 dark:text-gray-600">
                <span class="material-symbols-outlined text-[16px]">anchor</span>
              </div>
            </div>
            <!-- Actions -->
            <div class="flex items-center justify-between px-5 py-3">
              <div class="flex items-center gap-4">
                <form action="{{route('favorites.store')}}" method="POST">
                  @csrf
                  <input type="hidden" name="question_id" value="{{ $question->id }}">
                  <button type="submit" class="flex items-center gap-1.5 text-sm font-medium text-text-sub dark:text-gray-400 hover:text-yellow-500 transition-colors">
                    <span class="material-symbols-outlined text-[20px]">star</span>
                    Favorite
                  </button>
                </form>
              </div>
              <div class="flex items-center gap-4">
                <a href="/questions/show/{{ $question->id }}" class="flex items-center gap-1.5 text-sm font-medium text-text-sub dark:text-gray-400 hover:text-yellow-500 transition-colors">
                  <span class="material-symbols-outlined text-[20px]">info</span>
                  Read more
                </a>
              </div>
              <div class="flex items-center gap-2">
                @if($question->user_id == auth()->user()->id)
                <form action="{{route('questions.edit',['id' => $question->id])}}">
                  <button type="submit" class="p-1.5 text-text-sub dark:text-gray-400 hover:text-text-main dark:hover:text-white rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors" title="Edit">
                    <span class="material-symbols-outlined text-[18px]">edit</span>
                  </button>
                </form>
                @endif
                @if($question->user_id == auth()->user()->id)
                <form action="{{route('questions.destroy',['id' => $question->id])}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="id" value="{{$question->id}}">
                  <button type="submit" class="p-1.5 text-text-sub dark:text-gray-400 hover:text-red-600 rounded-md hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" title="Delete">
                    <span class="material-symbols-outlined text-[18px]">delete</span>
                  </button>
                </form>
                @endif
              </div>
            </div>
          </div>
          @endforeach
          <div class="border-t border-parchment-border dark:border-gray-700 bg-parchment dark:bg-gray-800/30 p-4 flex items-center justify-between">
            {{ $questions->links() }}
          </div>
          <!-- Empty State / Footer hint -->
          <div class="flex justify-center py-8 opacity-60">
            <div class="flex flex-col items-center gap-2">
              <span class="material-symbols-outlined text-4xl text-text-sub">sentiment_dissatisfied</span>
              <p class="text-sm font-medium text-text-sub">End of the logbook.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>