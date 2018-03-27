class Chat {
    constructor(callbackName) {
        this.callbackName = callbackName;
        this.plugins = {};
        this.plugins.html = new Html();
        this.plugins.chatWindow = new ChatWindow(this.callbackName);
        this.plugins.chatAjax = new ChatAjax(this.callbackName);
        window[this.callbackName] = this;
        this.init();
    }

    init(){
        document.querySelector(this.plugins.chatWindow.chatSubmitBtn).setAttribute('onClick','javascript:'+this.callbackName+'.submitMessage();');
        var connectStatus = this.plugins.chatAjax.connect();
        connectStatus.then(function(response){
            var htmlJson = {"tag":"div","children":[{"tag":"i","text":response.message}]};
            var html = window['chat'].plugins.html.createHtmlFromJSON(htmlJson);

            document.querySelector(window['chat'].plugins.chatWindow.chatHistory).appendChild(html);

        });
        this.setTimer();
    }

    getIdentity(){
        return this.userIdentity;
    }

    setIdentity(identity){
        this.userIdentity = identity;
        return this;
    }

    readMessages(){
        var status = this.plugins.chatAjax.readNew();
        console.log(status);
    }

    // Periodically check for new messages
    setTimer(){
        var intervalID = setInterval(window[this.callbackName].readMessages, 1000); // Will alert every second.
    }

    submitMessage(){
        var message = document.querySelector(this.plugins.chatWindow.chatText).value;
        if(message.length==0) {
            return false;
        }
        // append to chat history container
        var htmlJson = {"tag":"div","children":[{"tag":"i","text":message}]};
        var listWrapper = document.createElement("div");//.setAttribute('style','position:absolute;top:'+getMouseY()+';left:'+getMouseX()+';');
        var messageHistoryEl = document.createTextNode(message);
        listWrapper.appendChild(messageHistoryEl);
        document.querySelector(this.plugins.chatWindow.chatHistory).appendChild(listWrapper);

        this.plugins.chatAjax.create({identity:this.getIdentity(),message:message});

        // clear new message input
        document.querySelector(this.plugins.chatWindow.chatText).value = '';

        console.log(message);
    };

}

class ChatWindow {
    constructor(callbackName) {
        this.callbackName = callbackName;
        this.chatWrapper = "#chat-wrapper";
        this.chatText = "#chat-text";
        this.chatHistory = "#chat-history";
        this.chatSubmitBtn = "#chat-submit-btn";
    }
}

class ChatAjax {
    constructor(callbackName) {
        this.callbackName = callbackName;
        this.server = {};
        this.server.url = {};
        this.server.url.status = "/messenger/chat/status";
        this.server.url.create = "/messenger/chat/create";
        this.server.url.read = "/messenger/chat/read";
    }
    connect(){
        return this.get(this.server.url.status);
    }
    readNew(){
        return this.get(this.server.url.read);
    }
    create(message){
        this.postData(this.server.url.create, message)
            .then(data => console.log(data)) // JSON from `response.json()` call
            .catch(error => console.error(error))
    }

    get(url){
        return fetch(url)
            .then(window[this.callbackName].ajaxStatus)
            .then(function(response) {
                return response.json();
            }).then(function(data) {
                return data;
            }).catch(function(error) {
                console.log('Request failed', error);
            });
    }

    ajaxStatus(response) {
        if (response.status >= 200 && response.status < 300) {
            return Promise.resolve(response)
        } else {
            return Promise.reject(new Error(response.statusText))
        }
    }

     postData(url, data) {
        // Default options are marked with *
        return fetch(url, {
            body: JSON.stringify(data), // must match 'Content-Type' header
            cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
            credentials: 'same-origin', // include, same-origin, *omit
            headers: {
                'user-agent': 'Mozilla/4.0 MDN Example',
                'content-type': 'application/json'
            },
            method: 'POST', // *GET, POST, PUT, DELETE, etc.
            mode: 'cors', // no-cors, cors, *same-origin
            redirect: 'follow', // *manual, follow, error
            referrer: 'no-referrer', // *client, no-referrer
        })
            .then(response => response.json()) // parses response to JSON
    }
}