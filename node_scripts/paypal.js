"use strict";
const argv = require("yargs").argv;
const _ = require("lodash");
const XDC3 = require("xdc3");
let network = "http://rpc.apothem.network";
const xdc3 = new XDC3(new XDC3.providers.HttpProvider(network));
if (_.isEmpty(argv["privKey"])) {
  console.error("error");
  console.error("[*] privKey is empty");
}
try {
  const accnt = xdc3.eth.accounts.privateKeyToAccount(
    argv["privKey"].toString().startsWith("0x")
      ? argv["privKey"].toString()
      : "0x" + argv["privKey"].toString()
  );
  console.log(accnt.address);
} catch (e) {
  console.error("error");
  console.error(e);
}