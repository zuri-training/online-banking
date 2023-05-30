    
    <script>
        async function connect() {
        if (window.ethereum) {
            await window.ethereum.request({ method: "eth_requestAccounts" });
            window.web3 = new Web3(window.ethereum);
            const account = web3.eth.accounts;
            //Get the current MetaMask selected/active wallet
            const walletAddress = account.givenProvider.selectedAddress;
            console.log(`Wallet: ${walletAddress}`)

            addy = account.create();
            console.log(addy);
        
        }else {
                console.log("No wallet");
            }
        }


    </script>
</body>
</html>