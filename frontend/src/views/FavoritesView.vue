<template>
  <div class="space-y-6 sm:space-y-8">
    <div>
      <h1 class="text-2xl sm:text-3xl md:text-4xl font-black text-white mb-1">Mes favoris</h1>
      <p class="text-slate-400 text-base sm:text-lg">Les questions que vous avez mises en favori.</p>
    </div>

    <div v-if="loading" class="flex items-center justify-center py-16 sm:py-24">
      <div class="w-10 h-10 border-2 border-indigo-500 border-t-transparent rounded-full animate-spin" />
    </div>

    <div v-else-if="error" class="glass p-6 sm:p-8 text-center text-red-400 rounded-2xl">
      <span class="material-symbols-outlined text-4xl block mb-2">error</span>
      {{ error }}
    </div>

    <div v-else-if="!favorites.length" class="glass p-12 sm:p-16 text-center rounded-2xl">
      <span class="material-symbols-outlined text-5xl text-slate-600 block mb-4">favorite</span>
      <p class="text-slate-400 mb-2">Aucun favori pour l'instant</p>
      <p class="text-slate-500 text-sm mb-6">Parcourez les questions et cliquez sur le cœur pour les ajouter ici.</p>
      <RouterLink to="/" class="neon-btn inline-flex items-center gap-2 px-5 py-2.5 text-sm">
        <span class="material-symbols-outlined text-[18px]">forum</span>
        Voir les questions
      </RouterLink>
    </div>

    <div v-else class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
      <article
        v-for="(fav, i) in favorites"
        :key="fav.id"
        class="glass glass-hover card-enter p-5 sm:p-6 group rounded-2xl relative"
        :style="{ animationDelay: `${i * 50}ms` }"
      >
        <button
          type="button"
          @click.stop="removeFavorite(fav)"
          :disabled="removing === fav.id"
          class="absolute top-4 right-4 p-2 rounded-lg text-amber-400 hover:bg-amber-500/20 transition-colors disabled:opacity-50"
          title="Retirer des favoris"
        >
          <span class="material-symbols-outlined text-[22px]" :class="{ 'animate-pulse': removing === fav.id }">
            favorite
          </span>
        </button>

        <div
          class="pr-12 cursor-pointer"
          @click="$router.push(`/questions/${fav.question?.id}`)"
        >
          <div class="flex items-start justify-between gap-3 mb-3 sm:mb-4">
            <div class="flex items-center gap-3 min-w-0">
              <div class="w-9 h-9 rounded-xl bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-sm shrink-0">
                {{ fav.question?.user?.name?.charAt(0).toUpperCase() ?? '?' }}
              </div>
              <div class="min-w-0">
                <p class="text-sm font-semibold text-white truncate">{{ fav.question?.user?.name ?? 'Anonyme' }}</p>
                <p class="text-xs text-slate-500">{{ formatDate(fav.question?.created_at) }}</p>
              </div>
            </div>
            <span class="px-2 py-1 rounded-full bg-emerald-500/10 text-emerald-400 text-[10px] font-bold uppercase tracking-wider border border-emerald-500/20 shrink-0">
              {{ fav.question?.responses_count ?? 0 }} rép.
            </span>
          </div>
          <h2 class="text-base sm:text-lg font-bold text-white mb-2 group-hover:text-indigo-400 transition-colors line-clamp-2 leading-snug">
            {{ fav.question?.title }}
          </h2>
          <p class="text-slate-400 text-sm leading-relaxed line-clamp-2">{{ fav.question?.content }}</p>
          <div class="flex items-center gap-2 mt-4 pt-4 border-t border-white/5">
            <span class="material-symbols-outlined text-[16px] text-slate-500">chat_bubble</span>
            <span class="text-xs text-slate-500">{{ fav.question?.responses_count ?? 0 }} réponses</span>
            <span class="ml-auto text-xs text-indigo-400 group-hover:translate-x-1 transition-transform">Voir →</span>
          </div>
        </div>
      </article>
    </div>

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

const favorites = ref([])
const meta    = ref(null)
const loading = ref(true)
const error   = ref(null)
const removing = ref(null)

async function fetchPage(page = 1) {
  loading.value = true
  error.value   = null
  try {
    const { data } = await axios.get(`/api/favorites?page=${page}`)
    favorites.value = data.data ?? []
    meta.value      = data.meta ?? { last_page: 1, current_page: 1 }
  } catch (e) {
    error.value = e.response?.status === 401
      ? 'Connectez-vous pour voir vos favoris.'
      : 'Impossible de charger les favoris.'
  } finally {
    loading.value = false
  }
}

async function removeFavorite(fav) {
  removing.value = fav.id
  try {
    await axios.delete(`/api/favorites/${fav.id}`)
    favorites.value = favorites.value.filter(f => f.id !== fav.id)
  } catch {
    error.value = 'Erreur lors du retrait.'
  } finally {
    removing.value = null
  }
}

function formatDate(d) {
  if (!d) return ''
  return new Date(d).toLocaleDateString('fr-FR', { day: 'numeric', month: 'short', year: 'numeric' })
}

onMounted(() => fetchPage())
</script>
