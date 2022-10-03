<template>
    <div class="row">
        <div class="col-8">
            <div v-if="orderStatus !=''" class="alert alert-success">{{ orderStatus }}</div>
            <div class="card card-default">
                <div class="card-header">Messages</div>
                <div class="card-body p-0">
                    <ul class="list-unstyled" style="height:300px; overflow-y:scroll" v-chat-scroll>
                        <li class="p-2" v-for="(message, index) in messages" :key="index" >
                            <strong>{{ message.user.name }}</strong>
                            {{ message.message }}
                        </li>
                    </ul>
                </div>
                <input
                    @keydown="sendTypingEvent"
                    @keyup.enter="sendMessage"
                    v-model="newMessage"
                    type="text"
                    name="message"
                    placeholder="Enter your message..."
                    class="form-control">
            </div>
            <span class="text-muted" v-if="activeUser" >{{ activeUser.name }} is typing...</span>
        </div>
        <div class="col-4">
            <div class="card card-default">
                <div class="card-header">Active Users</div>
                <div class="card-body">
                    <ul>
                        <li class="py-2" v-for="(user_val, index) in users" :key="index">
                            {{ user_val.name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:['user','to', 'order_id', 'product_id', 'product_from', 'product_to', 'from'],
        data() {
            return {
                messages: [],
                newMessage: '',
                users:[],
                activeUser: false,
                typingTimer: false,
                orderStatus: "",    
            }
        },
        created() {
            this.fetchMessages();

            console.log(Echo);

            Echo.join(`productChat.${this.product_id}-${this.product_from}-${this.product_to}`)
                .here(user => {

                    this.users = user;
                    console.log(this.users);                  
                })
                .joining(user => {
                    console.log(this.users);                  
                    this.users.push(user);
                })
                .leaving(user => {
                    axios.post(`/api/user/online_status`, {is_online: 0 });
                    this.users = this.users.filter(u => u.id != user.id);
                })
                .listen('ProductChat',(event) => {
                    console.log(event.message);
                    this.messages.push(event.message);
                })
     

                var channelName = Echo.join(`order.change_status.${this.order_id}`)
                .listen('ChangeStatus',(event) => {
                   // console.log(event);
                    this.orderStatus = event.order.status.ar_name;
                });

               // var channel = Echo.channel(channelName);

                var a = Echo.leaveChannel(channelName);
                console.log(a);
                /*channel.subscription.unbind(channel.eventFormatter.format('ChangeStatus'), function(event){
                    console.log("unsubscription");   
                    console.log(event);
                });*/

                 Echo.join(`chat.unread_messages.${this.user.id}`)
                .listen('UnReadMessages',(event) => {
                    console.log(event);
                });
               },
        methods: {
            fetchMessages() {
                axios.get(`/api/product_messages/${this.product_id}/${this.from}/${this.to}`).then(response => {
                    this.messages = response.data;
                })
            },
            sendMessage() {
                this.messages.push({
                    user: this.user,
                    message: this.newMessage
                });
                axios.post(`/api/product_messages/${this.product_id}/${this.to}`, {message: this.newMessage, to:this.to});
                this.newMessage = '';
            },
            sendTypingEvent() {
      
            }
        }
    }
</script>
<style scoped>
</style>