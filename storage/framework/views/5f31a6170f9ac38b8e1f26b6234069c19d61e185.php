<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo e(url('css/app.css')); ?>">
        <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>


    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(Auth::check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(url('/login')); ?>">Login</a>
                        <a href="<?php echo e(url('/register')); ?>">Register</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div id="app" class="content">
                <div class="title m-b-md">
                  <h1>using vue js</h1>
                  <div class="panel-body">
                  <div id="chat-message">
                          <div v-for="value in messages">
                          <p>{{value.message}}</p>
                          <small>{{value.user.name}}</small>
                          </div>
                              <form id="chatme" name="chatme">
                              <input v-model="messageText" name="message" type="text"/>
                              
                              <button @click.prevent="send">Send</button>
                              </form>


                          </div>

                          <div id="messages"></div>
                  </div>
                </div>

            </div>
        </div>

        
        
         

        <script type="text/javascript" src="<?php echo e(url('js/app.js')); ?>">

        </script>

        <script>



        </script>

    </body>
</html>
