import { createStore } from 'vuex'

export const store = new createStore({
    state: {
      dictors: {},
    },

    mutations: {
        setDictors (state, value) {
            state.dictors = value
        },
    },

    getters: {
        dictors: state => {
          return state.dictors
        },
    },

    actions: {

        getDictors(context, value) {
                axios.get('/dictori/get')
                .then((response) => {
                    context.commit('setDictors', response.data)
                })
                .catch(error => console.log(error));
        },

      }
  })
