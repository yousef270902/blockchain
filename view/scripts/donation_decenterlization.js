
let account;
const connectmetamask = async () => {
    if(window.ethereum !== "undefined") {
        const accounts = await ethereum.request({ method: "eth_requestAccounts"});
        account = accounts[0];
         alert("your metamask account "+account);
    }
} 
const connectcontract = async()=>{
    const ABI=[[
        {
            "inputs": [],
            "name": "get_last_certificate",
            "outputs": [
                {
                    "internalType": "uint256",
                    "name": "",
                    "type": "uint256"
                },
                {
                    "internalType": "string",
                    "name": "",
                    "type": "string"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "string",
                    "name": "name",
                    "type": "string"
                },
                {
                    "internalType": "string",
                    "name": "date",
                    "type": "string"
                },
                {
                    "internalType": "uint256",
                    "name": "range",
                    "type": "uint256"
                }
            ],
            "name": "set_certificate",
            "outputs": [],
            "stateMutability": "nonpayable",
            "type": "function"
        }
    ]] 
        


    const Address="0x05BE3d7fb68F5bb7CaBd835A53188e4472FDA54E";
    window.web3 = await new Web3(window.ethereum);
    window.contract = await new window.web3.eth.Contract(ABI, Address);
    alert("contract seccuses");
}
const getdata = async () => {
    const data = await window.contract.methods.get_last_certificate().call();
    alert( "get contract:"+ data);
}

    const senddata = async () => {
    const title = document.getElementById("title").value;
    const target = document.getElementById("target").value;
    const end = document.getElementById("end").value;
    await window.contract.methods.set_certificate(title,end,target).send({ from: account });
     
}