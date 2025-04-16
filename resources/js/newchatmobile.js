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
    dbChat();
    
}).joining((user) => {
    onlineChecker.textContent = 'online';
    
}).leaving((user) => {
    onlineChecker.addClass = "text-danger";
    
}).listen('.chat-message', (event) => {
    console.log(event);
    if(event.message == 'I have made payment'){
        dbChat();
    }
    if(event.message == 'paid'){
        showFeedBack.show();
        cancelPayment.classList.toggle("d-none");
        cancelPayment.classList.toggle("disable");
        cancelPay.classList.toggle("disable");
        // window.location.href = `express-transaction?message=${sessionId.trim()}`;
        // window.location.href = `home`;
    }
        const message = event.message;
    

            const leftCoverDiv = document.createElement('div');
            const leftImageCoverSeperator = document.createElement('div');
            const leftImageCover = document.createElement('div');
            const leftChatCoverSeperator = document.createElement('div');
            const leftTimeSeperator = document.createElement('div');
            const leftTimeChat 	= document.createElement('div');
            const leftChatSeperator = document.createElement('div');
            const leftChat = document.createElement('div');
            
            
            leftCoverDiv.classList.add("row", "justify-content-start");
            leftImageCoverSeperator.classList.add("col-1", "m-0", "p-0");
            leftImageCover.classList.add("chat-img", "d-flex", "align-items-top");
            leftChatCoverSeperator.classList.add("col-6");
            leftTimeSeperator.classList.add("row");
            leftTimeChat.classList.add("col-12", "d-flex", "justify-content-start");
            leftChatSeperator.classList.add("col-12");
            leftChat.classList.add("recipient-chat");

            leftImageCover.innerHTML = '<img src="https://ratefy.co/front/image/customer-care.png" alt="">';
            leftTimeChat.innerHTML = '<span class="conversation-status"><b>'+event.user.username+'</b> '+ (getCurrentTime())+'</span>';
        
            leftCoverDiv.appendChild(leftImageCoverSeperator);
                leftImageCoverSeperator.appendChild(leftImageCover);
            leftCoverDiv.appendChild(leftChatCoverSeperator);
                leftChatCoverSeperator.appendChild(leftTimeSeperator);
                    leftTimeSeperator.appendChild(leftTimeChat);
                leftChatCoverSeperator.appendChild(leftChatSeperator);
                    leftChatSeperator.appendChild(leftChat);




            const rightCoverDiv = document.createElement('div');
            const rightImageCoverSeperator = document.createElement('div');
            const rightImageCover = document.createElement('div');
            const rightChatCoverSeperator = document.createElement('div');
            const rightTimeSeperator = document.createElement('div');
            const rightTimeChat 	= document.createElement('div');
            const rightChatSeperator = document.createElement('div');
            const rightChat = document.createElement('div');
            
            
            rightCoverDiv.classList.add("row", "justify-content-end");
            rightImageCoverSeperator.classList.add("col-1", "m-0", "p-0");
            rightImageCover.classList.add("chat-img", "d-flex", "align-items-top");
            rightChatCoverSeperator.classList.add("col-6");
            rightTimeSeperator.classList.add("row");
            rightTimeChat.classList.add("col-12", "d-flex", "justify-content-end");
            rightChatSeperator.classList.add("col-12");
            rightChat.classList.add("owner-chat");

            rightImageCover.innerHTML = '<img src="https://ratefy.co/front/image/client-profile.png">';
            rightTimeChat.innerHTML = '<span class="conversation-status">'+ (getCurrentTime())+' <b>'+event.user.username+'</b></span>';
            
            rightCoverDiv.appendChild(rightChatCoverSeperator);
                rightChatCoverSeperator.appendChild(rightTimeSeperator);
                            rightTimeSeperator.appendChild(rightTimeChat);
                rightChatCoverSeperator.appendChild(rightChatSeperator);
                            rightChatSeperator.appendChild(rightChat);
                rightCoverDiv.appendChild(rightImageCoverSeperator);
                    rightImageCoverSeperator.appendChild(rightImageCover);
    
        if(parseInt(event.id) === parseInt(userId.trim())){
            
            rightChat.innerHTML = message;
            listMessage.append(rightCoverDiv);
            listMessage.scrollTop = listMessage.scrollHeight;
            axios.post('/users/express/transaction/chat', {
                sender_id: parseInt(userId.trim()),
                receiver_id: event.id,
                user_id:  event.id,
                message: event.message,
                session_id: sessionId.trim()
            });
        }else {
            leftChat.innerHTML = message;
            listMessage.append(leftCoverDiv);
            listMessage.scrollTop = listMessage.scrollHeight;
        } 

        
}).listenForWhisper('typing', (event) => {
    spanTyping.textContent = event.email + ' is typing...';
}).listenForWhisper('stop-typing', (event) => {
    spanTyping.textContent = " ";
});

let cancelPayment = document.getElementById("cancel-payment-toggler");

const form = document.getElementById('form');
const inputMessage = document.getElementById('input-message');
const listMessage = document.getElementById('list-message');
const sender = document.getElementById('send');
const spanTyping = document.getElementById('span-typing');
const onlineChecker =  document.getElementById('online'); 
let cancelPay   = document.getElementById('cancelPay');

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

function dbChat() {
    axios.post('/users/express/transaction/chat/history', {
        user_id: parseInt(userId.trim()),
        session_id: sessionId.trim()
    }).then((response) => {
        console.log(response);
         if(response.data.message.length !== 0){
            let chatMessage =  response.data.message;
            for (let messages = 0; messages < chatMessage.length; messages++) {

                    const leftCoverDiv = document.createElement('div');
                    const leftImageCoverSeperator = document.createElement('div');
                    const leftImageCover = document.createElement('div');
                    const leftChatCoverSeperator = document.createElement('div');
                    const leftTimeSeperator = document.createElement('div');
                    const leftTimeChat 	= document.createElement('div');
                    const leftChatSeperator = document.createElement('div');
                    const leftChat = document.createElement('div');
                    
                    
                    leftCoverDiv.classList.add("row", "justify-content-start");
                    leftImageCoverSeperator.classList.add("col-1", "m-0", "p-0");
                    leftImageCover.classList.add("chat-img", "d-flex", "align-items-top");
                    leftChatCoverSeperator.classList.add("col-8");
                    leftTimeSeperator.classList.add("row");
                    leftTimeChat.classList.add("col-12", "d-flex", "justify-content-start");
                    leftChatSeperator.classList.add("col-12");
                    leftChat.classList.add("recipient-chat");

                    leftImageCover.innerHTML = '<img src="https://ratefy.co/front/image/customer-care.png" alt="">';
                    leftTimeChat.innerHTML = '<span class="conversation-status"><b>Admin</b> '+ (convertData(new Date(chatMessage[messages]['created_at'])))+'</span>';
                
                    leftCoverDiv.appendChild(leftImageCoverSeperator);
                        leftImageCoverSeperator.appendChild(leftImageCover);
                    leftCoverDiv.appendChild(leftChatCoverSeperator);
                        leftChatCoverSeperator.appendChild(leftTimeSeperator);
                            leftTimeSeperator.appendChild(leftTimeChat);
                        leftChatCoverSeperator.appendChild(leftChatSeperator);
                            leftChatSeperator.appendChild(leftChat);

                const rightCoverDiv = document.createElement('div');
                const rightImageCoverSeperator = document.createElement('div');
                const rightImageCover = document.createElement('div');
                const rightChatCoverSeperator = document.createElement('div');
                const rightTimeSeperator = document.createElement('div');
                const rightTimeChat 	= document.createElement('div');
                const rightChatSeperator = document.createElement('div');
                const rightChat = document.createElement('div');
                
                
                rightCoverDiv.classList.add("row", "justify-content-end");
                rightImageCoverSeperator.classList.add("col-1", "m-0", "p-0");
                rightImageCover.classList.add("chat-img", "d-flex", "align-items-top");
                rightChatCoverSeperator.classList.add("col-8");
                rightTimeSeperator.classList.add("row");
                rightTimeChat.classList.add("col-12", "d-flex", "justify-content-end");
                rightChatSeperator.classList.add("col-12");
                rightChat.classList.add("owner-chat");

                rightImageCover.innerHTML = '<img src="https://ratefy.co/front/image/client-profile.png">';
                rightTimeChat.innerHTML = '<span class="conversation-status">'+ (convertData(new Date(chatMessage[messages]['created_at'])))+' <b>Client</b></span>';
                
                rightCoverDiv.appendChild(rightChatCoverSeperator);
                    rightChatCoverSeperator.appendChild(rightTimeSeperator);
                                rightTimeSeperator.appendChild(rightTimeChat);
                    rightChatCoverSeperator.appendChild(rightChatSeperator);
                                rightChatSeperator.appendChild(rightChat);
                rightCoverDiv.appendChild(rightImageCoverSeperator);
                    rightImageCoverSeperator.appendChild(rightImageCover);



                if(parseInt(chatMessage[messages]['user_id']) === parseInt(userId.trim())){
                    rightChat.innerHTML = chatMessage[messages]['message'];
                    listMessage.append(rightCoverDiv);
                    listMessage.scrollTop = listMessage.scrollHeight;
                }else {
                    leftChat.innerHTML = chatMessage[messages]['message'];
                    listMessage.append(leftCoverDiv);
                    listMessage.scrollTop = listMessage.scrollHeight;
                }
            } 
        }
    });
}

function convertData(timestring) 
{
    let date = timestring;
    return  date.toDateString() + ", " +date.getHours() + ":" + date.getMinutes();
}

function getUsername(username) 
{
    let mainuser = '';
    axios.post('/users/username',{
        userId: username
    }).then((response) => {
        console.log(response);
        mainuser = response.data;
    });

    return mainuser;
}

function getCurrentTime() {
    var today = new Date();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = time;
    return dateTime;
}

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