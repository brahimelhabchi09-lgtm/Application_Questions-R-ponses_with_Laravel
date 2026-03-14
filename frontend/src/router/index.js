import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '@/stores/auth'

import QuestionsView from '@/views/QuestionsView.vue'
import QuestionDetailView from '@/views/QuestionDetailView.vue'
import LoginView from '@/views/LoginView.vue'
import RegisterView from '@/views/RegisterView.vue'
import CreateQuestionView from '@/views/CreateQuestionView.vue'
import FavoritesView from '@/views/FavoritesView.vue'

const routes = [
  { path: '/', component: QuestionsView },
  { path: '/questions/:id', component: QuestionDetailView },
  { path: '/login', component: LoginView, meta: { guest: true } },
  { path: '/register', component: RegisterView, meta: { guest: true } },
  { path: '/questions/create', component: CreateQuestionView, meta: { auth: true } },
  { path: '/favorites', component: FavoritesView, meta: { auth: true } },
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to) => {
  const auth = useAuthStore()
  if (to.meta.auth && !auth.isLoggedIn) return '/login'
  if (to.meta.guest && auth.isLoggedIn) return '/'
})

export default router
