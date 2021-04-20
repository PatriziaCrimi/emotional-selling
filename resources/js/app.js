

require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
  el: '#app',
  data: {
    showComment1: false,
    showComment2: false,
    showComment3: false,
    commentMessage: '',
    // userArray: [],
    // teamArray: [],
    // showUserForm: false,
    // showTeamForm: false
  },
  methods: {
    checkVoteComment1: function(voteValue) {
      if(voteValue <= 5) {
        this.showComment1 = true;
        this.commentMessage = 'Il tuo voto è molto basso, è richiesta una motivazione.';
      } else if(voteValue >= 9) {
        this.showComment1 = true;
        this.commentMessage = 'Il tuo voto è molto alto, è richiesta una motivazione.';
      } else {
        this.showComment1 = false;
      }
    },
    checkVoteComment2: function(voteValue) {
      if(voteValue <= 5) {
        this.showComment2 = true;
        this.commentMessage = 'Il tuo voto è molto basso, è richiesta una motivazione.';
      } else if(voteValue >= 9) {
        this.showComment2 = true;
        this.commentMessage = 'Il tuo voto è molto alto, è richiesta una motivazione.';
      } else {
        this.showComment2 = false;
      }
    },
    checkVoteComment3: function(voteValue) {
      if(voteValue <= 5) {
        this.showComment3 = true;
        this.commentMessage = 'Il tuo voto è molto basso, è richiesta una motivazione.';
      } else if(voteValue >= 9) {
        this.showComment3 = true;
        this.commentMessage = 'Il tuo voto è molto alto, è richiesta una motivazione.';
      } else {
        this.showComment3 = false;
      }
    },
    alertVoted() {
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Il tuo voto è stato salvato',
          showConfirmButton: false,
          timer: 1500
        })
    },
    // getUser(id){
    //     axios
    //       .get("/logged/votes/user/" + id ).
    //       then(response => {
    //         this.showUserForm = !this.showUserForm;
    //         this.userArray = response.data;
    //         console.log(this.userArray.user, id);
    //     });
    // },
    // getTeam(id){
    //   axios.
    //     get("/logged/votes/team/" + id ).
    //     then(response => {
    //       this.showTeamForm = !this.showTeamForm;
    //       this.teamArray = response.data;
    //       console.log("team",this.teamArray.team[0].team_id,this.teamArray.comboAuth.id);
    //   });
    // }
  }
});
