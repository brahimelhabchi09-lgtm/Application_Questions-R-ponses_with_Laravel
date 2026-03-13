import { defineStore } from 'pinia'
import { ref, computed } from 'vue'
import axios from 'axios'

export const useAuthStore = defineStore('auth', () => {
  const user = ref(JSON.parse(localStorage.getItem('user') || 'null'))
  const token = ref(localStorage.getItem('token') || null)

  const isLoggedIn = computed(() => !!token.value)

  // Set token on every axios request
  if (token.value) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${token.value}`
  }

  async function login(email, password) {
    const { data } = await axios.post('/api/login', { email, password })
    token.value = data.access_token
    user.value = data.user
    localStorage.setItem('token', data.access_token)
    localStorage.setItem('user', JSON.stringify(data.user))
    axios.defaults.headers.common['Authorization'] = `Bearer ${data.access_token}`
  }

  async function register(name, email, password, password_confirmation) {
    const { data } = await axios.post('/api/register', { name, email, password, password_confirmation })
    token.value = data.access_token
    user.value = data.user
    localStorage.setItem('token', data.access_token)
    localStorage.setItem('user', JSON.stringify(data.user))
    axios.defaults.headers.common['Authorization'] = `Bearer ${data.access_token}`
  }

  async function logout() {
    try { await axios.post('/api/logout') } catch { }
    token.value = null
    user.value = null
    localStorage.removeItem('token')
    localStorage.removeItem('user')
    delete axios.defaults.headers.common['Authorization']
  }

  return { user, token, isLoggedIn, login, register, logout }
})
