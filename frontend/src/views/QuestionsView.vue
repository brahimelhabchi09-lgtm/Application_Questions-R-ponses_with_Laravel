<template>
  <div class="space-y-8">
    <!-- Hero -->
    <div class="flex items-end justify-between">
      <div>
        <h1 class="text-4xl font-black text-white mb-1">
          Bienvenue<span v-if="auth.isLoggedIn">, <span class="text-indigo-400">{{ auth.user?.name }}</span></span> !
        </h1>
        <p class="text-slate-400 text-lg">Qu'est-ce qu'on va résoudre aujourd'hui ?</p>
      </div>
      <div class="flex gap-3 items-center">
        <div class="glass px-5 py-2 text-center rounded-xl">
          <p class="text-2xl font-black text-white">{{ questions.length }}</p>
          <p class="text-xs text-slate-500 uppercase tracking-wider">Questions</p>
        </div>
      </div>
    </div>

    <!-- Loading -->
    <div v-if="loading" class="flex items-center justify-center py-20">
      <div class="w-10 h-10 border-2 border-indigo-500 border-t-transparent rounded-full animate-spin"></div>
    </div>

    <!-- Error -->
    <div v-else-if="error" class="glass p-6 text-center text-red-400">
      <span class="material-symbols-outlined text-4xl block mb-2">error</span>
      {{ error }}
    </div>

    <!-- Question Grid -->
    <div v-else class="grid grid-cols-1 md:grid-cols-2 gap-5">
      <div v-for="(q, i) in questions" :key="q.id"
        class="glass glass-hover card-enter p-6 cursor-pointer group transition-all duration-300"
        :style="`animation-delay: ${i * 60}ms`"
        @click="$router.push(`/questions/${q.id}`)">

        <!-- Author -->
        <div class="flex items-center justify-between mb-4">
          <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-sm">
              {{ q.user?.name?.charAt(0).toUpperCase() ?? '?' }}
            </div>
            <div>
              <p class="text-sm font-semibold text-white">{{ q.user?.name ?? 'Anonyme' }}</p>
              <p class="text-xs text-slate-500">{{ formatDate(q.created_at) }}</p>
            </div>
          </div>
          <span class="px-2 py-1 rounded-full bg-emerald-500/10 text-emerald-400 text-[10px] font-bold uppercase tracking-wider border border-emerald-500/20">
            {{ q.responses_count }} rép.
          </span>
        </div>

        <!-- Title -->
        <h2 class="text-base font-bold text-white mb-2 group-hover:text-indigo-400 transition-colors line-clamp-2 leading-snug">
          {{ q.title }}
        </h2>
        <p class="text-slate-400 text-sm leading-relaxed line-clamp-2">{{ q.content }}</p>

        <!-- Footer -->
        <div class="flex items-center gap-2 mt-4 pt-4 border-t border-white/5">
          <span class="material-symbols-outlined text-[16px] text-slate-500">chat_bubble</span>
          <span class="text-xs text-slate-500">{{ q.responses_count }} réponses</span>
          <span class="ml-auto text-xs text-indigo-400 group-hover:translate-x-1 transition-transform">Voir →</span>
        </div>
      </div>
    </div>

    <!-- Pagination -->
    <div v-if="meta && meta.last_page > 1" class="flex justify-center gap-2 pt-4">
      <button v-for="p in meta.last_page" :key="p"
        @click="fetchPage(p)"
        :class="['w-9 h-9 rounded-xl text-sm font-bold transition-all', p === meta.current_page ? 'neon-btn' : 'glass hover:bg-white/10 text-slate-400']">
        {{ p }}
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import { useAuthStore } from '@/stores/auth'

const auth      = useAuthStore()
const questions = ref([])
const meta      = ref(null)
const loading   = ref(true)
const error     = ref(null)

async function fetchPage(page = 1) {
  loading.value = true
  error.value   = null
  try {
    const { data } = await axios.get(`/api/questions?page=${page}`)
    questions.value = data.data
    meta.value      = data.meta ?? data
  } catch (e) {
    error.value = 'Impossible de charger les questions. Vérifiez que le backend est bien accessible via /api (port 3535 en Docker).'
  } finally {
    loading.value = false
  }
}

function formatDate(d) {
  if (!d) return ''
  return new Date(d).toLocaleDateString('fr-FR', { day: 'numeric', month: 'short', year: 'numeric' })
}

onMounted(() => fetchPage())
</script>

<style scoped>
.glass-hover:hover { border-color: rgba(99,102,241,0.3); background: rgba(255,255,255,0.07); }
</style>
