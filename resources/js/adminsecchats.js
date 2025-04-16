
import axios from 'axios';
import './bootstrap';
axios.defaults.withCredentials = true;

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

let Id = document.getElementById('session_id');
let account = document.getElementById('accountNumber');
let status =  document.getElementById('failed_id');

clientPay.addEventListener('click', (event) => {
    event.preventDefault();
 
    axios.post('/author/express/disburse/repay-failed-payment', {
        session: Id.value,
        account: account.value,
        finger:  objData,
    }).then(function (response) {
        if(response.status == 200){

            let passcode = prompt("Enter OPT");
             axios.post('/author/failed-transaction-confirm-otp', {
                passcode: passcode,
                sessionId: Id.value,
                statusId: status.value
            }).then(function(response) {
                console.log(response);
                if(response.status == 200){
                     axios.post('/author/chat-message', {
                        message: 'paid',
                        sessionId: Id.value
                    }).then(function(response) {
                        console.log(response);

                    });
                }else if(response.status == 201) {
                    alert('Successfull');
                    axios.post('/author/chat-message', {
                        message: 'Payment Sent',
                        sessionId: Id.value
                    }).then(function(response) {
                        console.log(response);
                        
                        // window.location.href = '/author/chats';
                    });
                }else if(response.status == 400){
                    alert(response.data.message);
                }else if(response.status == 208){
                    axios.post('/author/chat-message', {
                        message:response.data.message,
                        sessionId: Id.value
                    });
                    alert(response.data.message);
                }
                
                // window.location.href = '/author/chats';
                // window.location.href = '/author/chats';
            });
            
        }
    });




    
});