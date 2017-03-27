
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('test', require('./components/Test.vue'));

Pusher.logToConsole = true;
         var pusher = new Pusher('554f99af0fcf4d4ab71d', {
           cluster: 'eu',
           encrypted: true
         });

         var channel = pusher.subscribe('my-channel');


const app = new Vue({
    el: '#app',

    data:{
      messages:[],
     messageText:'',


   },

    mounted(){
      this.fetch();
      console.log("welcome");

      // Echo.private('newmessage')
      // .listen('MessagePosted', (e) => {
      //     console.log(e.update);
      // });

    },

 	methods: {
 		fetch() {

 			this.$http.get('messages').then((response) => {
 				this.messages = response.data;



 			});
 		},
    send:function(){
         var form = new FormData(document.getElementById("chatme"));

         this.$http.post('sendMsg',form).then((response)=>{
           this.messageText ="";

           channel.bind('my-event', function(data){
                  app.messages.push({
                    message:data.message,
                    user:data.user
                  })
                  app.messages.message ='';
                  app.messages.user ='';


           });

         })


       }


  },
  created(){

    // channel.bind('my-event', function(data) {
    //   alert(data.message);
    // });
  }
});
