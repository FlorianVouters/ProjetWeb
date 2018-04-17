

new Vue({
    el:"#app",
    data:{
        success: true,
        cguValidated: false,
    },
    methods: {
        afficher: function () {
          if (this.success == true){
              this.success = false;
          }else{
              this.success = true;
          }
        }
    }

});

// $("#signIn").ajaxForm({url: "127.0.0.1:8000/signIn", type: "post"});
// $("#register").ajaxForm({url: "127.0.0.1:8000/register", type: "post"});


// this is the id of the form
$("#register").submit(function(e) {
    console.log("register pressed");
    var url = "path/to/your/script.php"; // the script where you handle the form input.
    if(1 === 1){

    }
    $.ajax({
        type: "POST",
        url: url,
        data: $("#register").serialize(), // serializes the form's elements.
        success: function(data)
        {
            alert(data); // show response from the php script.
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});


// Creation d'un timer Vue.js

// var vm = new Vue({
//     el:"#app",
//     data: {
//         seconds: 0
//     },
//     mounted: function () {
//         this.$interval = setInterval(() => {
//             console.log("Time's up");
//             this.seconds++
//         }, 1000)
//     },
//
//     destroyed: function () {
//         clearInterval(this.$interval)
//     }
// });