import api from './api.js';
// api = require('./api.js');
window.store = new Vuex.Store({
    state: {
        project: null,
        projects: null,
    },
    mutations: {
        changeProject (state, project) {
            state.project = project;
        },
        fetchProjects (state, projects){
            state.projects = projects;
        }
    },
    actions:{
        changeProject (context, id) {
            Vue.http.get('/project/'+id).then((response) => {
                context.commit('changeProject', response.data.project);
            }, (response) => {
                console.log('error from changeProject');
                return null;
            })
        },
        fetchProjects (context) {
            Vue.http.get('/project').then((response) => {
                context.commit('fetchProjects', response.data);
            }, (response) => {
                console.log('error from fetchProjects');
                return null;
            })
        },
        mylog (context) {
            api.loghere();
        }
    }
});
