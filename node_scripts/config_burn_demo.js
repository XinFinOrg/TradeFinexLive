const argv = require("yargs").argv;
const _ = require("lodash");

const networkConfig = {
  apothem: {
    privKey: "",
    chainId: 51,
    rpc: "https://rpc.apothem.network"
  },
  xinfin: {
    privKey: "",
    chainId: 50,
    rpc: "https://rpc.xinfin.network"
  },
  rinkeby: {
    privKey: "",
    chainId: 4,
    rpc: "https://rinkeby.infura.io"
  }
};

let network = "apothem";
let burnPercent = 20;
let threshold = 3000000000000000000000; // def set to 3000 XDC

if (!_.isEmpty(argv["network"])) {
  if (Object.keys(networkConfig).includes(argv["network"])) {
    if (
      _.isEmpty(networkConfig[argv["network"]].rpc) ||
      _.isEmpty(networkConfig[argv["network"]].chainId)
    ) {
      console.log("error");
      console.log("incomplete setup for network ", argv["network"]);
      network = null;
    } else {
      network = argv["network"];
    }
  }
}

if (argv["burnPercent"] !== undefined || _.isNumber(argv["burnPercent"])) {
  try {
    const newBurnPercent = parseFloat(argv["burnPercent"]);
    if (newBurnPercent <= 100 && newBurnPercent >= 0) {
      burnPercent = newBurnPercent;
    }
  } catch (err0) {
    console.log("error");
    console.log(err0);
    network = null;
  }
}

if (_.isNumber(argv["threshold"])) {
  if (argv["threshold"] > 0) {
    threshold = argv["threshold"];
  }
}

exports.networkName = network;
exports.networkConfig = networkConfig[network];
exports.burnPercent = burnPercent;
exports.threshold = threshold;
