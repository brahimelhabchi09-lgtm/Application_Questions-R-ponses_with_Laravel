<!DOCTYPE html>

<html class="light" lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Favorites - Grand Line Questions</title>
  <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
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
          },
          fontFamily: {
            "display": ["Spline Sans", "sans-serif"]
          },
          borderRadius: {
            "DEFAULT": "0.25rem",
            "lg": "0.5rem",
            "xl": "0.75rem",
            "full": "9999px"
          },
        },
      },
    }
  </script>
  <style>
    /* Custom scrollbar for a cleaner look */
    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-track {
      background: transparent;
    }

    ::-webkit-scrollbar-thumb {
      background: #e5dcdc;
      border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #876464;
    }
  </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-[#171111] dark:text-white antialiased">
  <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
    <!-- Navigation -->
    <header class="sticky top-0 z-50 flex items-center justify-between border-b border-solid border-[#e5dcdc] bg-white/90 dark:bg-[#1a0f0f]/90 backdrop-blur-md px-6 py-3 lg:px-10">
      <div class="flex items-center gap-8">
        <div class="flex items-center gap-3">
          <div class="size-8 text-primary flex items-center justify-center">
            <span class="material-symbols-outlined" style="font-size: 32px;">anchor</span>
          </div>
          <h2 class="text-lg font-bold leading-tight tracking-[-0.015em] hidden sm:block">Grand Line Questions</h2>
        </div>
        <nav class="hidden md:flex items-center gap-6">
          <a class="text-sm font-medium hover:text-primary transition-colors" href="{{route('questions.index')}}">Home</a>
          <a class="text-sm font-medium hover:text-primary transition-colors" href="#">Feed</a>
          <a class="text-sm font-medium text-primary" href="#">Favorites</a>
          <a class="text-sm font-medium hover:text-primary transition-colors" href="#">Profile</a>
        </nav>
      </div>
      <div class="flex items-center justify-end gap-4">
        <div class="hidden sm:flex w-64 items-center rounded-lg bg-[#f4f0f0] dark:bg-[#2a1d1d] h-10 px-3">
          <span class="material-symbols-outlined text-[#876464]" style="font-size: 20px;">search</span>
          <input class="w-full bg-transparent border-none text-sm px-2 focus:ring-0 placeholder:text-[#876464] dark:text-white" placeholder="Search knowledge..." />
        </div>
        <button class="size-10 rounded-full bg-gray-200 dark:bg-gray-700 bg-center bg-cover border-2 border-primary" data-alt="User profile avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCkO_jv1sC3QTGqJQroSMAerpA0H4WCDrUEzmZQMyaltxAz8Q2FqZlMPwQKNWJnrQI2LfXtJ20na5wZ8UM6aNwBts0cYHTVKJxNHsSL5zDcWB8aFllgBcli4vfUbW1xlt9KVfh7wnyEy9JJfWN_lM15FuprR3ejAogSA8gb_4-DAmSp1xXQYg_HRl56ypAuAyGKlVXo8utck5gWlL2y3g3tVm0AMlHL8ZBki0guRuF-iclKKfQZo2XhGs8Y0kN5tB3IK5E5lFK-UcZV');"></button>
      </div>
    </header>
    <!-- Main Content Area -->
    <main class="flex-1 px-4 py-8 md:px-10 lg:px-20 max-w-7xl mx-auto w-full">
      <!-- Hero / Header Section -->
      <div class="relative mb-10 overflow-hidden rounded-xl bg-white dark:bg-[#1e1414] shadow-sm p-8 border border-[#e5dcdc] dark:border-[#3a2d2d]">
        <!-- Background decorative element -->
        <div class="absolute right-0 top-0 h-full w-1/3 opacity-10 pointer-events-none" data-alt="Silhouette of a pirate ship sailing" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBtIt-VD3VjJo5P62l3rruTvzt5AmxAR_n-Rod0LHDBp4Uk9d9YzJaYvgFxa0C0WGxwpbQVMYYrs4n3jTCyUAKiVG40ZOSJRr7mVRdFeqZk_Ca7TZ1Jd4yzMwRaPJjfpoVeqLU1xtBsoKW9ZaRwaz5o-7Od4ruMAqn9CvNJEXlwCsM98dHAdoEnK4Y1BmQFqDHOujFPH6GD9ew30rTI7bqy3xGEXFaTDlyyXe4ZmmU5dryeil401okzkFh8KdGrI2eWYx5YB_qMNvmK'); background-size: contain; background-repeat: no-repeat; background-position: right center;">
        </div>
        <div class="relative z-10 flex flex-col gap-4 max-w-2xl">
          <div class="flex items-center gap-3 text-yellow-500">
            <span class="material-symbols-outlined fill-1" style="font-variation-settings: 'FILL' 1;">star</span>
            <span class="text-sm font-bold tracking-wider uppercase text-[#876464] dark:text-[#a08080]">Your Treasure Hoard</span>
          </div>
          <h1 class="text-4xl md:text-5xl font-black leading-tight tracking-tight text-[#171111] dark:text-white">
            Favorites
          </h1>
          <p class="text-lg text-[#876464] dark:text-[#a89898] max-w-lg">
            Your personal stash of valuable knowledge from the Grand Line. Keep these secrets safe!
          </p>
        </div>
      </div>
      <!-- Controls: Filter & Sort -->
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-8">
        <!-- Chips -->
        <div class="flex flex-wrap gap-2">
          <button class="flex h-9 items-center justify-center px-4 rounded-full bg-[#171111] text-white text-sm font-medium transition-transform active:scale-95">
            All
          </button>
          <button class="flex h-9 items-center justify-center px-4 rounded-full bg-white dark:bg-[#2a1d1d] border border-[#e5dcdc] dark:border-[#3a2d2d] hover:border-primary text-sm font-medium transition-colors text-[#5c4040] dark:text-[#d0c0c0]">
            Navigation
          </button>
          <button class="flex h-9 items-center justify-center px-4 rounded-full bg-white dark:bg-[#2a1d1d] border border-[#e5dcdc] dark:border-[#3a2d2d] hover:border-primary text-sm font-medium transition-colors text-[#5c4040] dark:text-[#d0c0c0]">
            Combat
          </button>
          <button class="flex h-9 items-center justify-center px-4 rounded-full bg-white dark:bg-[#2a1d1d] border border-[#e5dcdc] dark:border-[#3a2d2d] hover:border-primary text-sm font-medium transition-colors text-[#5c4040] dark:text-[#d0c0c0]">
            Devil Fruits
          </button>
        </div>
        <!-- Sort Dropdown -->
        <div class="relative min-w-[200px]">
          <span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[#876464]" style="font-size: 20px;">sort</span>
          <select class="w-full h-10 pl-10 pr-4 rounded-lg border-none bg-white dark:bg-[#2a1d1d] ring-1 ring-[#e5dcdc] dark:ring-[#3a2d2d] focus:ring-2 focus:ring-primary text-sm outline-none cursor-pointer appearance-none text-[#171111] dark:text-white">
            <option>Date Added (Newest)</option>
            <option>Date Added (Oldest)</option>
            <option>Most Popular</option>
          </select>
          <span class="absolute right-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[#876464] pointer-events-none" style="font-size: 20px;">arrow_drop_down</span>
        </div>
      </div>
      <!-- Grid Content -->
      <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        <!-- Card 1 -->
        @foreach($favorites as $favorite)
        <div class="group flex flex-col rounded-xl bg-white dark:bg-[#1e1414] border border-[#e5dcdc] dark:border-[#3a2d2d] overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-250">
          <div class="relative h-48 w-full bg-gray-100 overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" data-alt="Map of the Calm Belt sea region" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCJ1BcB8jfhdXd_XWrsuZ5gBTEslUEYz0FL6k0qNflepJ0KgDqQ3g2pqiepcU6NbmU0R7zer39TKdHJCGRAAql2T5ByiRT_UfNPQL2UNjTIGH69fvcAVpGPr8fzCou_NDpvKANL4DyosmVA89VyF7GkdDJrGBPYLa472BglusrnUlujwIw10WzcyaD-dWxnc7SkX4IpmsPGdawrJieE-yHIcV8p37M9FPeB-9rDAr_PzQ7_chX54JtG733Ucn8IVLnxRNgq6KUQLCnV');"></div>
            <div class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 px-2 py-1 rounded text-xs font-bold uppercase tracking-wider text-primary backdrop-blur-sm">
              Navigation
            </div>
          </div>
          <div class="p-5 flex flex-col flex-1">
            <h3 class="text-xl font-bold text-[#171111] dark:text-white mb-2 leading-snug group-hover:text-primary transition-colors">
              {{ $favorite->question->title }}
            </h3>
            <p class="text-sm text-[#5c4040] dark:text-[#b0a0a0] mb-6 line-clamp-2 flex-1">
              {{ $favorite->question->content}}
            </p>
            <form action="{{ route('favorites.destroy', ['id' => $favorite->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <input type="hidden" name="id" value="{{$favorite->id}}">
              <button type="submit" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg border border-red-100 dark:border-red-900/30 bg-red-50 dark:bg-red-900/10 text-primary font-medium text-sm hover:bg-primary hover:text-white transition-colors group/btn">
                <span class="material-symbols-outlined group-hover/btn:hidden" style="font-size: 18px;">favorite</span>
                <span class="material-symbols-outlined hidden group-hover/btn:block" style="font-size: 18px;">heart_broken</span>
                <span>Remove from Favorites</span>
              </button>
              </from>
          </div>
        </div>
        @endforeach
        <div class="mt-8 flex justify-center">{{ $favorites->links() }}</div>
      </div>
      
    </main>
    <!-- Footer -->
    <footer class="mt-auto border-t border-[#e5dcdc] bg-white dark:bg-[#1a0f0f] py-8 text-center text-sm text-[#876464] dark:text-[#9a8888]">
      <div class="flex justify-center gap-6 mb-4">
        <a class="hover:text-primary" href="#">Terms of Service</a>
        <a class="hover:text-primary" href="#">Privacy Policy</a>
        <a class="hover:text-primary" href="#">Map of the Grand Line</a>
      </div>
      <p>© 2024 Grand Line Questions. All rights reserved by the Pirate King.</p>
    </footer>
  </div>
</body>

</html>