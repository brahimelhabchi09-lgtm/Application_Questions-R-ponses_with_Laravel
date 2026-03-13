<template>
  <div class="max-w-3xl mx-auto space-y-6">
    <!-- Back -->
    <button @click="$router.back()" class="flex items-center gap-2 text-slate-400 hover:text-white transition-colors text-sm">
      <span class="material-symbols-outlined text-[18px]">arrow_back</span> Retour
    </button>

    <!-- Loading -->
    <div v-if="loading" class="flex justify-center py-20">
      <div class="w-10 h-10 border-2 border-indigo-500 border-t-transparent rounded-full animate-spin"></div>
    </div>

    <template v-else-if="question">
      <!-- Question Card -->
      <article class="glass p-8 card-enter">
        <div class="flex items-center gap-3 mb-6">
          <div class="w-10 h-10 rounded-xl bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold">
            {{ question.user?.name?.charAt(0).toUpperCase() }}
          </div>
          <div>
            <p class="font-bold text-white">{{ question.user?.name }}</p>
            <p class="text-xs text-slate-500">{{ formatDate(question.created_at) }}</p>
          </div>
        </div>
        <h1 class="text-2xl font-black text-white mb-4 leading-snug">{{ question.title }}</h1>
        <p class="text-slate-300 leading-relaxed whitespace-pre-line">{{ question.content }}</p>
      </article>

      <!-- Divider -->
      <div class="flex items-center gap-4">
        <div class="h-px flex-1 bg-white/5"></div>
        <span class="text-xs font-bold uppercase tracking-widest text-slate-600">
          {{ question.responses?.length ?? 0 }} Réponse{{ (question.responses?.length ?? 0) !== 1 ? 's' : '' }}
        </span>
        <div class="h-px flex-1 bg-white/5"></div>
      </div>

      <!-- Responses -->
      <div class="space-y-4">
        <div v-for="(r, i) in question.responses" :key="r.id"
          class="glass p-6 card-enter" :style="`animation-delay:${i*50}ms`">
          <div class="flex items-center justify-between mb-3">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-lg bg-emerald-500/20 flex items-center justify-center text-emerald-400 font-bold text-sm">
                {{ r.user?.name?.charAt(0).toUpperCase() }}
              </div>
              <div>
                <p class="text-sm font-bold text-white">{{ r.user?.name }}</p>
                <p class="text-xs text-slate-500">{{ formatDate(r.created_at) }}</p>
              </div>
            </div>
          </div>
          <p class="text-slate-300 text-sm leading-relaxed">{{ r.content }}</p>
        </div>
        <div v-if="!question.responses?.length" class="text-center py-8 text-slate-600">
          <span class="material-symbols-outlined text-3xl block mb-2">chat_bubble_outline</span>
          Aucune réponse pour l'instant. Soyez le premier !
        </div>
      </div>

      <!-- Reply Form -->
      <div v-if="auth.isLoggedIn" class="glass p-6">
        <h3 class="text-sm font-bold uppercase tracking-widest text-slate-500 mb-4">Votre réponse</h3>
        <form @submit.prevent="submitReponse" class="space-y-4">
          <textarea v-model="reponse" rows="4" placeholder="Rédigez votre réponse..."
            class="w-full bg-white/5 border border-white/5 rounded-xl p-4 text-slate-200 placeholder:text-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 resize-none text-sm transition-all"></textarea>
          <div class="flex items-center justify-between">
            <p v-if="submitError" class="text-red-400 text-sm">{{ submitError }}</p>
            <button type="submit" :disabled="submitting" class="neon-btn ml-auto flex items-center gap-2 px-5 py-2.5 text-sm disabled:opacity-50">
              <span class="material-symbols-outlined text-[18px]">send</span>
              {{ submitting ? 'Envoi...' : 'Répondre' }}
            </button>
          </div>
        </form>
      </div>
      <div v-else class="glass p-5 text-center">
        <p class="text-slate-400 text-sm">
          <RouterLink to="/login" class="text-indigo-400 hover:underline font-semibold">Connectez-vous</RouterLink>
          pour laisser une réponse.
        </p>
      </div>
    </template>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import axios from 'axios'
import { useAuthStore } from '@/stores/auth'

const route    = useRoute()
const auth     = useAuthStore()
const question = ref(null)
const loading  = ref(true)
const reponse  = ref('')
const submitting  = ref(false)
const submitError = ref(null)

async function fetchQuestion() {
  loading.value = true
  try {
    const { data } = await axios.get(`/api/questions/${route.params.id}`)
    question.value = data
  } finally {
    loading.value = false
  }
}

async function submitReponse() {
  if (!reponse.value.trim()) return
  submitting.value  = true
  submitError.value = null
  try {
    await axios.post('/api/reponses', { content: reponse.value, question_id: question.value.id })
    reponse.value = ''
    await fetchQuestion()
  } catch (e) {
    submitError.value = e.response?.data?.message ?? 'Une erreur est survenue.'
  } finally {
    submitting.value = false
  }
}

function formatDate(d) {
  if (!d) return ''
  return new Date(d).toLocaleDateString('fr-FR', { day: 'numeric', month: 'short', year: 'numeric' })
}

onMounted(fetchQuestion)
</script>
