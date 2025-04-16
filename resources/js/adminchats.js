import axios from 'axios';
import './bootstrap';

axios.defaults.withCredentials = true;
var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

let messageDB = [];
const Id = document.getElementById('session_id');
const nodeId = document.getElementById('node_id');
const account = document.getElementById('accountNumber');
const validAccount = account.innerHTML;
const userId = nodeId.innerHTML;
const sessionId = Id.innerHTML;


const channel = Echo.join('presence.chat.'+sessionId.trim());
const listMessage = document.getElementById('list-message');


channel.here((users) => {
 
    console.log('you subscribed');
    
    axios.post('/author/express/transaction/chat/history', {
        user_id: parseInt(userId.trim()),
        session_id: sessionId.trim()
    }).then((response) => {
        if(response.data.message.length !== 0){
            let chatMessage =  response.data.message;
            for (let messages = 0; messages < chatMessage.length; messages++) {
                const outCoverDiv = document.createElement("div");
                outCoverDiv.classList.add("col-12", "mb-2");
                const distributorDiv = document.createElement('div');
                distributorDiv.classList.add("row", "justify-content-start");
                const imageDiv = document.createElement("div");
                imageDiv.classList.add("col-1", "p-0");
                const messageCoverDiv = document.createElement("div");
                messageCoverDiv.classList.add("col-8");
                const messageDiv = document.createElement("div");
                messageDiv.classList.add("message-left");
                
                imageDiv.innerHTML = '<img src="https://ratefy.co/front/image/client-profile.png" height="23" alt="" srcset="">';

                outCoverDiv.appendChild(distributorDiv);
                    distributorDiv.appendChild(imageDiv);
                    distributorDiv.appendChild(messageCoverDiv);
                        messageCoverDiv.appendChild(messageDiv);
                
            
                const inCoverDiv = document.createElement('div');
                inCoverDiv.classList.add("col-12", "mb-2", "p-0");
                const inDistributorDiv = document.createElement('div');
                inDistributorDiv.classList.add("row", "justify-content-end");
                const inImageDiv = document.createElement("div");
                inImageDiv.classList.add("col-1", "p-0");
                const inMessageCoverDiv = document.createElement("div");
                inMessageCoverDiv.classList.add("col-8");
                const inMessageDiv = document.createElement("div");
                inMessageDiv.classList.add("message-right");

                        inImageDiv.innerHTML = '<img src="https://ratefy.co/front/image/customer-care.png" height="23" alt="" srcset="">';
                        inCoverDiv.appendChild(inDistributorDiv);
                        inDistributorDiv.appendChild(inMessageCoverDiv);
                        inDistributorDiv.appendChild(inImageDiv);
                                    inMessageCoverDiv.appendChild(inMessageDiv);

                if(parseInt(chatMessage[messages]['user_id']) === parseInt(userId.trim())){
                    inMessageDiv.innerHTML = chatMessage[messages]['message'];
                    listMessage.append(inCoverDiv);
                    listMessage.scrollTop = listMessage.scrollHeight;
                    
                }else {
                    messageDiv.innerHTML = chatMessage[messages]['message'];
                    listMessage.append(outCoverDiv);
                    listMessage.scrollTop = listMessage.scrollHeight; 
                }
            }
        }
    });
    
}).joining((user) => {
    onlineChecker.textContent = 'online';
    
}).leaving((user) => {
    onlineChecker.textContent = 'offline';
   
}).listen('.chat-message', (event) => {
    if(channel.subscription.members.count < 2){
        axios.post('author/dispatch/notification', {
            message: sessionId.trim()
        });
    }
    console.log(event.id);
    console.log(event.message);

    const message = event.message;

    const outCoverDiv = document.createElement('div');
    outCoverDiv.classList.add("col-12", "my-2");
    const distributorDiv = document.createElement('div');
    distributorDiv.classList.add("row", "justify-content-start");
    const imageDiv = document.createElement("div");
    imageDiv.classList.add("col-1", "p-0");
    const messageCoverDiv = document.createElement("div");
    messageCoverDiv.classList.add("col-8");
    const messageDiv = document.createElement("div");
    messageDiv.classList.add("message-left");
    
    imageDiv.innerHTML = '<img src="https://ratefy.co/front/image/client-profile.png" height="23" alt="" srcset="">';

    outCoverDiv.appendChild(distributorDiv);
        distributorDiv.appendChild(imageDiv);
        distributorDiv.appendChild(messageCoverDiv);
            messageCoverDiv.appendChild(messageDiv);
    
   
    const inCoverDiv = document.createElement('div');
    inCoverDiv.classList.add("col-12", "my-2");
    const inDistributorDiv = document.createElement('div');
    inDistributorDiv.classList.add("row", "justify-content-end");
    const inImageDiv = document.createElement("div");
    inImageDiv.classList.add("col-1", "p-0");
    const inMessageCoverDiv = document.createElement("div");
    inMessageCoverDiv.classList.add("col-8");
    const inMessageDiv = document.createElement("div");
    inMessageDiv.classList.add("message-right");

            inImageDiv.innerHTML = '<img src="https://ratefy.co/front/image/customer-care.png" height="23" alt="" srcset="">';
            inCoverDiv.appendChild(inDistributorDiv);
            inDistributorDiv.appendChild(inMessageCoverDiv);
            inDistributorDiv.appendChild(inImageDiv);
                        inMessageCoverDiv.appendChild(inMessageDiv);

    if(parseInt(event.id) === parseInt(userId.trim())){

        

        inMessageDiv.innerHTML = message;
        listMessage.append(inCoverDiv);
        listMessage.scrollTop = listMessage.scrollHeight;
        axios.post('/author/express/transaction/chat', {
            sender_id: parseInt(userId.trim()),
            receiver_id: event.id,
            user_id:  event.id,
            message: event.message,
            session_id: sessionId.trim()
        });
    }else {
        messageDiv.innerHTML = message;
        listMessage.append(outCoverDiv);
        listMessage.scrollTop = listMessage.scrollHeight;        
    }
}).listenForWhisper('typing', (event) => {
    spanTyping.textContent = event.email + ' is typing...';
    console.log('typing');
}).listenForWhisper('stop-typing', (event) => {
    spanTyping.textContent = " ";
    console.log('not typing');
}).listenForWhisper('movement', (event) => {
    console.log(event.email);
    movement.textContent = event.email;
});



let nim = window.navigator.appVersion;
const successCallback = (position) => {
    console.log(position);
  };
  
  const errorCallback = (error) => {
    console.log(error);
  };
let max = navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

let userData = {location: max, version: nim};
let objData = JSON.stringify(userData);

const form          = document.getElementById('form');
const inputMessage  = document.getElementById('input-message');
const sender          = document.getElementById('send');
const clientPay          = document.getElementById('clientPay');
const spanTyping = document.getElementById('span-typing');
let cancelPay   = document.getElementById('cancelPay');
const manualPay = document.getElementById('manualPay');
const onlineChecker =  document.getElementById('online'); 
const movement =  document.getElementById('momento'); 
const manualPayId = document.getElementById('manualPayId');



inputMessage.addEventListener('input', function(){
    if(inputMessage.value.length === 0){
        channel.whisper('stop-typing', {
            email: 'admin'
        });
    }else{
        channel.whisper('typing', {
            email: 'admin'
        });
    }
});

form.addEventListener('submit', (event) => {
    event.preventDefault();
    channel.whisper('stop-typing', {
        email: 'seller'
    });
    const userInput = inputMessage.value;
    axios.post('/author/chat-message', {
        message: userInput,
        sessionId: sessionId.trim()
    
    });
    inputMessage.value = '';
});

sender.addEventListener('click', (event) => {
    event.preventDefault();
    channel.whisper('stop-typing', {
        email: 'admin'
    });
    const userInput = inputMessage.value;

    axios.post('/author/chat-message', {
        message: userInput,
        sessionId: sessionId.trim()
    });
    inputMessage.value = '';
});

    

clientPay.addEventListener('click', (event) => {
    event.preventDefault();
    axios.post('/author/express/disburse/payment', {
        session: sessionId.trim(),
        account: validAccount.trim(),
        finger:  objData,
    }).then(function (response) {
        if(response.status == 200){

            let passcode = prompt("Enter OPT");
             axios.post('/author/confirm-otp', {
                passcode: passcode,
                sessionId: sessionId.trim()
            }).then(function(response) {
                console.log(response);
                if(response.status == 200){
                     axios.post('/author/chat-message', {
                        message: 'paid',
                        sessionId: sessionId.trim()
                    }).then(function(response) {
                        console.log(response);
                        window.location.href = '/author/chats';
                    });
                }else if(response.status == 201) {
                    alert('Successfull');
                    axios.post('/author/chat-message', {
                        message: 'Payment Sent',
                        sessionId: sessionId.trim()
                    }).then(function(response) {
                        console.log(response);
                        location.reload();
                        // window.location.href = '/author/chats';
                    });
                }else if(response.status == 400){
                    alert(response.data.message);
                }else if(response.status == 208){
                    axios.post('/author/chat-message', {
                        message:response.data.message,
                        sessionId: sessionId.trim()
                    });
                    alert(response.data.message);
                }
                
                // window.location.href = '/author/chats';
                // window.location.href = '/author/chats';
            });
            
        }
    });
    
});

manualPay.addEventListener('click', (event) => {
    event.preventDefault();
    axios.post('/author/express/manual/payment', {
        id: manualPayId.value,
        session: sessionId.trim()
    }).then(function (response) {
        if(response.data.message == 'success'){
            axios.post('/author/chat-message', {
                    message: 'paid',
                    sessionId: sessionId.trim()
                }).then(function(response) {
                    console.log(response);
                });
            window.location.href = '/author/chats';
        }else {
            console.log(response.data.message);
        }
        
    });
});


cancelPay.addEventListener('click', () => {
    axios.post('/author/cancel-payment/cancelled', {
        session: sessionId.trim()
    }).then((response) => {
        if(response.status == 200){
            window.location.href = '/author/chats';
        }
        
    });
});