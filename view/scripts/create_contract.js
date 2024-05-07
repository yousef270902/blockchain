 

let account;
const connectmeta = async () => {
    if(window.ethereum !== "undefined") {
        const accounts = await ethereum.request({ method: "eth_requestAccounts"});
        account = accounts[0];
         alert("your metamask account "+account);
    }
} 


 