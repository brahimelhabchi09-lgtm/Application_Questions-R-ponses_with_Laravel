<template>
  <div class="space-y-6 sm:space-y-8">
    <!-- Hero -->
    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
      <div>
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-black text-white mb-1 leading-tight">
          Bienvenue<span v-if="auth.isLoggedIn">, <span class="text-indigo-400">{{ auth.user?.name }}</span></span> !
        </h1>
        <p class="text-slate-400 text-base sm:text-lg">Qu'est-ce qu'on va résoudre aujourd'hui ?</p>
      </div>
      <div class="flex gap-3 items-center shrink-0">
        <div class="glass px-4 sm:px-5 py-3 sm:py-3.5 rounded-xl">
          <p class="text-xl sm:text-2xl font-black text-white">{{ questions.length }}</p>
          <p class="text-[10px] sm:text-xs text-slate-500 uppercase tracking-wider">Questions</p>
        </div>
      </div>
    </div>

    <!-- Loading -->
    <div v-if="loading" class="flex items-center justify-center py-16 sm:py-24">
      <div class="w-10 h-10 border-2 border-indigo-500 border-t-transparent rounded-full animate-spin" />
    </div>

    <!-- Error -->
    <div v-else-if="error" class="glass p-6 sm:p-8 text-center text-red-400 rounded-2xl">
      <span class="material-symbols-outlined text-4xl block mb-2">error</span>
      {{ error }}
    </div>

    <!-- Question Grid -->
    <div v-else class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
      <article
        v-for="(q, i) in questions"
        :key="q.id"
        class="glass glass-hover card-enter p-5 sm:p-6 cursor-pointer group transition-all duration-300 rounded-2xl"
        :style="{ animationDelay: `${i * 50}ms` }"
        @click="$router.push(`/questions/${q.id}`)"
      >
        <div class="flex items-start justify-between gap-3 mb-3 sm:mb-4">
          <div class="flex items-center gap-3 min-w-0">
            <div class="w-9 h-9 rounded-xl bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-sm shrink-0">
              {{ q.user?.name?.charAt(0).toUpperCase() ?? '?' }}
            </div>
            <div class="min-w-0">
              <p class="text-sm font-semibold text-white truncate">{{ q.user?.name ?? 'Anonyme' }}</p>
              <p class="text-xs text-slate-500">{{ formatDate(q.created_at) }}</p>
            </div>
          </div>
          <span class="px-2 py-1 rounded-full bg-emerald-500/10 text-emerald-400 text-[10px] font-bold uppercase tracking-wider border border-emerald-500/20 shrink-0">
            {{ q.responses_count }} rép.
          </span>
        </div>
        <h2 class="text-base sm:text-lg font-bold text-white mb-2 group-hover:text-indigo-400 transition-colors line-clamp-2 leading-snug">
          {{ q.title }}
        </h2>
        <p class="text-slate-400 text-sm leading-relaxed line-clamp-2">{{ q.content }}</p>
        <div class="flex items-center gap-2 mt-4 pt-4 border-t border-white/5">
          <span class="material-symbols-outlined text-[16px] text-slate-500">chat_bubble</span>
          <span class="text-xs text-slate-500">{{ q.responses_count }} réponses</span>
          <span class="ml-auto text-xs text-indigo-400 group-hover:translate-x-1 transition-transform">Voir →</span>
        </div>
      </article>
    </div>

    <!-- Pagination -->
    <div v-if="meta && meta.last_page > 1" class="flex flex-wrap justify-center gap-2 pt-4 sm:pt-6">
      <button
        v-for="p in meta.last_page"
        :key="p"
        type="button"
        @click="fetchPage(p)"
        :class="[
          'w-10 h-10 sm:w-11 sm:h-11 rounded-xl text-sm font-bold transition-all min-h-[44px]',
          p === meta.current_page ? 'neon-btn' : 'glass hover:bg-white/10 text-slate-400'
        ]"
      >
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
