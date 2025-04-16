import './bootstrap';
import '../sass/app.scss';

const Id = document.getElementById('user_id');
const userId = Id.innerHTML;

const newId = document.getElementById('session_id');
const sessionId = newId.innerHTML;
let messageDB = [];

axios.defaults.withCredentials = true;

const channel = Echo.join(`presence.chat.${sessionId.trim()}`);


channel.here((users) => {
    console.log('subed');
    
    axios.post('/users/express/transaction/chat/history', {
        user_id: parseInt(userId.trim()),
        session_id: sessionId.trim()
    }).then((response) => {
         if(response.data.message.length !== 0){
            let chatMessage =  response.data.message;
            for (let messages = 0; messages < chatMessage.length; messages++) {

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
                
                imageDiv.innerHTML = '<img src="https://ratefy.co/front/image/customer-care.png" height="23" alt="" srcset="">';
            
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
            
                        inImageDiv.innerHTML = '<img src="https://ratefy.co/front/image/client-profile.png" height="23" alt="" srcset="">';
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
    onlineChecker.textContent = 'wait a minute';
    onlineChecker.addClass = "text-danger";
    
}).listen('.chat-message', (event) => {
    console.log(event);
    if(event.message == 'paid'){
        window.location.href = `express-transaction?message=${sessionId.trim()}`;
        // window.location.href = `home`;
    }
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
        
        imageDiv.innerHTML = '<img src="https://ratefy.co/front/image/customer-care.png" height="23" alt="" srcset="">';
    
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
    
                inImageDiv.innerHTML = '<img src="https://ratefy.co/front/image/client-profile.png" height="23" alt="" srcset="">';
                inCoverDiv.appendChild(inDistributorDiv);
                inDistributorDiv.appendChild(inMessageCoverDiv);
                inDistributorDiv.appendChild(inImageDiv);
                            inMessageCoverDiv.appendChild(inMessageDiv);
    
        if(parseInt(event.id) === parseInt(userId.trim())){
    
            inMessageDiv.innerHTML = message;
            listMessage.append(inCoverDiv);
            listMessage.scrollTop = listMessage.scrollHeight;
            axios.post('/users/express/transaction/chat', {
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
}).listenForWhisper('stop-typing', (event) => {
    spanTyping.textContent = " ";
});



const form = document.getElementById('form');
const inputMessage = document.getElementById('input-message');
const listMessage = document.getElementById('list-message');
const sender = document.getElementById('send');
const spanTyping = document.getElementById('span-typing');
const onlineChecker =  document.getElementById('online'); 
let cancelPay   = document.getElementById('cancelPay');

onlineChecker.textContent = 'wait a minute';
inputMessage.addEventListener('input', function(){
    if(inputMessage.value.length == 0){
        channel.whisper('stop-typing', {
            email: 'seller'
        });
    }else{
        channel.whisper('typing', {
            email: 'seller'
        });
    }
    
});

form.addEventListener('submit', (event) => {
    event.preventDefault();
    channel.whisper('stop-typing', {
        email: 'seller'
    });
    const userInput = inputMessage.value;

    axios.post('/users/chat-message', {
        message: userInput,
        sessionId: sessionId.trim()
    });
    inputMessage.value = '';
});

sender.addEventListener('click', (event) => {
    event.preventDefault();
    const userInput = inputMessage.value;

    axios.post('/users/chat-message', {
        message: userInput,
        sessionId: sessionId.trim()
    });
    inputMessage.value = '';
});

cancelPay.addEventListener('click', () => {
    axios.post('/users/cancel-payment/cancelled', {
        session: sessionId.trim()
    }).then((response) => {
    
        if( response.status == 200){
            window.location.href = '/users/activity';
        }
    });
});