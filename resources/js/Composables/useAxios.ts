import { ref } from 'vue'
import axios from 'axios'

export function useAxios() {
  const error = ref(null)
  const errorMessage = ref('')

  const clearError = () => {
    error.value = null
    errorMessage.value = ''
  }

  const get = async (url) => {
    try {
      clearError()
      const response = await axios.get(url)
      return response.data
    } catch (err) {
      error.value = err
      errorMessage.value = err.message
      throw err
    }
  }

  const post = async (url, data) => {
    try {
      clearError()
      const response = await axios.post(url, data)
      return response.data
    } catch (err) {
      error.value = err
      errorMessage.value = err.message
      throw err
    }
  }

  return {
    error,
    errorMessage,
    clearError,
    get,
    post
  }
}
