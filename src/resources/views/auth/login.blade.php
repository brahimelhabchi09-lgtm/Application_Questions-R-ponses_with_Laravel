<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login - Grand Line Questions</title>
    <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500;600;700&amp;family=Noto+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />
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
                        "background-light": "#fdfbf7",
                        /* Parchment-like off-white */
                        "background-dark": "#211111",
                        "ocean-blue": "#005C97",
                        "gold-accent": "#D4AF37",
                    },
                    fontFamily: {
                        "display": ["Spline Sans", "Noto Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1rem",
                        "full": "9999px"
                    },
                    backgroundImage: {
                        'parchment': "url('https://www.transparenttextures.com/patterns/cream-paper.png')",
                    }
                },
            },
        }
    </script>
    <style>
        /* Custom parchment texture blend */
        .bg-parchment-texture {
            background-color: #fdfbf7;
            background-image: url(https://lh3.googleusercontent.com/aida-public/AB6AXuB3gS5UNejUA6HzTX-BOxZMOaAfPT2N8ZokoL1fWkXGpo2cxEgADe2adwrO4DQeXd0uliJf_JTDOlqEpVtsa6ZWKPHRN9Lj-_2v3iDBoN9f8HEcHeUV5eJWSNnuxzQkSq_yHiiG7qvRrk7zw9WOymhGnUoI-SjgxVVfze6iBeMHAlFBKEUV_ceH5EGKYZuIPC9pQ0pM2_BNsFQLcglU8Uhvasn1TxHFwLF99zqEa6SHOk2FVsMxRXktgX9RUV8v2_h86Qgjf3pZeuAs)
        }
    </style>
</head>

<body class="font-display bg-parchment-texture dark:bg-background-dark text-[#171111] dark:text-white min-h-screen flex flex-col overflow-x-hidden">
    <!-- Top Navigation -->
    <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-gold-accent/20 px-10 py-4 bg-white/80 dark:bg-background-dark/80 backdrop-blur-sm sticky top-0 z-50">
        <div class="flex items-center gap-4">
            <div class="size-8 text-primary">
                <span class="material-symbols-outlined text-[32px]">sailing</span>
            </div>
            <h2 class="text-[#171111] dark:text-white text-xl font-bold leading-tight tracking-[-0.015em]">Grand Line Questions</h2>
        </div>
        <div class="flex flex-1 justify-end gap-8">
            <div class="hidden md:flex items-center gap-9 text-sm font-medium text-ocean-blue dark:text-blue-300">
                <a class="hover:underline" href="#">The Map</a>
                <a class="hover:underline" href="#">Crew</a>
                <a class="hover:underline" href="#">Bounties</a>
                <a href="{{route('register')}}" class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-6 bg-primary/10 text-primary hover:bg-primary hover:text-white transition-colors text-sm font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">Join the Crew</span>
                </a>
            </div>
        </div>
    </header>
    <!-- Main Content Area -->
    <main class="flex-grow flex items-center justify-center p-4 md:p-10 relative">
        <!-- Background Decor (Compass) -->
        <div class="absolute right-0 bottom-0 opacity-[0.03] pointer-events-none select-none overflow-hidden h-full w-full flex justify-end items-end">
            <span class="material-symbols-outlined text-[400px] md:text-[600px] text-ocean-blue -mr-20 -mb-20">explore</span>
        </div>
        <div class="layout-content-container flex flex-col w-full max-w-[1000px] relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center bg-white dark:bg-[#2a1a1a] rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border-2 border-gold-accent/30 overflow-hidden min-h-[600px]">
                <!-- Left: Image / Branding -->
                <div class="hidden md:flex flex-col h-full relative bg-cover bg-center min-h-[600px]" data-alt="Illustration of a pirate ship sailing towards a sunny horizon on a calm ocean" style='background-image: linear-gradient(180deg, rgba(229, 55, 52, 0.1) 0%, rgba(33, 17, 17, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuCiDDvD5UyFpo5Yr1ll-p-oOyy_d83cWiUim9y5qKAgY0yhmSCfxoLrVOm90ID-XnwLwv8h0DVRu2GFyKVZuKADfc6M7jgwGoSgHaFJp97yWAILw0A6H1fSCE-KqYCDSc5tjLFCr3Cg6BauS42DEuZHLUdHWguESWDLsC7YfuOE4eAunX4KhNovxlqjzC0yjahpas89EZUaB5gQD9DymiORDxxjEQS7UdC93WMyoe7gyDJI1Hgz7l2e3rG87LEMmVvXBUSRxxLvS-tY");'>
                    <div class="mt-auto p-10 text-white">
                        <div class="mb-4 text-gold-accent">
                            <span class="material-symbols-outlined text-4xl">anchor</span>
                        </div>
                        <h2 class="text-3xl font-bold mb-2">Adventure Awaits</h2>
                        <p class="text-gray-200 font-medium leading-relaxed">Join thousands of pirates on the Grand Line. Share knowledge, find treasures, and build your reputation.</p>
                    </div>
                </div>
                <!-- Right: Login Form -->
                <div class="flex flex-col justify-center p-8 md:p-12 h-full w-full max-w-md mx-auto">
                    <div class="flex flex-col gap-1 mb-8">
                        <div class="flex justify-between items-start">
                            <h1 class="text-[#171111] dark:text-white tracking-tight text-3xl font-bold">Welcome Aboard</h1>
                            <span class="material-symbols-outlined text-gold-accent text-3xl animate-pulse">explore</span>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 text-base font-medium">Enter your credentials to access the Grand Line.</p>
                    </div>
                    <form action="submit-login" method="POST" class="flex flex-col gap-6">
                        @csrf
                        <!-- Email Input -->
                        <label class="flex flex-col w-full">
                            <p class="text-[#171111] dark:text-gray-200 text-sm font-bold leading-normal pb-2">Pirate Alias (Email)</p>
                            <div class="flex w-full items-stretch rounded-lg shadow-sm group focus-within:ring-2 focus-within:ring-ocean-blue transition-all">
                                <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-l-lg text-[#171111] dark:text-white dark:bg-[#3d2929] focus:outline-0 border border-gray-200 dark:border-[#4a3636] h-12 placeholder:text-gray-400 p-4 border-r-0 text-base font-normal leading-normal" placeholder="luffy@strawhats.com" type="email" name="email" />
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                                <div class="text-gray-400 dark:text-gray-500 flex border border-l-0 border-gray-200 dark:border-[#4a3636] bg-white dark:bg-[#3d2929] items-center justify-center px-4 rounded-r-lg">
                                    <span class="material-symbols-outlined">mail</span>
                                </div>
                            </div>
                        </label>
                        <!-- Password Input -->
                        <label class="flex flex-col w-full">
                            <div class="flex justify-between items-center pb-2">
                                <p class="text-[#171111] dark:text-gray-200 text-sm font-bold leading-normal">Secret Code</p>
                                <a class="text-ocean-blue dark:text-blue-400 text-xs font-bold hover:underline" href="#">Lost your map?</a>
                            </div>
                            <div class="flex w-full items-stretch rounded-lg shadow-sm group focus-within:ring-2 focus-within:ring-ocean-blue transition-all">
                                <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-l-lg text-[#171111] dark:text-white dark:bg-[#3d2929] focus:outline-0 border border-gray-200 dark:border-[#4a3636] h-12 placeholder:text-gray-400 p-4 border-r-0 text-base font-normal leading-normal" placeholder="••••••••" type="password" name="password" />
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                                <div class="text-gray-400 dark:text-gray-500 flex border border-l-0 border-gray-200 dark:border-[#4a3636] bg-white dark:bg-[#3d2929] items-center justify-center px-4 rounded-r-lg cursor-pointer hover:text-ocean-blue transition-colors">
                                    <span class="material-symbols-outlined">visibility_off</span>
                                </div>
                            </div>
                        </label>
                        <!-- Action Button -->
                        <button type="submit" class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-5 bg-primary hover:bg-red-700 transition-colors shadow-md shadow-red-200 dark:shadow-none text-white text-base font-bold leading-normal tracking-[0.015em] mt-2 group">
                            <span class="truncate mr-2">Set Sail</span>
                            <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </button>
                    </form>
                    <div class="mt-8 flex items-center justify-center gap-2">
                        <span class="text-gray-500 dark:text-gray-400 text-sm">New to the crew?</span>
                        <a class="text-ocean-blue dark:text-blue-400 text-sm font-bold hover:underline" href="#">Recruit new crew</a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-6 text-xs text-gray-400">
                <p>© 2026 Grand Line Questions. All treasures reserved.</p>
            </div>
        </div>
    </main>
</body>

</html>