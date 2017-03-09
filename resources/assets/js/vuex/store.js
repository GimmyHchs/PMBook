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
        },
        deleteProject (state, id){
            state.projects = state.projects.filter(function(project) {
                return project.id != id;
            });
            state.project = null;
        },
    },
    getters: {
        projectName (state){
            if(state.project) return ' - '+state.project.name;
            return '';
        },
    },
    actions:{
        fetchProject (context) {
            Vue.http.get('/project/'+id).then((response) => {
                context.commit('changeProject', response.data.project);
            }, (response) => {
                console.log('error from fetchProject');
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
        deleteProject (context, id) {
            console.log('action delete');
            Vue.http.delete('/project/'+id).then((response) => {
                context.commit('deleteProject', id);
            }, (response) => {
                console.log('error from deleteProject');
                return null;
            })
        },
        mylog (context) {
            api.loghere();
        }
    }
});
