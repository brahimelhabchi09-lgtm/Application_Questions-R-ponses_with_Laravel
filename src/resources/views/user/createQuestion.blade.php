<!DOCTYPE html>

<html class="light" lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Create Question - Grand Line Questions</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />
  <!-- Material Symbols -->
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
            "primary-dark": "#c42b28",
            "gold-accent": "#FFD700",
            "background-light": "#f8f6f6",
            "background-dark": "#211111",
            "surface-light": "#ffffff",
            "surface-dark": "#2d1b1b", // slightly reddish dark brown for pirate feel
          },
          fontFamily: {
            "display": ["Spline Sans", "sans-serif"],
            "body": ["Noto Sans", "sans-serif"],
          },
          borderRadius: {
            "DEFAULT": "0.25rem",
            "lg": "0.5rem",
            "xl": "0.75rem",
            "2xl": "1rem",
            "full": "9999px"
          },
        },
      },
    }
  </script>
  <style>
    /* Custom Scrollbar for textarea */
    textarea::-webkit-scrollbar {
      width: 8px;
    }

    textarea::-webkit-scrollbar-track {
      background: transparent;
    }

    textarea::-webkit-scrollbar-thumb {
      background-color: #e5dcdc;
      border-radius: 4px;
    }

    .dark textarea::-webkit-scrollbar-thumb {
      background-color: #4a4a4a;
    }

    /* Subtle Wave Pattern */
    .ocean-pattern {
      background-image: radial-gradient(circle at 1px 1px, rgba(0, 0, 0, 0.03) 1px, transparent 0);
      background-size: 24px 24px;
    }

    .dark .ocean-pattern {
      background-image: radial-gradient(circle at 1px 1px, rgba(255, 255, 255, 0.05) 1px, transparent 0);
    }
  </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-50 antialiased min-h-screen flex flex-col ocean-pattern transition-colors duration-300">
  <!-- Top Navigation -->
  <header class="sticky top-0 z-50 w-full bg-surface-light/90 dark:bg-surface-dark/90 backdrop-blur-md border-b border-stone-200 dark:border-stone-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <!-- Logo -->
        <div class="flex items-center gap-3">
          <div class="text-primary">
            <span class="material-symbols-outlined text-3xl">sailing</span>
          </div>
          <h2 class="text-lg font-bold tracking-tight text-slate-900 dark:text-white">Grand Line Questions</h2>
        </div>
        <!-- Desktop Nav -->
        <nav class="hidden md:flex items-center gap-8">
          <a class="text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary transition-colors" href="#">Home</a>
          <a class="text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary transition-colors" href="#">Adventures</a>
          <a class="text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary transition-colors" href="#">Logbook</a>
        </nav>
        <!-- Profile -->
        <div class="flex items-center gap-4">
          <div class="hidden sm:block text-right">
            <p class="text-sm font-medium text-slate-900 dark:text-white">Captain Kidd</p>
            <p class="text-xs text-slate-500 dark:text-slate-400">Level 45 Pirate</p>
          </div>
          <div class="h-10 w-10 rounded-full bg-stone-200 bg-cover bg-center border-2 border-transparent hover:border-primary cursor-pointer transition-all" data-alt="User profile avatar showing a stylized pirate character" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCyXy7_svU-u-s73HEfy97msUB_GKh0PlWPxAdHdtN7HPHe4rRww5mGmcNqBU_L99fp7j_MSujN8Hv7FWrEqRWSPdgKhnK5Y6AnIG9XvWlbBVATiA4M1KuBRY3tyO-713DQYAWMrv-OySsRNdGMi-0j7qN2bpcEAkutX3_7JngcjFGSfb9VC_LUpYZBKMaj3orvYRiATRSGc9UI2zWq-HC7ZfGvg4GcgUrV6xaKIzTh4qQbdFFam_bMQZanyON2LYfYnx1eSXnEAaqx');"></div>
        </div>
      </div>
    </div>
  </header>
  <!-- Main Content -->
  <main class="flex-grow w-full max-w-5xl mx-auto px-4 sm:px-6 py-8 sm:py-12">
    <!-- Page Header -->
    <div class="mb-10 text-center sm:text-left">
      <h1 class="text-3xl sm:text-4xl font-black tracking-tight text-slate-900 dark:text-white mb-2">Chart Your Course</h1>
      <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl">
        Ask the seas for guidance on your next journey or share a tale of woe from the Calm Belt.
      </p>
    </div>
    <!-- Form Card -->
    <div class="bg-surface-light dark:bg-surface-dark rounded-2xl shadow-xl border border-stone-100 dark:border-stone-800 overflow-hidden">
      <!-- Decorative Top Border -->
      <div class="h-1 w-full bg-gradient-to-r from-primary via-gold-accent to-primary"></div>
      <form action="/questions/store" method="POST" class="p-6 sm:p-10 space-y-8">
        @csrf
        <!-- Section 1: The Question -->
        <div class="space-y-6">
          <div class="flex flex-col gap-2">
            <label class="text-sm font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400" for="title">Question Title</label>
            <input class="w-full h-14 px-4 bg-white dark:bg-stone-900/50 border border-stone-200 dark:border-stone-700 rounded-lg text-slate-900 dark:text-white placeholder-stone-400 focus:border-primary focus:ring-1 focus:ring-primary transition-all text-lg" id="title" placeholder="e.g. How to navigate the Calm Belt without a Sea Stone keel?" type="text" name="title"/>
          </div>
        </div>
        <!-- Section 2: The Logbook Entry -->
        <div class="flex flex-col gap-2">
          <label class="text-sm font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400" for="content">Logbook Entry Details</label>
          <div class="relative">
            <textarea class="w-full min-h-[240px] p-4 bg-white dark:bg-stone-900/50 border border-stone-200 dark:border-stone-700 rounded-lg text-slate-900 dark:text-white placeholder-stone-400 focus:border-primary focus:ring-1 focus:ring-primary transition-all resize-y leading-relaxed" id="content" placeholder="Describe your predicament or discovery in detail. The more details you provide, the more likely a navigator will help..." name="content"></textarea>
            <!-- Markdown Toolbar Simulation -->
            <div class="absolute bottom-3 left-3 right-3 flex items-center gap-2 px-2 py-1 bg-stone-50 dark:bg-stone-800 rounded-md border border-stone-200 dark:border-stone-700 opacity-60 hover:opacity-100 transition-opacity">
              <button class="p-1 hover:bg-stone-200 dark:hover:bg-stone-700 rounded text-slate-600 dark:text-slate-300" type="button">
                <span class="material-symbols-outlined text-[20px]">format_bold</span>
              </button>
              <button class="p-1 hover:bg-stone-200 dark:hover:bg-stone-700 rounded text-slate-600 dark:text-slate-300" type="button">
                <span class="material-symbols-outlined text-[20px]">format_italic</span>
              </button>
              <button class="p-1 hover:bg-stone-200 dark:hover:bg-stone-700 rounded text-slate-600 dark:text-slate-300" type="button">
                <span class="material-symbols-outlined text-[20px]">link</span>
              </button>
              <div class="h-4 w-px bg-stone-300 dark:bg-stone-600 mx-1"></div>
              <button class="p-1 hover:bg-stone-200 dark:hover:bg-stone-700 rounded text-slate-600 dark:text-slate-300" type="button">
                <span class="material-symbols-outlined text-[20px]">image</span>
              </button>
            </div>
          </div>
        </div>
        <!-- Action Buttons -->
        <div class="pt-6 flex flex-col-reverse sm:flex-row items-center justify-end gap-4 border-t border-stone-100 dark:border-stone-800">
          <button   class="w-full sm:w-auto px-6 py-3.5 rounded-lg text-slate-600 dark:text-slate-400 font-medium hover:bg-stone-100 dark:hover:bg-stone-800 transition-colors flex items-center justify-center gap-2 group" type="button">
            <span class="material-symbols-outlined group-hover:text-primary transition-colors">close</span>
            Abandon Ship
          </button>
          <button  type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-primary hover:bg-primary-dark text-white rounded-lg font-bold shadow-lg shadow-primary/30 transition-all transform active:scale-95 flex items-center justify-center gap-3" type="submit">
            <span>Drop the Anchor</span>
            <span class="material-symbols-outlined text-gold-accent">anchor</span>
          </button>
        </div>
      </form>
    </div>
    <!-- Helper Text / Footer -->
    <p class="mt-6 text-center text-sm text-slate-400 dark:text-slate-500">
      By dropping the anchor, you agree to the <a class="text-primary hover:underline" href="#">Pirate Code</a>.
    </p>
  </main>
</body>

</html>