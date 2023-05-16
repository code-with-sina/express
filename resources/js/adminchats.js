import axios from 'axios';
import './bootstrap';


var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

let messageDB = [];
const Id = document.getElementById('session_id');
const nodeId = document.getElementById('node_id');
const account = document.getElementById('accountNumber');
const validAccount = account.innerHTML;
const userId = nodeId.innerHTML;
const sessionId = Id.innerHTML;


const gateway = Echo.join(`gateway.pay.${sessionId.trim()}`);
gateway.here((user) => {
    console.log(user);
    console.log('subscribe');
    // console.log(source);

}).joining(() => {
    console.log('gateway joining');
}).leaving(() => {
    console.log('gateway leaving');
}).listen('pay',(event)=> {
    console.log(event);

        // window.location.href = `express-transaction?message=${sessionId.trim()}`;

});

const channel = Echo.join(`presence.chat.${sessionId.trim()}`);
const listMessage = document.getElementById('list-message');
console.log(sessionId.trim());
channel.here((users) => {
    console.log(users);
    console.log('@ subscribed');
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
                
                imageDiv.innerHTML = '<img src="http://127.0.0.1:8000/front/image/Payoneer.png" alt="" srcset="">';

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

                        inImageDiv.innerHTML = '<img src="http://127.0.0.1:8000/front/image/Payoneer.png" alt="" srcset="">';
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
    console.log('join');
    
}).leaving((user) => {
    console.log('leave');
}).listen('.chat-message', (event) => {
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
    
    imageDiv.innerHTML = '<img src="http://127.0.0.1:8000/front/image/Payoneer.png" alt="" srcset="">';

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

            inImageDiv.innerHTML = '<img src="http://127.0.0.1:8000/front/image/Payoneer.png" alt="" srcset="">';
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

    

});

let saveData = localStorage.getItem("transactionData");
// localStorage.clear('transactionData');
messageDB.length < 1 ? messageDB.push(JSON.parse(saveData)) : messageDB;
console.log(JSON.parse(saveData));
console.log(sessionId);

const form          = document.getElementById('form');
const inputMessage  = document.getElementById('input-message');
const sender          = document.getElementById('send');
const clientPay          = document.getElementById('clientPay');

const manualPay = document.getElementById('manualPay');
const manualPayId = await document.getElementById('manualPayId');


form.addEventListener('submit', (event) => {
    event.preventDefault();
    const userInput = inputMessage.value;

    axios.post('/author/chat-message', {
        message: userInput,
        sessionId: sessionId.trim()
    
    });
    inputMessage.value = '';
});

sender.addEventListener('click', (event) => {
    event.preventDefault();
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
        account: validAccount.trim()
    }).then(function (response) {
        if(response.status == 200){
            console.log(response);
            axios.post('/author/chat-message', {
                message: 'paid',
                sessionId: sessionId.trim()
            }).then(function(response) {
                console.log(response);
            });
            window.location.href = '/author/chats';
            // window.location.href = '/author/chats';
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