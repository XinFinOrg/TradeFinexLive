var Web3 = require("xdc3");

var web3 = new Web3(new Web3.providers.HttpProvider("https://rpc.xinfin.network"));

account = web3.eth.accounts.create();
var address = account.address;
address = "xdc" + address.substr(2, 40);
console.log(JSON.stringify({"address": address, "privateKey": account.privateKey}));