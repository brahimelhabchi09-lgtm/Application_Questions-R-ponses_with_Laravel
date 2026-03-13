<template>
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 shrink-0 border-r border-white/5 p-5 flex-col gap-6 hidden lg:flex sticky top-0 h-screen">
      <!-- Logo -->
      <div class="flex items-center gap-3 px-2 py-1">
        <div class="w-9 h-9 rounded-xl bg-indigo-500 flex items-center justify-center" style="box-shadow:0 0 16px rgba(99,102,241,0.5)">
          <span class="material-symbols-outlined text-white text-[20px]">hub</span>
        </div>
        <span class="text-xl font-black text-white tracking-tight">AskNow</span>
      </div>

      <!-- Nav -->
      <nav class="flex flex-col gap-1 mt-2">
        <RouterLink to="/" class="sidebar-link" :class="{ active: $route.path === '/' }">
          <span class="material-symbols-outlined text-[20px]">forum</span> Questions
        </RouterLink>
        <RouterLink to="/questions/create" class="sidebar-link" :class="{ active: $route.path === '/questions/create' }">
          <span class="material-symbols-outlined text-[20px]">add_circle</span> Nouvelle Question
        </RouterLink>
      </nav>

      <!-- Tags -->
      <div>
        <p class="text-[10px] font-bold uppercase tracking-widest text-slate-600 px-2 mb-3">Top Tags</p>
        <div class="flex flex-wrap gap-2 px-2">
          <span v-for="tag in ['PHP','Laravel','Vue','SQL','Docker']" :key="tag"
            class="px-3 py-1 rounded-full text-xs border border-white/5 bg-white/5 text-slate-400 hover:bg-white/10 cursor-pointer transition-colors">
            #{{ tag }}
          </span>
        </div>
      </div>

      <!-- User & logout -->
      <div class="mt-auto flex flex-col gap-1">
        <template v-if="auth.isLoggedIn">
          <div class="flex items-center gap-3 px-3 py-3 glass rounded-xl mb-2">
            <div class="w-8 h-8 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-sm shrink-0">
              {{ auth.user?.name?.charAt(0).toUpperCase() }}
            </div>
            <div class="overflow-hidden">
              <p class="text-sm font-semibold text-white truncate">{{ auth.user?.name }}</p>
              <p class="text-xs text-slate-500 truncate">{{ auth.user?.role }}</p>
            </div>
          </div>
          <button @click="handleLogout" class="sidebar-link text-red-400 hover:bg-red-500/10 hover:text-red-300 w-full">
            <span class="material-symbols-outlined text-[20px]">logout</span> Déconnexion
          </button>
        </template>
        <template v-else>
          <RouterLink to="/login" class="sidebar-link">
            <span class="material-symbols-outlined text-[20px]">login</span> Connexion
          </RouterLink>
          <RouterLink to="/register" class="sidebar-link">
            <span class="material-symbols-outlined text-[20px]">person_add</span> Inscription
          </RouterLink>
        </template>
      </div>
    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col">
      <!-- Header -->
      <header class="sticky top-0 z-30 flex items-center justify-between px-6 py-4 border-b border-white/5"
        style="background:rgba(2,6,23,0.85);backdrop-filter:blur(16px)">
        <div class="relative group flex-1 max-w-md">
          <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-500 text-[20px]">search</span>
          <input type="text" v-model="search" placeholder="Rechercher une question..."
            class="w-full bg-white/5 border border-white/5 rounded-xl pl-10 pr-4 py-2.5 text-sm text-slate-300 placeholder:text-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 transition-all" />
        </div>
        <RouterLink v-if="auth.isLoggedIn" to="/questions/create"
          class="neon-btn ml-4 flex items-center gap-2 px-5 py-2.5 text-sm">
          <span class="material-symbols-outlined text-[18px]">add</span> Poser
        </RouterLink>
        <RouterLink v-else to="/login"
          class="neon-btn ml-4 flex items-center gap-2 px-5 py-2.5 text-sm">
          <span class="material-symbols-outlined text-[18px]">login</span> Connexion
        </RouterLink>
      </header>

      <!-- Router view -->
      <main class="flex-1 p-6 md:p-8 max-w-6xl mx-auto w-full">
        <RouterView />
      </main>
    </div>
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
