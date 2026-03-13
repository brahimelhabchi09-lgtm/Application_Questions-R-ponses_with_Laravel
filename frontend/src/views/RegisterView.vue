<template>
  <div class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md card-enter">
      <div class="text-center mb-8">
        <div class="w-14 h-14 rounded-2xl bg-indigo-500 flex items-center justify-center mx-auto mb-4" style="box-shadow:0 0 24px rgba(99,102,241,0.5)">
          <span class="material-symbols-outlined text-white text-[28px]">person_add</span>
        </div>
        <h1 class="text-3xl font-black text-white">Inscription</h1>
        <p class="text-slate-400 mt-1">Rejoignez la communauté</p>
      </div>

      <form @submit.prevent="handleRegister" class="glass p-8 space-y-5">
        <div v-if="error" class="bg-red-500/10 border border-red-500/20 rounded-xl p-3 text-red-400 text-sm flex items-center gap-2">
          <span class="material-symbols-outlined text-[18px]">error</span> {{ error }}
        </div>

        <div>
          <label class="block text-sm font-semibold text-slate-300 mb-2">Nom</label>
          <div class="relative">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-500 text-[20px]">person</span>
            <input v-model="form.name" type="text" placeholder="Votre nom" required
              class="w-full bg-white/5 border border-white/5 rounded-xl pl-10 pr-4 py-3 text-slate-200 placeholder:text-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 text-sm transition-all" />
          </div>
        </div>

        <div>
          <label class="block text-sm font-semibold text-slate-300 mb-2">Email</label>
          <div class="relative">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-500 text-[20px]">mail</span>
            <input v-model="form.email" type="email" placeholder="vous@exemple.com" required
              class="w-full bg-white/5 border border-white/5 rounded-xl pl-10 pr-4 py-3 text-slate-200 placeholder:text-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 text-sm transition-all" />
          </div>
        </div>

        <div>
          <label class="block text-sm font-semibold text-slate-300 mb-2">Mot de passe</label>
          <div class="relative">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-500 text-[20px]">lock</span>
            <input v-model="form.password" type="password" placeholder="•••••••• (min. 6 car.)" required
              class="w-full bg-white/5 border border-white/5 rounded-xl pl-10 pr-4 py-3 text-slate-200 placeholder:text-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 text-sm transition-all" />
          </div>
        </div>

        <div>
          <label class="block text-sm font-semibold text-slate-300 mb-2">Confirmer le mot de passe</label>
          <div class="relative">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-500 text-[20px]">lock_reset</span>
            <input v-model="form.password_confirmation" type="password" placeholder="••••••••" required
              class="w-full bg-white/5 border border-white/5 rounded-xl pl-10 pr-4 py-3 text-slate-200 placeholder:text-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 text-sm transition-all" />
          </div>
        </div>

        <button type="submit" :disabled="loading"
          class="neon-btn w-full py-3 text-sm flex items-center justify-center gap-2 disabled:opacity-50">
          <span v-if="loading" class="w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin"></span>
          <span v-else class="material-symbols-outlined text-[18px]">how_to_reg</span>
          {{ loading ? 'Inscription...' : "S'inscrire" }}
        </button>

        <p class="text-center text-sm text-slate-500">
          Déjà inscrit ?
          <RouterLink to="/login" class="text-indigo-400 hover:underline font-semibold">Se connecter</RouterLink>
        </p>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'

const auth    = useAuthStore()
const router  = useRouter()
const loading = ref(false)
const error   = ref(null)
const form    = ref({ name: '', email: '', password: '', password_confirmation: '' })

async function handleRegister() {
  loading.value = true
  error.value   = null
  try {
    await auth.register(form.value.name, form.value.email, form.value.password, form.value.password_confirmation)
    router.push('/')
  } catch (e) {
    error.value = e.response?.data?.message ?? 'Erreur lors de l\'inscription.'
  } finally {
    loading.value = false
  }
}
</script>
