<template>
  <div class="flex min-h-screen flex-col lg:flex-row bg-background">
    <!-- Sidebar (desktop) -->
    <aside class="hidden lg:flex lg:w-72 lg:shrink-0 lg:flex-col lg:border-r lg:border-primary/10 lg:sticky lg:top-0 lg:h-screen lg:p-6 lg:gap-6">
      <!-- Logo -->
      <div class="flex items-center gap-3">
        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center shrink-0 shadow-neuro">
          <span class="material-symbols-outlined text-white text-[28px]">spark</span>
        </div>
        <div>
          <span class="text-xl font-black text-white tracking-tight">AskNow</span>
          <p class="text-xs text-slate-400 font-medium">Community Q&A</p>
        </div>
      </div>

      <!-- Navigation -->
      <nav class="flex flex-col gap-2 flex-1">
        <RouterLink to="/" class="sidebar-link" :class="{ active: $route.path === '/' }">
          <span class="material-symbols-outlined text-[20px]">forum</span>
          <span>Questions</span>
        </RouterLink>
        <RouterLink v-if="auth.isLoggedIn" to="/favorites" class="sidebar-link" :class="{ active: $route.path === '/favorites' }">
          <span class="material-symbols-outlined text-[20px]">favorite</span>
          <span>My Favorites</span>
        </RouterLink>
        <RouterLink to="/questions/create" class="sidebar-link" :class="{ active: $route.path === '/questions/create' }">
          <span class="material-symbols-outlined text-[20px]">add_circle</span>
          <span>Ask Question</span>
        </RouterLink>
      </nav>

      <!-- Tags Section -->
      <div class="pt-6 border-t border-primary/10">
        <p class="text-[10px] font-bold uppercase tracking-[2px] text-slate-400 px-3 mb-3">Popular Tags</p>
        <div class="flex flex-wrap gap-2 px-2">
          <span v-for="tag in ['PHP','Laravel','Vue','SQL','Docker','React']" :key="tag"
            class="px-3 py-2 rounded-lg text-xs font-medium bg-dark-card border border-primary/10 text-slate-300 hover:text-primary hover:border-primary/30 cursor-pointer transition-colors">
            #{{ tag }}
          </span>
        </div>
      </div>

      <!-- User Profile or Auth Links -->
      <div class="flex flex-col gap-2 pt-6 border-t border-primary/10">
        <template v-if="auth.isLoggedIn">
          <div class="flex items-center gap-3 px-4 py-3 neuro-card rounded-lg">
            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white font-bold text-base shrink-0">
              {{ auth.user?.name?.charAt(0).toUpperCase() }}
            </div>
            <div class="min-w-0">
              <p class="text-sm font-semibold text-white truncate">{{ auth.user?.name }}</p>
              <p class="text-xs text-slate-400 truncate">{{ auth.user?.role }}</p>
            </div>
          </div>
          <button @click="handleLogout" class="sidebar-link text-red-400 hover:bg-red-500/10 hover:text-red-300 w-full text-left">
            <span class="material-symbols-outlined text-[20px]">logout</span>
            <span>Logout</span>
          </button>
        </template>
        <template v-else>
          <RouterLink to="/login" class="sidebar-link">
            <span class="material-symbols-outlined text-[20px]">login</span>
            <span>Sign In</span>
          </RouterLink>
          <RouterLink to="/register" class="sidebar-link">
            <span class="material-symbols-outlined text-[20px]">person_add</span>
            <span>Register</span>
          </RouterLink>
        </template>
      </div>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col min-w-0">
      <!-- Top header -->
      <header class="sticky top-0 z-40 flex items-center gap-4 px-4 py-4 sm:px-6 border-b border-primary/10 bg-background/80 backdrop-blur-xl shadow-neuro">
        <RouterLink to="/" class="flex items-center gap-2 shrink-0 lg:hidden">
          <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center shadow-neuro">
            <span class="material-symbols-outlined text-white text-[22px]">spark</span>
          </div>
          <span class="text-lg font-bold text-white">AskNow</span>
        </RouterLink>
        
        <!-- Search Bar -->
        <div class="relative flex-1 min-w-0 max-w-md">
          <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-500 text-[20px] pointer-events-none">search</span>
          <input type="text" v-model="search" placeholder="Search questions..."
            class="input-field input-field-icon w-full" />
        </div>

        <!-- Action Button -->
        <RouterLink v-if="auth.isLoggedIn" to="/questions/create"
          class="neuro-btn-sm shrink-0 flex items-center justify-center gap-2 min-h-[44px]">
          <span class="material-symbols-outlined text-[18px] hidden sm:inline">add</span>
          <span>Ask</span>
        </RouterLink>
        <RouterLink v-else to="/login"
          class="neuro-btn-sm shrink-0 flex items-center justify-center gap-2 min-h-[44px]">
          <span class="material-symbols-outlined text-[18px] hidden sm:inline">login</span>
          <span>Sign In</span>
        </RouterLink>
      </header>

      <!-- Page content -->
      <main class="flex-1 p-4 sm:p-6 md:p-8 max-w-6xl w-full mx-auto pb-20 lg:pb-8">
        <RouterView />
      </main>
    </div>

    <!-- Bottom nav (mobile) -->
    <nav class="fixed bottom-0 left-0 right-0 z-50 flex items-center justify-around py-2 px-2 bg-background/95 backdrop-blur-xl border-t border-primary/10 safe-area-pb lg:hidden">
      <RouterLink to="/" class="flex flex-col items-center gap-1 px-4 py-2 rounded-xl transition-all min-w-[64px]"
        :class="$route.path === '/' ? 'text-primary bg-primary/15' : 'text-slate-500 hover:text-white'">
        <span class="material-symbols-outlined text-[24px]">forum</span>
        <span class="text-[10px] font-medium">Questions</span>
      </RouterLink>
      <RouterLink to="/questions/create" class="flex flex-col items-center gap-1 px-4 py-2 rounded-xl transition-all min-w-[64px]"
        :class="$route.path === '/questions/create' ? 'text-primary bg-primary/15' : 'text-slate-500 hover:text-white'">
        <span class="material-symbols-outlined text-[24px]">add_circle</span>
        <span class="text-[10px] font-medium">Ask</span>
      </RouterLink>
      <RouterLink v-if="auth.isLoggedIn" to="/favorites" class="flex flex-col items-center gap-1 px-4 py-2 rounded-xl transition-all min-w-[64px]"
        :class="$route.path === '/favorites' ? 'text-primary bg-primary/15' : 'text-slate-500 hover:text-white'">
        <span class="material-symbols-outlined text-[24px]">favorite</span>
        <span class="text-[10px] font-medium">Saved</span>
      </RouterLink>
      <template v-if="auth.isLoggedIn">
        <button type="button" @click="handleLogout" class="flex flex-col items-center gap-1 px-4 py-2 rounded-xl text-slate-500 hover:text-red-400 transition-all min-w-[64px]">
          <span class="material-symbols-outlined text-[24px]">logout</span>
          <span class="text-[10px] font-medium">Exit</span>
        </button>
      </template>
      <template v-else>
        <RouterLink to="/login" class="flex flex-col items-center gap-1 px-4 py-2 rounded-xl transition-all min-w-[64px]"
          :class="$route.path === '/login' ? 'text-primary bg-primary/15' : 'text-slate-500 hover:text-white'">
          <span class="material-symbols-outlined text-[24px]">login</span>
          <span class="text-[10px] font-medium">Sign In</span>
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
