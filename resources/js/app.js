
require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
    data: {
      userArray: [],
      teamArray: [],
      showUserForm: false,
      showTeamForm: false
    },
    methods:{
        getUser(id){
            axios
              .get("/logged/votes/user/" + id ).
              then(response => {
                this.showUserForm = !this.showUserForm;
                this.userArray = response.data;
                console.log(this.userArray.user, id);
            });
        },
        getTeam(id){
          axios.
            get("/logged/votes/team/" + id ).
            then(response => {
              this.showTeamForm = !this.showTeamForm;
              this.teamArray = response.data;
              console.log("team",this.teamArray.team[0].team_id,this.teamArray.comboAuth.id);
          });
        }
    }
});
