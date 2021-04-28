require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
  el: '#app',
  data: {
    commentMessage1: '',
    commentMessage2: '',
    commentMessage3: '',
    commentMessage4: '',
    lowGradeMessage: 'Il tuo voto è molto basso, è richiesta una motivazione',
    highGradeMessage: 'Il tuo voto è molto alto, è richiesta una motivazione',
    normalGradeMessage: 'Puoi aggiungere un commento al tuo voto (facoltativo)',
    showComment1: false,
    showComment2: false,
    showComment3: false,
    showComment4: false,
    isRequired1: false,
    isRequired2: false,
    isRequired3: false,
    isRequired4: false,
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
    // showTeams: function(indexTeam) {
    //   // if(indexTeam == ) {
    //     console.log(indexTeam);
    //     this.isTeamShown = true;
    //   // } else {
    //   //   this.isTeamShown = false;
    //   // }
    // },
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
      this.isRequired1 = false,
      this.isRequired2 = false,
      this.isRequired3 = false,
      this.isRequired4 = false,
      this.isDisabled = true;
    },
    checkVoteComment1: function(voteValue) {
      this.showComment1 = true;
      if(voteValue <= 5) {
        this.isRequired1 = true,
        this.commentMessage1 = this.lowGradeMessage;
      } else if(voteValue >= 9) {
        this.isRequired1 = true,
        this.commentMessage1 = this.highGradeMessage;
      } else {
        this.isRequired1 = false,
        this.commentMessage1 = this.normalGradeMessage;
      }
    },
    checkVoteComment2: function(voteValue) {
      this.showComment2 = true;
      if(voteValue <= 5) {
        this.isRequired2 = true,
        this.commentMessage2 = this.lowGradeMessage;
      } else if(voteValue >= 9) {
        this.isRequired2 = true,
        this.commentMessage2 = this.highGradeMessage;
      } else {
        this.isRequired2 = false,
        this.commentMessage2 = this.normalGradeMessage;
      }
    },
    checkVoteComment3: function(voteValue) {
      this.showComment3 = true;
      if(voteValue <= 5) {
        this.isRequired3 = true,
        this.commentMessage3 = this.lowGradeMessage;
      } else if(voteValue >= 9) {
        this.isRequired3 = true,
        this.commentMessage3 = this.highGradeMessage;
      } else {
        this.isRequired3 = false,
        this.commentMessage3 = this.normalGradeMessage;
      }
    },
    checkVoteComment4: function(voteValue) {
      this.showComment4 = true;
      if(voteValue <= 5) {
        this.isRequired4 = true,
        this.commentMessage4 = this.lowGradeMessage;
      } else if(voteValue >= 9) {
        this.isRequired4 = true,
        this.commentMessage4 = this.highGradeMessage;
      } else {
        this.isRequired4 = false,
        this.commentMessage4 = this.normalGradeMessage;
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
