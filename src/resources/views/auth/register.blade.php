<!DOCTYPE html>
<html class="light" lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Register - Grand Line Questions</title>
  <link href="https://fonts.googleapis.com/css2?family=Pirata+One&amp;family=Spline+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#dc2626", // Vibrant red
            "parchment": "#fdf6e3", // Parchment beige base
            "parchment-dark": "#f0e6c8",
            "ink": "#2c1810", // Dark ink color for text
            "gold-border": "#d4af37",
            "gold-glow": "#fbbf24",
          },
          fontFamily: {
            "display": ["Spline Sans", "sans-serif"],
            "pirate": ["Pirata One", "cursive"],
          },
          backgroundImage: {
            'map-pattern': "url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d97706' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\")",
            'parchment-texture': "url(\"data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' opacity='0.05'/%3E%3C/svg%3E\")",
          }
        },
      },
    }
  </script>
  <style type="text/tailwindcss">
    .scroll-shadow {
        box-shadow: 
            0 20px 25px -5px rgba(0, 0, 0, 0.15), 
            0 8px 10px -6px rgba(0, 0, 0, 0.1),
            inset 0 0 60px rgba(139, 94, 60, 0.15);
    }
    .input-pirate {
        @apply bg-white/50 border border-gold-border focus:border-yellow-600 focus:ring-2 focus:ring-yellow-600/20 text-ink placeholder:text-ink/40 transition-all duration-300 rounded outline-none;
    }
</style>
</head>

<body class="bg-parchment-dark dark:bg-[#1a1010] font-display text-ink dark:text-gray-200 antialiased overflow-x-hidden bg-map-pattern min-h-screen flex flex-col">
  <header class="sticky top-0 z-50 flex items-center justify-between border-b border-[#d4af37]/40 bg-parchment/90 backdrop-blur-md px-6 sm:px-12 py-3 shadow-sm">
    <div class="flex items-center gap-3">
      <div class="flex items-center justify-center text-ink rotate-[-5deg]">
        <span class="material-symbols-outlined text-4xl" style="font-variation-settings: 'FILL' 1, 'wght' 600;">skull</span>
      </div>
      <h2 class="text-ink text-2xl font-pirate tracking-wide pt-1">Grand Line Questions</h2>
    </div>
    <div class="hidden md:flex items-center gap-8">
      <nav class="flex gap-6">
        <a class="text-ink/80 font-bold hover:text-primary transition-colors text-xs uppercase tracking-widest" href="#">The Map</a>
        <a class="text-ink/80 font-bold hover:text-primary transition-colors text-xs uppercase tracking-widest" href="#">Wanted Posters</a>
        <a class="text-ink/80 font-bold hover:text-primary transition-colors text-xs uppercase tracking-widest" href="#">Log In</a>
      </nav>
      <button class="px-6 py-2 bg-primary text-white font-pirate text-lg rounded shadow hover:bg-red-700 transition-all border border-red-800 tracking-wider">
        Join Crew
      </button>
    </div>
    <div class="md:hidden">
      <span class="material-symbols-outlined text-ink text-3xl">menu</span>
    </div>
  </header>
  <main class="flex-grow flex items-center justify-center py-12 px-4 relative">
    <div class="relative w-full max-w-[640px] flex flex-col perspective-1000">
      <div class="h-12 w-[106%] -ml-[3%] bg-gradient-to-b from-[#b68d65] via-[#e6cca0] to-[#8b5e3c] rounded-full shadow-lg relative z-20 flex items-center justify-center border border-[#5d3a24]">
        <div class="absolute left-1 top-1/2 -translate-y-1/2 w-3 h-8 bg-[#4a2c1d] rounded-full"></div>
        <div class="absolute right-1 top-1/2 -translate-y-1/2 w-3 h-8 bg-[#4a2c1d] rounded-full"></div>
      </div>
      <div class="bg-[#fffdf5] bg-parchment-texture relative z-10 mx-auto w-full px-8 py-12 sm:px-16 scroll-shadow -mt-6 pb-16">
        <div class="absolute inset-4 border border-[#d4af37]/30 pointer-events-none rounded-sm"></div>
        <div class="absolute inset-5 border border-dashed border-[#d4af37]/20 pointer-events-none rounded-sm"></div>
        <div class="relative flex flex-col gap-8 z-10">
          <div class="text-center space-y-3">
            <h1 class="font-pirate text-5xl sm:text-7xl text-ink drop-shadow-sm leading-none">Join the Crew</h1>
            <p class="text-[#8b5e3c] font-medium italic font-serif">"Set sail for adventure and knowledge!"</p>
            <div class="flex justify-center pt-2">
              <div class="h-1 w-24 bg-gradient-to-r from-transparent via-[#d4af37] to-transparent"></div>
            </div>
          </div>
          <form method="POST" action="/submit-register" class="flex flex-col gap-6 mt-2">
            @csrf
            <div class="space-y-1.5 group">
              <label class="text-ink font-bold text-xs uppercase tracking-widest flex items-center gap-2 group-focus-within:text-primary transition-colors">
                <span class="material-symbols-outlined text-base text-gold-border">swords</span>
                Captain's Name
              </label>
              <input class="input-pirate w-full h-12 px-4 font-serif text-lg" placeholder="Monkey D. Luffy" type="text" name="name" />
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div class="space-y-1.5 group">
              <label class="text-ink font-bold text-xs uppercase tracking-widest flex items-center gap-2 group-focus-within:text-primary transition-colors">
                <span class="material-symbols-outlined text-base text-gold-border">mail</span>
                Den Den Mushi (Email)
              </label>
              @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
              <input class="input-pirate w-full h-12 px-4 font-serif text-lg" placeholder="nami@strawhats.com" type="email" name="email" />
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              <div class="space-y-1.5 group">
                <label class="text-ink font-bold text-xs uppercase tracking-widest flex items-center gap-2 group-focus-within:text-primary transition-colors">
                  <span class="material-symbols-outlined text-base text-gold-border">vpn_key</span>
                  Secret Code
                </label>
                @error('password')
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <input class="input-pirate w-full h-12 px-4 font-serif text-lg" placeholder="••••••••" type="password" name="password" />
              </div>
              <div class="space-y-1.5 group">
                <label class="text-ink font-bold text-xs uppercase tracking-widest flex items-center gap-2 group-focus-within:text-primary transition-colors">
                  <span class="material-symbols-outlined text-base text-gold-border">lock_reset</span>
                  Confirm Code
                </label>
                @error('password_confirmation')
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <input class="input-pirate w-full h-12 px-4 font-serif text-lg" placeholder="••••••••" type="password" name="password_confirmation" />
              </div>
            </div>
            <div class="flex items-start gap-3 py-2 px-1">
              <input class="mt-1 h-5 w-5 rounded border-[#d4af37] text-primary focus:ring-primary/20 bg-[#fffdf5] cursor-pointer" id="pirate-code" type="checkbox" />
              <label class="text-sm text-ink/70 leading-relaxed cursor-pointer select-none" for="pirate-code">
                I agree to the <a class="text-primary font-bold hover:underline decoration-gold-border decoration-2" href="#">Pirate Code</a> and confirm I am ready for the Grand Line.
              </label>
            </div>
            <button type="submit" class="group relative w-full h-14 bg-primary text-white font-pirate text-3xl tracking-wide rounded shadow-md overflow-hidden transition-all duration-300 hover:scale-[1.01] hover:shadow-[0_0_25px_rgba(217,119,6,0.6)] active:scale-[0.99] border-b-4 border-red-900 active:border-b-0 active:translate-y-1 mt-2">
              <span class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></span>
              <span class="flex items-center justify-center gap-3 relative z-10 pt-1">
                <span class="material-symbols-outlined text-3xl">anchor</span>
                Set Sail
              </span>
            </button>
          </form>
          <div class="text-center">
            <p class="text-ink/60 text-sm font-serif">
              Already a crew member?
              <a class="text-ink font-bold hover:text-primary transition-colors border-b border-dashed border-ink/30 hover:border-primary" href="#">Board Ship (Log In)</a>
            </p>
          </div>
        </div>
      </div>
      <div class="h-12 w-[106%] -ml-[3%] bg-gradient-to-t from-[#b68d65] via-[#e6cca0] to-[#8b5e3c] rounded-full shadow-lg relative z-20 -mt-6 border border-[#5d3a24]">
        <div class="absolute left-1 top-1/2 -translate-y-1/2 w-3 h-8 bg-[#4a2c1d] rounded-full"></div>
        <div class="absolute right-1 top-1/2 -translate-y-1/2 w-3 h-8 bg-[#4a2c1d] rounded-full"></div>
      </div>
    </div>
  </main>
  <footer class="py-8 text-center text-[#8b5e3c]">
    <div class="flex justify-center gap-8 mb-4 text-xs font-bold uppercase tracking-widest">
      <a class="hover:text-primary transition-colors" href="#">Help Center</a>
      <a class="hover:text-primary transition-colors" href="#">Privacy Policy</a>
      <a class="hover:text-primary transition-colors" href="#">World Map</a>
    </div>
    <p class="text-xs opacity-60 font-serif">© Grand Line Questions. The Adventure Awaits.</p>
  </footer>

</body>

</html>