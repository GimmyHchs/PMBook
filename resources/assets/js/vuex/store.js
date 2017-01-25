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
        changeProject (context) {
            // var project = api.ProjectService.getById(10);
            Vue.http.get('/project/10').then((response) => {
                console.log(response.data);
                context.commit('changeProject', response.data.project);
            }, (response) => {
                console.log('error from ProjectService');
                return null;
            })
            // console.log(project);
            // context.commit('changeProject', project);
        },
        mylog (context) {
            api.loghere();
        }
    }
});
