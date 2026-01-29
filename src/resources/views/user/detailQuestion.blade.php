<!DOCTYPE html>

<html class="light" lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Grand Line Questions - Question Details</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <!-- Theme Configuration -->
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#e53734",
            "background-light": "#f8f6f6",
            "background-dark": "#211111",
            "card-light": "#ffffff",
            "card-dark": "#2d2424",
            "text-main-light": "#171111",
            "text-main-dark": "#f0eaea",
            "text-sec-light": "#876464",
            "text-sec-dark": "#b09c9c",
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
</head>

<body class="bg-background-light dark:bg-background-dark font-display antialiased transition-colors duration-200">
  <div class="relative flex h-auto min-h-screen w-full flex-col overflow-x-hidden">
    <!-- Navbar -->
    <header class="sticky top-0 z-50 flex items-center justify-between border-b border-solid border-b-[#f4f0f0] dark:border-b-[#3a2e2e] bg-card-light dark:bg-card-dark px-4 py-3 md:px-10 shadow-sm">
      <div class="flex items-center gap-4 text-text-main-light dark:text-text-main-dark cursor-pointer">
        <div class="size-8 text-primary flex items-center justify-center">
          <span class="material-symbols-outlined text-3xl">sailing</span>
        </div>
        <h2 class="text-text-main-light dark:text-text-main-dark text-lg font-bold leading-tight tracking-[-0.015em] hidden sm:block">Grand Line Questions</h2>
      </div>
      <div class="flex flex-1 justify-end gap-4 md:gap-8 items-center">
        <label class="hidden md:flex flex-col min-w-40 !h-10 max-w-64">
          <div class="flex w-full flex-1 items-stretch rounded-lg h-full bg-[#f4f0f0] dark:bg-[#3a2e2e]">
            <div class="text-text-sec-light dark:text-text-sec-dark flex border-none items-center justify-center pl-4 rounded-l-lg border-r-0">
              <span class="material-symbols-outlined text-[20px]">search</span>
            </div>
            <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-text-main-light dark:text-text-main-dark focus:outline-0 focus:ring-0 border-none bg-transparent focus:border-none h-full placeholder:text-text-sec-light dark:placeholder:text-text-sec-dark px-4 rounded-l-none border-l-0 pl-2 text-sm font-normal leading-normal" placeholder="Search the logbook..." value="" />
          </div>
        </label>
        <div class="flex items-center gap-3">
          <button class="flex items-center justify-center rounded-full size-10 hover:bg-black/5 dark:hover:bg-white/5 transition-colors text-text-sec-light dark:text-text-sec-dark">
            <span class="material-symbols-outlined">notifications</span>
          </button>
          <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 border-2 border-transparent hover:border-primary cursor-pointer transition-colors" data-alt="User avatar with pirate hat" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuC0VcW2Tk21uJXdh-XEQeNYMJqSRnzH_cnwjC84dR3kwkbjKhP5T1AFWPbE_eTPzzEJEyIxi-MeWAaOnF_0alLkc5Xa2HFKazsF1ojA3GHHlDD2xrcFxMcUQWZ7RBhS9I0FQQxPSvXv6uUe2TBaKPaNqeC3WBSgKeI4fT-SPBKyYpMXn5W2OHJpkRN5WTQxnC6SFOLb8Gb8ciTtw4n-q_cAruqNgw97TKOgCpEEeuLXx4t2E-AdSAJfHL6Z8DjtIIxb78Csyqs-EXxu");'></div>
        </div>
      </div>
    </header>
    <!-- Main Content -->
    <main class="layout-container flex h-full grow flex-col px-4 md:px-40 py-8">
      <div class="flex flex-1 justify-center">
        <div class="layout-content-container flex flex-col max-w-[800px] flex-1 gap-6">
          <!-- Breadcrumbs -->
          <nav class="flex flex-wrap gap-2 px-1">
            <a class="text-text-sec-light dark:text-text-sec-dark hover:text-primary transition-colors text-sm font-medium leading-normal" href="#">Home</a>
            <span class="text-text-sec-light dark:text-text-sec-dark text-sm font-medium leading-normal">/</span>
            <a class="text-text-sec-light dark:text-text-sec-dark hover:text-primary transition-colors text-sm font-medium leading-normal" href="#">Grand Line</a>
            <span class="text-text-sec-light dark:text-text-sec-dark text-sm font-medium leading-normal">/</span>
            <span class="text-text-main-light dark:text-text-main-dark text-sm font-medium leading-normal">Calm Belt Navigation</span>
          </nav>
          <!-- Question Card (Hero) -->
          <article class="flex flex-col bg-card-light dark:bg-card-dark rounded-xl shadow-sm border border-[#f0f0f0] dark:border-[#3a2e2e] overflow-hidden">
            <!-- Header / Title -->
            <div class="p-6 md:p-8 border-b border-[#f4f0f0] dark:border-[#3a2e2e]">
              <div class="flex flex-col gap-4">
                <h1 class="text-text-main-light dark:text-text-main-dark text-2xl md:text-3xl font-black leading-tight tracking-[-0.02em]">
                  {{ $question->title}}
                </h1>
              </div>
            </div>
            <!-- User Info -->

            <div class="px-6 md:px-8 py-4 bg-[#fcfbfb] dark:bg-[#251e1e] flex items-center justify-between">
              <div class="flex items-center gap-3">
                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-12 shadow-sm" data-alt="Avatar of Nami-like navigator" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCV_8S0LXRCaI7M7ycu_ORQaBSARwIjwWxXD1s8HjnaKnJcN52sZyDGT70M0AMSmRtqNrOsEGRJiYyd53tHFTBGs3PGGyCWMkkoP-Zfywskf03CHppaROy7UOEk4RAlDMvykqzNBXCUkGuDJUKVQBq6g5mS-rkLlmKih9d2sqeUhKoEpw2tFKaL_wrlHf8uZHjiGhOXB-Wf9mYP1FQrf90oWqe2pgaLQVi7FTHtx7bbAqDf7-wsipG3m3fdP-Y0tyvYSjtnIlMxLM5S");'></div>
                <div class="flex flex-col">
                  <span class="text-text-main-light dark:text-text-main-dark font-bold text-sm">{{$question->user->name}}</span>
                  <span class="text-text-sec-light dark:text-text-sec-dark text-xs">{{$question->user->email}}</span>
                </div>
              </div>
              <div class="flex gap-2">
                <button class="p-2 text-text-sec-light dark:text-text-sec-dark hover:text-primary hover:bg-primary/5 rounded-full transition-all" title="Share">
                  <span class="material-symbols-outlined text-[20px]">share</span>
                </button>
                <button class="p-2 text-text-sec-light dark:text-text-sec-dark hover:text-red-600 hover:bg-red-50 rounded-full transition-all" title="Report">
                  <span class="material-symbols-outlined text-[20px]">flag</span>
                </button>
              </div>
            </div>
            <!-- Body Content -->
            <div class="p-6 md:p-8 pt-4">
              <p class="text-text-main-light dark:text-text-main-dark text-base md:text-lg font-normal leading-relaxed whitespace-pre-line">
                {{ $question->content}}
              </p>
            </div>
            <!-- Question Actions -->
          </article>
          <!-- Divider -->
          <div class="flex items-center gap-4 py-4">
            <div class="h-px bg-gray-200 dark:bg-gray-700 flex-1"></div>
            <span class="text-text-sec-light dark:text-text-sec-dark text-sm font-medium uppercase tracking-wider">Logbook Entries</span>
            <div class="h-px bg-gray-200 dark:bg-gray-700 flex-1"></div>
          </div>
          <!-- Responses List -->
          <div class="flex flex-col gap-4">
            <!-- Response Card -->
            @foreach($question->responses as $response)
            <div class="bg-card-light dark:bg-card-dark rounded-lg p-6 shadow-sm border border-[#f0f0f0] dark:border-[#3a2e2e]">
              <div class="flex justify-between items-start mb-3">
                <div class="flex items-center gap-3">
                  <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Avatar of shipwright" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAdeIgkGLOyoiM40iA5WBUX2XEcUqA2i7hBU8GpN0XDlUwNF1d-IikEBXc8JRwPPyOkW0Vwrq-95648RtUujf2NlNvpjB-qaotqozk6ryBolku1vkIrl_uBQKlgqRBTrLpBaXIhQ-IXFaYBhKruPyGe95sH30rWGPcChYQ-nA4T1XMuE6EChReyERn31VJmNAgce2cBa9UTkL9MlX8YL0cplaPDW7TW4bbaSva-faAYDA0QVfrYgPePVxJ4_LfXEocTklr_j0bVaxb0");'></div>
                  <div>
                    <p class="text-text-main-light dark:text-text-main-dark font-bold text-sm">{{$response->user->name}}</p>
                    <p class="text-text-sec-light dark:text-text-sec-dark text-xs"></p>
                  </div>
                </div>
              </div>
              <div class="text-text-main-light dark:text-text-main-dark text-sm leading-relaxed mb-4 pl-13 md:pl-0">
                {{$response->content}}
              </div>
              <div class="flex items-center gap-4">
                <button class="text-text-sec-light dark:text-text-sec-dark hover:text-primary text-sm font-medium flex items-center gap-1 transition-colors">
                  <span class="material-symbols-outlined text-[18px]">arrow_upward</span>
                  <span>Helpful (8)</span>
                </button>
                <button class="text-text-sec-light dark:text-text-sec-dark hover:text-primary text-sm font-medium flex items-center gap-1 transition-colors">
                  <span class="material-symbols-outlined text-[18px]">reply</span>
                  <span>Reply</span>
                </button>
                @if(Auth::user()->id == $response->user_id)
                <form action="{{route('reponses.destroy',['id' => $response->id])}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="text-text-sec-light dark:text-text-sec-dark hover:text-red-600 text-sm font-medium flex items-center gap-1 transition-colors">
                    <span class="material-symbols-outlined text-[18px]">delete</span>
                    <span>Delete</span>
                  </button>
                </form>
                @endif
              </div>
            </div>
            @endforeach
          </div>
          <!-- Send Response Form -->
          <div class="sticky bottom-4 z-20 mt-4">
            <form action="{{route('reponses.store')}}" method="POST">
              @csrf
              <input type="hidden" name="question_id" value="{{$question->id}}">
              <div class="bg-card-light dark:bg-card-dark rounded-xl shadow-lg border border-[#f0f0f0] dark:border-[#3a2e2e] p-4 flex flex-col gap-3">
                <div class="flex items-center gap-2 mb-1">
                  <span class="material-symbols-outlined text-primary text-[20px]">edit_note</span>
                  <h3 class="text-text-main-light dark:text-text-main-dark text-sm font-bold uppercase tracking-wide">Add to Logbook</h3>
                </div>
                <textarea class="w-full bg-[#f8f6f6] dark:bg-[#1a1515] text-text-main-light dark:text-text-main-dark rounded-lg border-none focus:ring-1 focus:ring-primary p-3 min-h-[100px] resize-none placeholder:text-text-sec-light dark:placeholder:text-text-sec-dark text-sm" placeholder="Write your wisdom for the logbook..." name="content"></textarea>
                <div class="flex justify-between items-center">
                  <button type="submit" class="bg-primary hover:bg-red-600 text-white font-bold py-2 px-6 rounded-lg transition-colors flex items-center gap-2 shadow-md shadow-red-500/20">
                    <span>Set Sail</span>
                    <span class="material-symbols-outlined text-[18px]">send</span>
                  </button>
                  <a href="{{route('questions.index')}}" type="submit" class="bg-primary hover:bg-red-600 text-white font-bold py-2 px-6 rounded-lg transition-colors flex items-center gap-2 shadow-md shadow-red-500/20">
                    <span>return</span>
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>

</html>