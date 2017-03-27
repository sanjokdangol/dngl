<template id="test">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                    <div id="chat-message">
                            <div v-for="value in messages">
                            <p>{{value.message}}</p>
                            <small>{{value.user.name}}</small>
                            </div>
                                <form id="chatme" name="chatme">
                                <input v-model="messageText" name="message" type="text"/>
                                <pre>{{messageText}}</pre>
                                <button v-on:click="send">Send</button>
                                </form>


                            </div>
                            <pre>{{$data}}</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
