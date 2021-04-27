require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
  el: '#app',
  data: {
    showComment1: false,
    showComment2: false,
    showComment3: false,
    showComment4: false,
    commentMessage: '',
    radio1: '',
    radio2: '',
    radio3: '',
    radio4: '',
    textarea1: '',
    textarea2: '',
    textarea3: '',
    textarea4: '',
    isDisabled: true,
    isTeamShown: false
  },
  methods: {
    showTeams: function(indexTeam) {
      // if(indexTeam == ) {
        console.log(indexTeam);
        this.isTeamShown = true;
      // } else {
      //   this.isTeamShown = false;
      // }
    },
    cancelVotes: function() {
      this.radio1 = '';
      this.radio2 = '';
      this.radio3 = '';
      this.radio4 = '';
      this.textarea1 = '';
      this.textarea2 = '';
      this.textarea3 = '';
      this.textarea4 = '';
      this.showComment1 = false;
      this.showComment2 = false;
      this.showComment3 = false;
      this.showComment4 = false;
      this.isDisabled = true;
    },
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
    checkVoteComment4: function(voteValue) {
      if(voteValue <= 5) {
        this.showComment4 = true;
        this.commentMessage = 'Il tuo voto è molto basso, è richiesta una motivazione.';
      } else if(voteValue >= 9) {
        this.showComment4 = true;
        this.commentMessage = 'Il tuo voto è molto alto, è richiesta una motivazione.';
      } else {
        this.showComment4 = false;
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
    isFormEmpty: function() {
      this.isDisabled = false;
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
