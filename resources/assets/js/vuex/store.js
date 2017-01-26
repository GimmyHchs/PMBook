import api from './api.js';
// api = require('./api.js');
window.store = new Vuex.Store({
    state: {
        project: null,
    },
    mutations: {
        changeProject (state, project) {
            state.project = project;
        }
    },
    actions:{
        changeProject (context, id) {
            Vue.http.get('/project/'+id).then((response) => {
                context.commit('changeProject', response.data.project);
            }, (response) => {
                console.log('error from ProjectService');
                return null;
            })
        },
        mylog (context) {
            api.loghere();
        }
    }
});
