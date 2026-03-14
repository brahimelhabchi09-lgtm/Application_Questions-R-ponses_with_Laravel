<template>
  <div class="flex min-h-screen flex-col lg:flex-row">
    <!-- Sidebar (desktop) -->
    <aside class="hidden lg:flex lg:w-64 lg:shrink-0 lg:flex-col lg:border-r lg:border-white/5 lg:sticky lg:top-0 lg:h-screen lg:p-5">
      <div class="flex flex-col gap-6 flex-1">
        <div class="flex items-center gap-3 px-2 py-1">
          <div class="w-10 h-10 rounded-xl bg-indigo-500 flex items-center justify-center shrink-0 shadow-lg shadow-indigo-500/30">
            <span class="material-symbols-outlined text-white text-[22px]">hub</span>
          </div>
          <span class="text-xl font-black text-white tracking-tight">AskNow</span>
        </div>

        <nav class="flex flex-col gap-1">
          <RouterLink to="/" class="sidebar-link" :class="{ active: $route.path === '/' }">
            <span class="material-symbols-outlined text-[20px]">forum</span>
            <span>Questions</span>
          </RouterLink>
          <RouterLink v-if="auth.isLoggedIn" to="/favorites" class="sidebar-link" :class="{ active: $route.path === '/favorites' }">
            <span class="material-symbols-outlined text-[20px]">favorite</span>
            <span>Favoris</span>
          </RouterLink>
          <RouterLink to="/questions/create" class="sidebar-link" :class="{ active: $route.path === '/questions/create' }">
            <span class="material-symbols-outlined text-[20px]">add_circle</span>
            <span>Nouvelle Question</span>
          </RouterLink>
        </nav>

        <div class="flex-1" />

        <div>
          <p class="text-[10px] font-bold uppercase tracking-widest text-slate-500 px-2 mb-2">Tags</p>
          <div class="flex flex-wrap gap-2 px-2">
            <span v-for="tag in ['PHP','Laravel','Vue','SQL','Docker']" :key="tag"
              class="px-3 py-1.5 rounded-full text-xs border border-white/10 bg-white/5 text-slate-400 hover:bg-white/10 cursor-pointer transition-colors">
              #{{ tag }}
            </span>
          </div>
        </div>

        <div class="flex flex-col gap-1">
          <template v-if="auth.isLoggedIn">
            <div class="flex items-center gap-3 px-3 py-3 glass rounded-xl">
              <div class="w-9 h-9 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-sm shrink-0">
                {{ auth.user?.name?.charAt(0).toUpperCase() }}
              </div>
              <div class="min-w-0">
                <p class="text-sm font-semibold text-white truncate">{{ auth.user?.name }}</p>
                <p class="text-xs text-slate-500 truncate">{{ auth.user?.role }}</p>
              </div>
            </div>
            <button @click="handleLogout" class="sidebar-link text-red-400 hover:bg-red-500/10 hover:text-red-300 w-full text-left">
              <span class="material-symbols-outlined text-[20px]">logout</span>
              <span>Déconnexion</span>
            </button>
          </template>
          <template v-else>
            <RouterLink to="/login" class="sidebar-link">
              <span class="material-symbols-outlined text-[20px]">login</span>
              <span>Connexion</span>
            </RouterLink>
            <RouterLink to="/register" class="sidebar-link">
              <span class="material-symbols-outlined text-[20px]">person_add</span>
              <span>Inscription</span>
            </RouterLink>
          </template>
        </div>
      </div>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col min-w-0">
      <!-- Top header -->
      <header class="sticky top-0 z-40 flex items-center gap-3 px-4 py-3 sm:px-6 sm:py-4 border-b border-white/5 bg-slate-900/90 backdrop-blur-xl">
        <RouterLink to="/" class="flex items-center gap-2 shrink-0 lg:hidden">
          <div class="w-9 h-9 rounded-xl bg-indigo-500 flex items-center justify-center">
            <span class="material-symbols-outlined text-white text-[20px]">hub</span>
          </div>
          <span class="text-lg font-bold text-white">AskNow</span>
        </RouterLink>
        <div class="relative flex-1 min-w-0 max-w-md">
          <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-500 text-[20px] pointer-events-none">search</span>
          <input type="text" v-model="search" placeholder="Rechercher..."
            class="w-full bg-white/5 border border-white/5 rounded-xl pl-10 pr-4 py-2.5 sm:py-3 text-sm sm:text-base text-slate-300 placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 transition-all" />
        </div>
        <RouterLink v-if="auth.isLoggedIn" to="/questions/create"
          class="neon-btn shrink-0 flex items-center justify-center gap-2 px-4 py-2.5 sm:px-5 sm:py-3 text-sm min-h-[44px]">
          <span class="material-symbols-outlined text-[18px] hidden sm:inline">add</span>
          <span>Poser</span>
        </RouterLink>
        <RouterLink v-else to="/login"
          class="neon-btn shrink-0 flex items-center justify-center gap-2 px-4 py-2.5 sm:px-5 sm:py-3 text-sm min-h-[44px]">
          <span class="material-symbols-outlined text-[18px] hidden sm:inline">login</span>
          <span>Connexion</span>
        </RouterLink>
      </header>

      <!-- Page content -->
      <main class="flex-1 p-4 sm:p-6 md:p-8 max-w-5xl w-full mx-auto pb-20 lg:pb-8">
        <RouterView />
      </main>
    </div>

    <!-- Bottom nav (mobile) -->
    <nav class="fixed bottom-0 left-0 right-0 z-50 flex items-center justify-around py-2 px-2 bg-slate-900/95 backdrop-blur-xl border-t border-white/5 safe-area-pb lg:hidden">
      <RouterLink to="/" class="flex flex-col items-center gap-1 px-4 py-2 rounded-xl transition-colors min-w-[64px]"
        :class="$route.path === '/' ? 'text-indigo-400 bg-indigo-500/15' : 'text-slate-500 hover:text-white'">
        <span class="material-symbols-outlined text-[24px]">{{ $route.path === '/' ? 'forum' : 'forum' }}</span>
        <span class="text-[10px] font-medium">Questions</span>
      </RouterLink>
      <RouterLink to="/questions/create" class="flex flex-col items-center gap-1 px-4 py-2 rounded-xl transition-colors min-w-[64px]"
        :class="$route.path === '/questions/create' ? 'text-indigo-400 bg-indigo-500/15' : 'text-slate-500 hover:text-white'">
        <span class="material-symbols-outlined text-[24px]">add_circle</span>
        <span class="text-[10px] font-medium">Poser</span>
      </RouterLink>
      <RouterLink v-if="auth.isLoggedIn" to="/favorites" class="flex flex-col items-center gap-1 px-4 py-2 rounded-xl transition-colors min-w-[64px]"
        :class="$route.path === '/favorites' ? 'text-indigo-400 bg-indigo-500/15' : 'text-slate-500 hover:text-white'">
        <span class="material-symbols-outlined text-[24px]">favorite</span>
        <span class="text-[10px] font-medium">Favoris</span>
      </RouterLink>
      <template v-if="auth.isLoggedIn">
        <button type="button" @click="handleLogout" class="flex flex-col items-center gap-1 px-4 py-2 rounded-xl text-slate-500 hover:text-red-400 transition-colors min-w-[64px]">
          <span class="material-symbols-outlined text-[24px]">logout</span>
          <span class="text-[10px] font-medium">Quitter</span>
        </button>
      </template>
      <template v-else>
        <RouterLink to="/login" class="flex flex-col items-center gap-1 px-4 py-2 rounded-xl transition-colors min-w-[64px]"
          :class="$route.path === '/login' ? 'text-indigo-400 bg-indigo-500/15' : 'text-slate-500 hover:text-white'">
          <span class="material-symbols-outlined text-[24px]">login</span>
          <span class="text-[10px] font-medium">Connexion</span>
        </RouterLink>
      </template>
    </nav>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'

const auth   = useAuthStore()
const router = useRouter()
const search = ref('')

async function handleLogout() {
  await auth.logout()
  router.push('/login')
}
</script>

<style scoped>
.safe-area-pb {
  padding-bottom: max(0.5rem, env(safe-area-inset-bottom));
}
</style>
