<template>
  <div class="max-w-3xl mx-auto space-y-5 sm:space-y-6">
    <button
      type="button"
      @click="$router.back()"
      class="flex items-center gap-2 text-slate-400 hover:text-white transition-colors text-sm py-2 -ml-1 min-h-[44px]"
    >
      <span class="material-symbols-outlined text-[20px]">arrow_back</span>
      <span>Retour</span>
    </button>

    <div v-if="loading" class="flex justify-center py-16 sm:py-24">
      <div class="w-10 h-10 border-2 border-indigo-500 border-t-transparent rounded-full animate-spin" />
    </div>

    <template v-else-if="question">
      <article class="glass p-6 sm:p-8 card-enter rounded-2xl">
        <div class="flex items-center justify-between gap-3 mb-4 sm:mb-6">
          <div class="flex items-center gap-3 min-w-0">
            <div class="w-10 h-10 rounded-xl bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold shrink-0">
              {{ question.user?.name?.charAt(0).toUpperCase() }}
            </div>
            <div class="min-w-0">
              <p class="font-bold text-white truncate">{{ question.user?.name }}</p>
              <p class="text-xs text-slate-500">{{ formatDate(question.created_at) }}</p>
            </div>
          </div>
          <button
            v-if="auth.isLoggedIn"
            type="button"
            @click="toggleFavorite"
            :disabled="favoriteLoading"
            class="p-2.5 rounded-xl transition-colors shrink-0 disabled:opacity-50"
            :class="isFavorited ? 'text-amber-400 hover:bg-amber-500/20' : 'text-slate-500 hover:bg-white/5 hover:text-amber-400'"
            :title="isFavorited ? 'Retirer des favoris' : 'Ajouter aux favoris'"
          >
            <span class="material-symbols-outlined text-[24px]">{{ isFavorited ? 'favorite' : 'favorite_border' }}</span>
          </button>
        </div>
        <h1 class="text-xl sm:text-2xl font-black text-white mb-3 sm:mb-4 leading-snug">{{ question.title }}</h1>
        <p class="text-slate-300 leading-relaxed whitespace-pre-line text-sm sm:text-base">{{ question.content }}</p>
      </article>

      <div class="flex items-center gap-4 py-2">
        <div class="h-px flex-1 bg-white/5" />
        <span class="text-xs font-bold uppercase tracking-widest text-slate-600">
          {{ question.responses?.length ?? 0 }} Réponse{{ (question.responses?.length ?? 0) !== 1 ? 's' : '' }}
        </span>
        <div class="h-px flex-1 bg-white/5" />
      </div>

      <div class="space-y-4">
        <div
          v-for="(r, i) in question.responses"
          :key="r.id"
          class="glass p-5 sm:p-6 card-enter rounded-2xl"
          :style="{ animationDelay: `${i * 50}ms` }"
        >
          <div class="flex items-center gap-3 mb-3">
            <div class="w-8 h-8 rounded-lg bg-emerald-500/20 flex items-center justify-center text-emerald-400 font-bold text-sm shrink-0">
              {{ r.user?.name?.charAt(0).toUpperCase() }}
            </div>
            <div class="min-w-0">
              <p class="text-sm font-bold text-white truncate">{{ r.user?.name }}</p>
              <p class="text-xs text-slate-500">{{ formatDate(r.created_at) }}</p>
            </div>
          </div>
          <p class="text-slate-300 text-sm leading-relaxed">{{ r.content }}</p>
        </div>
        <div v-if="!question.responses?.length" class="glass text-center py-10 sm:py-12 text-slate-500 rounded-2xl">
          <span class="material-symbols-outlined text-3xl block mb-2">chat_bubble_outline</span>
          Aucune réponse pour l'instant. Soyez le premier !
        </div>
      </div>

      <div v-if="auth.isLoggedIn" class="glass p-5 sm:p-6 rounded-2xl">
        <h3 class="text-sm font-bold uppercase tracking-widest text-slate-500 mb-4">Votre réponse</h3>
        <form @submit.prevent="submitReponse" class="space-y-4">
          <textarea
            v-model="reponse"
            rows="4"
            placeholder="Rédigez votre réponse..."
            class="input-field min-h-[120px] resize-none"
          />
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <p v-if="submitError" class="text-red-400 text-sm order-2 sm:order-1">{{ submitError }}</p>
            <button
              type="submit"
              :disabled="submitting"
              class="neon-btn w-full sm:w-auto flex items-center justify-center gap-2 px-5 py-3 text-sm min-h-[44px] disabled:opacity-50 order-1 sm:order-2 sm:ml-auto"
            >
              <span class="material-symbols-outlined text-[18px]">send</span>
              {{ submitting ? 'Envoi...' : 'Répondre' }}
            </button>
          </div>
        </form>
      </div>
      <div v-else class="glass p-5 sm:p-6 text-center rounded-2xl">
        <p class="text-slate-400 text-sm">
          <RouterLink to="/login" class="text-indigo-400 hover:underline font-semibold">Connectez-vous</RouterLink>
          pour laisser une réponse.
        </p>
      </div>
    </template>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import axios from 'axios'
import { useAuthStore } from '@/stores/auth'

const route         = useRoute()
const auth          = useAuthStore()
const question      = ref(null)
const loading       = ref(true)
const reponse       = ref('')
const submitting    = ref(false)
const submitError   = ref(null)
const favoriteLoading = ref(false)

const isFavorited = computed(() => !!question.value?.is_favorited)

async function toggleFavorite() {
  if (!auth.isLoggedIn || favoriteLoading.value) return
  favoriteLoading.value = true
  try {
    if (question.value.is_favorited) {
      await axios.delete(`/api/favorites/by-question/${question.value.id}`)
      question.value.is_favorited = false
      question.value.favorite_id = null
    } else {
      await axios.post('/api/favorites', { question_id: question.value.id })
      question.value.is_favorited = true
    }
  } catch {
    submitError.value = 'Erreur lors de la mise à jour des favoris.'
  } finally {
    favoriteLoading.value = false
  }
}

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
