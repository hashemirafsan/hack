require('../app')

import router from './route'
import store from './store'

window.Event = new Vue();

const app = new Vue({
    router,
    store
}).$mount('#app')