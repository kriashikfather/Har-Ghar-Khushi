// main.js
import { createApp } from 'vue'
import App from './App.vue'
import './style.css'
import axios from 'axios'

// ✅ Axios Configuration
axios.defaults.baseURL = 'http://localhost:8000/api'
axios.interceptors.request.use(config => {
  const token = localStorage.getItem('token')
  if (token) {
    config.headers.Authorization = `Bearer ${token}`
  }
  return config
})

// 🛠️ Optional: Make axios available globally
// So you can use it inside components with this.$axios
// Example: app.config.globalProperties.$axios = axios;

const app = createApp(App)

// If you want global access to axios in components (optional):
app.config.globalProperties.$axios = axios

// ✅ Mount the app
app.mount('#app')

