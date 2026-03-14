<template>
  <div class="max-w-2xl mx-auto space-y-5 sm:space-y-6">
    <div>
      <h1 class="text-2xl sm:text-3xl font-black text-white mb-1">Poser une question</h1>
      <p class="text-slate-400 text-sm sm:text-base">Soyez précis pour obtenir de meilleures réponses.</p>
    </div>

    <form @submit.prevent="handleSubmit" class="glass p-6 sm:p-8 space-y-6 rounded-2xl">
      <div v-if="error" class="bg-red-500/10 border border-red-500/20 rounded-xl p-3 text-red-400 text-sm flex items-center gap-2">
        <span class="material-symbols-outlined text-[18px] shrink-0">error</span>
        {{ error }}
      </div>

      <div>
        <label class="block text-sm font-semibold text-slate-300 mb-2">Titre <span class="text-red-400">*</span></label>
        <input
          v-model="form.title"
          type="text"
          placeholder="Ex: Comment optimiser les requêtes Eloquent ?"
          required
          maxlength="255"
          class="input-field min-h-[48px]"
        />
        <p class="text-xs text-slate-500 mt-1">{{ form.title.length }} / 255</p>
      </div>

      <div>
        <label class="block text-sm font-semibold text-slate-300 mb-2">Description <span class="text-red-400">*</span></label>
        <textarea
          v-model="form.content"
          rows="8"
          placeholder="Décrivez votre problème en détail, incluez le code si nécessaire..."
          required
          class="input-field min-h-[180px] resize-none"
        />
      </div>

      <div class="flex flex-col-reverse sm:flex-row sm:items-center sm:justify-between gap-3 pt-2">
        <button
          type="button"
          @click="$router.back()"
          class="px-5 py-3 rounded-xl border border-white/10 text-slate-400 hover:bg-white/5 hover:text-white transition-all text-sm font-semibold min-h-[48px]"
        >
          Annuler
        </button>
        <button
          type="submit"
          :disabled="loading"
          class="neon-btn flex items-center justify-center gap-2 px-6 py-3 text-sm min-h-[48px] disabled:opacity-50"
        >
          <span v-if="loading" class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin" />
          <span v-else class="material-symbols-outlined text-[18px]">send</span>
          {{ loading ? 'Publication...' : 'Publier la question' }}
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

const router  = useRouter()
const loading = ref(false)
const error   = ref(null)
const form    = ref({ title: '', content: '' })

async function handleSubmit() {
  loading.value = true
  error.value   = null
  try {
    const { data } = await axios.post('/api/questions', form.value)
    router.push(`/questions/${data.question.id}`)
  } catch (e) {
    error.value = e.response?.data?.message ?? 'Erreur lors de la publication.'
  } finally {
    loading.value = false
  }
}
</script>
