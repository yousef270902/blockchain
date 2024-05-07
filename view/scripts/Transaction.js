// Connect to Ganache or your local blockchain node
const web3 = new Web3('http://localhost:7545'); // Update with your Ganache URL

// Get the latest block number
web3.eth.getBlockNumber().then(async blockNumber => {
    const transactionTable = document.getElementById('transactionTable');

    // Iterate through each block
    for (let i = 0; i <= blockNumber; i++) {
        // Get the block
        const block = await web3.eth.getBlock(i);

        // Iterate through each transaction in the block
        for (const transactionHash of block.transactions) {
            // Get the transaction details getTransaction()=>from,to,value related transaction hash
            const transaction = await web3.eth.getTransaction(transactionHash);

            // Create a new row in the table
            const newRow = transactionTable.insertRow();

            // Insert transaction details into the row cells
            newRow.insertCell().textContent = block.number;
            newRow.insertCell().textContent = transaction.from;
            newRow.insertCell().textContent = transaction.to;
            newRow.insertCell().textContent = web3.utils.fromWei(transaction.value,'ether');
        }
    }
});