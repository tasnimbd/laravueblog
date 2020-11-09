import Axios from "axios"

export default {
    state: {
        category: [],
    },
    getters: {
        getCategory(state) {
            return state.category
        }
    },
    actions: {
        allcategory(context){
            axios.get('/category')
            .then((res)=>{
                context.commit('categories', res.data.categories)
            })
        }
    },
    mutations: {
        categories(state, data) {
            return state.category = data
        }
    }
}