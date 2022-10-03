<template>
    <div class="row">
        <div class="col-8">
            <div class="card card-default">
                <div class="card-header">Notifications</div>
               
            </div>
           
        </div>
    </div>
</template>
<script>
    export default {
        props:['user_id'],
        data() {
            return {
                messages: [],
            }
        },
        created() {
                   console.log('Echo');
        Echo.join('fofo')
           .listen( ".examplee",
            e => {
                console.log(e);
            });  
            Echo.join(`chat.unread_messages.${this.user_id}`)
               
                .listen('UnReadMessages',(event) => {
                    console.log(event);
                    //this.messages.push(event.message);
                })

                console.log(Echo);
        },
        methods: {
          
        }
    }
</script>
<style scoped>
</style>