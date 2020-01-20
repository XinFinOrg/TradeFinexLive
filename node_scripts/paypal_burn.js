const Web3 = require("web3");
const axios = require("axios");
const config = require("./config_burn_demo");
const argv = require("yargs").argv;
const _ = require("lodash");

let amnt = 0;

if (config.networkName === null) {
  console.log("error");
  console.log("invalid config for setup");
  return;
}

if (argv["amnt"] === undefined || !_.isNumber(argv["amnt"])) {
  console.log("error");
  console.log("invalid amount provided");
  return;
} else {
  amnt = argv["amnt"];
}

const coinMarketCapAPI =
  "https://api.coinmarketcap.com/v1/ticker/xinfin-network/";

const burnAddress = "0x0000000000000000000000000000000000000000";

const divisor = 1; // for testing purposes 1 million'th of actual value will be used

/**
 * PaypalBurnToken will burn XDC tokens based on the amount input on the given chainId.
 * The BurnPercent can be regulated from config.js
 * @param {number} amount
 * @param {string} chainId
 */
async function paypalBurnToken(amount) {
  try {
    const currNetwork = config.networkConfig.rpc;
    if (currNetwork.startsWith("wss")) {
      // is a websockect provider
      web3 = new Web3(new Web3.providers.WebsocketProvider(currNetwork));
    } else if (currNetwork.startsWith("http")) {
      // is http provider
      web3 = new Web3(new Web3.providers.HttpProvider(currNetwork));
    } else {
      console.log("error");
      console.log("unknown network provider type");
      return;
    }
    const amnt_usd = amount;
    const amnt_xdc = await getXinEquivalent(amnt_usd);
    if (amnt_xdc == -1) {
      console.log("error");
      console.error("error occured while fetching the CMC data");
      return;
    }

    let burnPercent = config.burnPercent;
    // console.log("burnPercent: ", burnPercent);
    const burn_amnt = Math.round((burnPercent * amnt_xdc) / 100);
    if (burn_amnt <= 0) {
      console.log("error");
      console.log(`burn-amount is zero, quiting`);
      return;
    }

    let currPrivKey = config.networkConfig.privKey;
    if (!currPrivKey.startsWith("0x")) {
      currPrivKey = "0x" + currPrivKey;
    }
    const account = web3.eth.accounts.privateKeyToAccount(currPrivKey);

    const accountBalance = await web3.eth.getBalance(account.address);
    if (accountBalance < config.threshold && accountBalance >= burn_amnt) {
      // console.log("warning");
      // console.log("threshold reached");
    } else if (accountBalance < burn_amnt) {
      console.log("error");
      console.error("insufficient balance");
      return;
    }

    const signed = await makePayment(
      "",
      burnAddress,
      currPrivKey,
      config.networkConfig.chainId,
      burn_amnt,
      web3
    );
    web3.eth
      .sendSignedTransaction(signed.rawTransaction)
      .then(async receipt => {
        if (receipt.status === true) {
          // console.log("success");
          console.log(receipt);
          return;
        }
        // console.log("error");
        // console.log("execution failed");
        console.log(receipt);
      })
      .catch(e => {
        console.log("error");
        console.log(e);
      });
  } catch (err) {
    console.log("error");
    console.log(err);
    return;
  }
}

async function makePayment(encodedData, toAddr, privKey, chainId, value, web3) {
  // const estimateGas = await web3.eth.estimateGas({ data: encodedData }); //  this throws an error 'tx will always fail or gas will exceed allowance'
  const account = web3.eth.accounts.privateKeyToAccount(privKey);
  const rawTx = {
    to: toAddr,
    from: account.address,
    gas: 1000000,
    gasPrice: await web3.eth.getGasPrice(),
    nonce: await web3.eth.getTransactionCount(account.address),
    data: encodedData,
    chainId: chainId + "",
    value: value.noExponents()
  };
  const signed = await web3.eth.accounts.signTransaction(rawTx, privKey);
  return signed;
}

async function getXinEquivalent(amnt) {
  try {
    const currXinPrice = await axios.get(coinMarketCapAPI);
    if (
      currXinPrice.data[0] != undefined ||
      currXinPrice.data[0] != undefined
    ) {
      return (
        (parseFloat(amnt) /
          parseFloat(currXinPrice.data[0].price_usd * divisor)) *
        Math.pow(10, 18)
      );
    }
  } catch (e) {
    console.log("error");
    console.error(
      "Some error occurred while making or processing call from CoinMarketCap"
    );
    console.log(e);
    return -1;
  }
}

Number.prototype.noExponents = function() {
  let data = String(this).split(/[eE]/);
  if (data.length == 1) return data[0];

  let z = "",
    sign = this < 0 ? "-" : "",
    str = data[0].replace(".", ""),
    mag = Number(data[1]) + 1;

  if (mag < 0) {
    z = sign + "0.";
    while (mag++) z += "0";
    return z + str.replace(/^\-/, "");
  }
  mag -= str.length;
  while (mag--) z += "0";
  return str + z;
};

paypalBurnToken(amnt);
