<!DOCTYPE html>
<html class="light" lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Grand Line Questions - Admin Dashboard</title>
  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <!-- Tailwind CSS with Plugins -->
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <!-- Theme Configuration -->
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#e53734",
            "primary-dark": "#c12624",
            "parchment": "#fdfbf7",
            "parchment-border": "#e3dccf",
            "gold-accent": "#d4af37",
            "background-light": "#fcfbf7",
            "background-dark": "#211111",
            "text-main": "#2c1810",
            "text-secondary": "#876464",
          },
          fontFamily: {
            "display": ["Spline Sans", "sans-serif"],
            "body": ["Spline Sans", "sans-serif"]
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
    body {
      font-family: "Spline Sans", sans-serif;
    }

    /* Custom scrollbar for the table if needed */
    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }

    ::-webkit-scrollbar-track {
      background: transparent;
    }

    ::-webkit-scrollbar-thumb {
      background: #e3dccf;
      border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #d1c7b8;
    }
  </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-text-main dark:text-gray-100 min-h-screen flex flex-col overflow-x-hidden">
  <!-- Top Navigation -->
  <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-parchment-border dark:border-gray-800 bg-white dark:bg-[#2a1a1a] px-6 py-4 sticky top-0 z-50">
    <div class="flex items-center gap-4">
      <div class="text-primary size-8 flex items-center justify-center">
        <span class="material-symbols-outlined !text-[32px]">sailing</span>
      </div>
      <h1 class="text-text-main dark:text-white text-xl font-bold leading-tight tracking-[-0.015em]">Grand Line Questions</h1>
    </div>
    <div class="flex flex-1 justify-end gap-6 items-center">
      <div class="hidden md:flex gap-3">
        <button class="flex items-center justify-center rounded-lg size-10 bg-parchment dark:bg-gray-800 text-text-main dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
          <span class="material-symbols-outlined">settings</span>
        </button>
        <button class="relative flex items-center justify-center rounded-lg size-10 bg-parchment dark:bg-gray-800 text-text-main dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
          <span class="material-symbols-outlined">notifications</span>
          <span class="absolute top-2 right-2 size-2 bg-primary rounded-full"></span>
        </button>
      </div>
      <div class="flex items-center gap-3 pl-4 border-l border-parchment-border dark:border-gray-700">
        <div class="flex flex-col items-end text-sm hidden sm:flex">
          <span class="font-bold text-text-main dark:text-white">Admin Smoker</span>
          <span class="text-text-secondary text-xs dark:text-gray-400">Marine HQ</span>
        </div>
        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 border-2 border-primary/20" data-alt="Avatar of a stern looking marine captain with white hair" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA8BuX_yfX-lpBykNygwWqc3I3_CqnS1eLYJiwRoc1LHho9CmMHYNufu7UTbEX5Yyx6jIyMpcRn6nOmYSrIgGaA_Z4LxgeQz-pjER-GAeHFMpedtkWluEwGESxHwtgKBThYv3aC8ozT6qEPy7z-wzFbPq0GrX1RGPIJkFzehJ5A35gCtpHvfXPOFQJJZeEIfbdcubQ_mPAHcnDe-8j05VNVMN7q2nEdwZT_7tRdP1nIrqqoVtQT-s-nxWoA5vdwiLtmxa3mWg7Rrbwz");'></div>
      </div>
    </div>
  </header>
  <main class="flex-1 flex justify-center py-8 px-4 sm:px-8">
    <div class="w-full max-w-[1200px] flex flex-col gap-8">
      <!-- Page Heading -->
      <div class="flex flex-wrap justify-between items-end gap-4 pb-2 border-b border-parchment-border dark:border-gray-800">
        <div class="flex flex-col gap-1">
          <h2 class="text-text-main dark:text-white text-4xl font-black leading-tight tracking-tight">Captain's Log</h2>
          <p class="text-text-secondary dark:text-gray-400 text-base font-medium">Dashboard Overview &amp; Moderation</p>
        </div>
        <div class="flex items-center gap-2 text-sm text-text-secondary dark:text-gray-400 bg-white dark:bg-[#2a1a1a] px-3 py-1.5 rounded-lg border border-parchment-border dark:border-gray-700 shadow-sm">
          <span class="material-symbols-outlined text-base">explore</span>
        </div>
      </div>
      <!-- Table Section -->
      <div class="flex flex-col gap-4">
        <div class="flex items-center justify-between px-1">
          <h3 class="text-text-main dark:text-white text-xl font-bold flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">sensors</span>
            Recent Transmissions
          </h3>
          <div class="flex gap-2">
            <button class="px-4 py-2 bg-white dark:bg-[#2a1a1a] border border-parchment-border dark:border-gray-700 rounded-lg text-sm font-semibold text-text-main dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors flex items-center gap-2">
              <span class="material-symbols-outlined text-lg">filter_list</span> Filter
            </button>
            <button class="px-4 py-2 bg-primary text-white border border-primary rounded-lg text-sm font-semibold hover:bg-primary-dark transition-colors flex items-center gap-2 shadow-sm shadow-primary/30">
              <span class="material-symbols-outlined text-lg">add</span> New
            </button>
          </div>
        </div>
        <div class="w-full overflow-hidden rounded-xl border border-parchment-border dark:border-gray-700 bg-white dark:bg-[#2a1a1a] shadow-sm">
          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
              <thead>
                <tr class="bg-parchment dark:bg-gray-800/50 border-b border-parchment-border dark:border-gray-700">
                  <th class="p-4 text-xs uppercase tracking-wider font-bold text-text-secondary dark:text-gray-400 w-[20%]">User</th>
                  <th class="p-4 text-xs uppercase tracking-wider font-bold text-text-secondary dark:text-gray-400 w-[45%]">Question</th>
                  <th class="p-4 text-xs uppercase tracking-wider font-bold text-text-secondary dark:text-gray-400 w-[15%]">Date</th>
                  <th class="p-4 text-xs uppercase tracking-wider font-bold text-text-secondary dark:text-gray-400 w-[10%]">Status</th>
                  <th class="p-4 text-xs uppercase tracking-wider font-bold text-text-secondary dark:text-gray-400 w-[10%] text-right">Actions</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-parchment-border dark:divide-gray-700">
                @foreach ($questions as $question)
                <tr class="group hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                  <td class="p-4">
                    <div class="flex items-center gap-3">
                      <div class="size-9 rounded-full bg-cover bg-center border border-gray-200 dark:border-gray-600" data-alt="Avatar of Luffy smiling" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCv9YqpIxsheIaKvMpyFFdBkRE6GX1LUL6EohfG6Jmqung_Z5lE3e6CarEepOedu5oa1Dpxls6M6QKL8vqlVZ1mbkEtD2qX7eYISGOUoJwKjYxViyNC5h3Re9gqam4Q0HCisnq_8odprG7Fv4WZkCyWErKVifclHjAJoZ27kxqo_Lh0CIqLNZILpE6FtgkE9JFrJ5U-NU96ZRylCipwUhM8u1xcH8bbSo2Jgx01kiDo-a3Zv35TcOgzeJZlSOOBIhQZsKZJLs0kRzaU");'></div>
                      <div class="flex flex-col">
                        <span class="font-bold text-text-main dark:text-white text-sm">{{ $question->user->name }}</span>
                        <span class="text-xs text-text-secondary dark:text-gray-500">ID: #8921</span>
                      </div>
                    </div>
                  </td>
                  <td class="p-4">
                    <div class="flex flex-col gap-1">
                      <span class="text-sm font-medium text-text-main dark:text-gray-200">{{ $question->title}}</span>
                    </div>
                  </td>
                  <td class="p-4 text-sm text-text-secondary dark:text-gray-400 whitespace-nowrap">
                    {{ $question->created_at}}
                  </td>
                  <td class="p-4">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 border border-green-200 dark:border-green-800">
                      <span class="size-1.5 rounded-full bg-green-600 dark:bg-green-400"></span>
                      Active
                    </span>
                  </td>
                  <td class="p-4 text-right">
                    <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                      <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                          class="p-2 text-text-secondary hover:text-primary hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors"
                          title="Delete">
                          <span class="material-symbols-outlined text-xl">delete</span>
                        </button>
                      </form>

                    </div>
                  </td>
                </tr>
                @endforeach
                <div class="border-t border-parchment-border dark:border-gray-700 bg-parchment dark:bg-gray-800/30 p-4 flex items-center justify-between">{{ $questions->links() }}</div>
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>