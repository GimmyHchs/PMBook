import Vue from 'vue';
export default{
    loghere(){
        console.log('here');
    },
    ProjectService: {
        getById(id){
            Vue.http.get('/project/'+id).then((response) => {
                console.log(response.data);
                return response.data.project;
            }, (response) => {
                console.log('error from ProjectService');
                return null;
            })
        }
    }
}
