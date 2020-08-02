const Xdc3 = require("xdc3");
const argv = require("yargs").argv;
const _ = require("lodash");

if (_.isEmpty(argv) || _.isEmpty(argv["func"])) {
  console.log("error");
  console.log("[*] arguements missing, quiting . . . ");
  process.exit(1);
}

// default network to XinFin Apothem
const httpProvider = argv["httpProvider"] || "http://rpc.apothem.network";
const chainId = argv["chainId"] || "51";

const xdc3 = new Xdc3(new Xdc3.providers.HttpProvider(httpProvider));

if (xdc3.currentProvider == null) {
  console.log("error");
  console.log(
    `[*] coounld not connect to provider ${httpProvider}, quiting . . .`
  );
  process.exit(1);
}

switch (argv["func"]) {
  case "createAcnt": {
    const newAccount = xdc3.eth.accounts.create();
    console.log(newAccount);
    break;
  }
  // eg: xdcfbf04231511cc979094cf2ece68820f68b2dd1e7
  case "getBal": {
    if (_.isEmpty(argv["addr"])) {
      console.log("error");
      console.log("[*] no address provided, quiting . . .");
      process.exit(1);
    }
    if (!xdc3.utils.isAddress(argv["addr"])) {
      console.log("error");
      console.log("[*] invalid address, quiting . . .");
      process.exit(1);
    }
    xdc3.eth
      .getBalance(argv["addr"])
      .then(console.log)
      .catch(e => {
        console.log("error");
        console.log("[*] error while fetching the balance: ", e);
        process.exit(1);
      });
    break;
  }

  // arguements: privKey, to, value ( opt ) , encodedData ( opt ), gas ( opt ), gasPrice ( opt )
  case "signTx": {
    if (_.isEmpty(argv["privKey"]) || _.isEmpty(argv["to"])) {
      console.log("error");
      console.log("[*] arguements provided, quiting . . .");
      process.exit(1);
    }

    if (_.isEmpty(argv["encodedData"]) && typeof argv["value"] === "number" && _.isEmpty(argv["value"].toString()))  {
      console.log("error");
      console.log("[*] data & value both empty, quiting . . .");
      process.exit(1);
    }

    if (!xdc3.utils.isAddress(argv["to"])) {
      console.log("error");
      console.log("[*] invlid to address, quiting . . .");
      process.exit(1);
    }

    const account = xdc3.eth.accounts.privateKeyToAccount("0x"+argv["privKey"]);

    if (_.isEmpty(account)) {
      console.log("error");
      console.log("[*] invalid private key, quiting . . .");
      process.exit(1);
    }

    xdc3.eth
      .getGasPrice()
      .then(_gasPrice => {
        xdc3.eth.getTransactionCount("xdc"+account.address.slice(2),"pending").then(nonce => {
          const gasPrice = _.isEmpty(argv["gasPrice"])
            ? _gasPrice
            : argv["gasPrice"];
          const gas = argv["gasPrice"] || 2000000;
          const rawTx = {
            to: argv["to"],
            from: account.address,
            gas: gas,
            gasPrice: gasPrice,
            nonce: nonce,
            chainId: chainId
          };

          if (!_.isEmpty(argv["encodedData"])) {
            rawTx["data"] = argv["encodedData"];
          }

          if (!_.isEmpty(argv["value"])) {
            rawTx["value"] = argv["value"];
          }

          xdc3.eth.accounts
            .signTransaction(rawTx, "0x"+argv["privKey"])
            .then(signed => {
              xdc3.eth
                .sendSignedTransaction(signed.rawTransaction)
                .on("receipt", receipt => {
                  console.log(receipt);
                });
            });
        });
      })
      .catch(e => {
        console.log("error");
        console.log("[*] error while executing signTx", e);
        process.exit(1);
      });
    break;
  }
  default: {
    console.log("error");
    console.log("[*] unknown functionality, quiting");
    process.exit(1);
  }
}
