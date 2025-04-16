import './bootstrap';
import '../sass/app.scss';



window.addEventListener('load', function(){

  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const message = urlParams.get('message');
  console.log(message);
  let orderId;

  const title = "Ratefy";
  const msg = "You have a pending message on your latest transaction";
  const icon = "https://ratefy.co/back/dist/img/logo-favicon/1672449002_36064_ratefy_logo.png";
  const song = "/front/sound/message_a.wav";



  function notifyMe() {
    if (!("Notification" in window)) {
      alert("This browser does not support Desktop notifications");
    }
    if (Notification.permission === "granted") {
      callNotify(title, msg, icon);
      return;
    }
    if (Notification.permission !== "denied") {
      Notification.requestPermission((permission) => {
        if (permission === "granted") {
          callNotify(title, msg, icon);
        }
      });
      return;
    }
  }

  function callNotify(title, msg, icone) {
    new Notification(title, { body: msg, icon: icone });
    new Audio(song).play();
  }

   

    var context = new AudioContext();

    var x = document.getElementById("myAudio"); 
    
    axios.post('/users/transaction-session')
    .then((response)=>{ 
        orderId = response.data.order_id; 
        if(orderId !== null || orderId !== null) {
            
            const channel = Echo.join(`presence.chat.${orderId}`);
            channel.here((users) => {
                
            }).joining((user) => {
               
                
            }).leaving((user) => {
                
            }).listen('.chat-message', (event) => {
                if(message == null){
                    notifyMe();
                    alert('You have a pending message on your recent order');
                    if(context.state == 'suspended'){
                        context.resume().then(() => {
                            x.play(); 

                            console.log('Playback resumed successfully');
                          });
                    }else {
                        context.resume().then(() => {
                            x.play(); 
                            console.log('Playback resumed successfully');
                          });
    
                        
                    }
                       
                }
                   
            });
            if(message == null || message == ''){
              axios.post('/author/chat-message', {
                  message: 'seller is navigating and at this page ....' + window.location.href + ' at the moment',
                  sessionId: orderId
              });
          }
        }
    });

    
   
});














