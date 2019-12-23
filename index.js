const Web3 = require("web3");
const argv = require("yargs").argv;
const _ = require("lodash");

const contractAddr = "xdc0000000000000000000000000000000000000088";
const contractAbi = [
  {
    constant: false,
    inputs: [
      {
        name: "_candidate",
        type: "address"
      }
    ],
    name: "propose",
    outputs: [],
    payable: true,
    stateMutability: "payable",
    type: "function"
  },
  {
    constant: false,
    inputs: [
      {
        name: "_candidate",
        type: "address"
      }
    ],
    name: "resign",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function"
  },
  {
    constant: false,
    inputs: [
      {
        name: "_candidate",
        type: "address"
      },
      {
        name: "_cap",
        type: "uint256"
      }
    ],
    name: "unvote",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function"
  },
  {
    constant: false,
    inputs: [
      {
        name: "_candidate",
        type: "address"
      }
    ],
    name: "vote",
    outputs: [],
    payable: true,
    stateMutability: "payable",
    type: "function"
  },
  {
    constant: false,
    inputs: [
      {
        name: "_blockNumber",
        type: "uint256"
      },
      {
        name: "_index",
        type: "uint256"
      }
    ],
    name: "withdraw",
    outputs: [],
    payable: false,
    stateMutability: "nonpayable",
    type: "function"
  },
  {
    inputs: [
      {
        name: "_candidates",
        type: "address[]"
      },
      {
        name: "_caps",
        type: "uint256[]"
      },
      {
        name: "_firstOwner",
        type: "address"
      },
      {
        name: "_minCandidateCap",
        type: "uint256"
      },
      {
        name: "_minVoterCap",
        type: "uint256"
      },
      {
        name: "_maxValidatorNumber",
        type: "uint256"
      },
      {
        name: "_candidateWithdrawDelay",
        type: "uint256"
      },
      {
        name: "_voterWithdrawDelay",
        type: "uint256"
      }
    ],
    payable: false,
    stateMutability: "nonpayable",
    type: "constructor"
  },
  {
    anonymous: false,
    inputs: [
      {
        indexed: false,
        name: "_voter",
        type: "address"
      },
      {
        indexed: false,
        name: "_candidate",
        type: "address"
      },
      {
        indexed: false,
        name: "_cap",
        type: "uint256"
      }
    ],
    name: "Vote",
    type: "event"
  },
  {
    anonymous: false,
    inputs: [
      {
        indexed: false,
        name: "_voter",
        type: "address"
      },
      {
        indexed: false,
        name: "_candidate",
        type: "address"
      },
      {
        indexed: false,
        name: "_cap",
        type: "uint256"
      }
    ],
    name: "Unvote",
    type: "event"
  },
  {
    anonymous: false,
    inputs: [
      {
        indexed: false,
        name: "_owner",
        type: "address"
      },
      {
        indexed: false,
        name: "_candidate",
        type: "address"
      },
      {
        indexed: false,
        name: "_cap",
        type: "uint256"
      }
    ],
    name: "Propose",
    type: "event"
  },
  {
    anonymous: false,
    inputs: [
      {
        indexed: false,
        name: "_owner",
        type: "address"
      },
      {
        indexed: false,
        name: "_candidate",
        type: "address"
      }
    ],
    name: "Resign",
    type: "event"
  },
  {
    anonymous: false,
    inputs: [
      {
        indexed: false,
        name: "_owner",
        type: "address"
      },
      {
        indexed: false,
        name: "_blockNumber",
        type: "uint256"
      },
      {
        indexed: false,
        name: "_cap",
        type: "uint256"
      }
    ],
    name: "Withdraw",
    type: "event"
  },
  {
    constant: true,
    inputs: [],
    name: "candidateCount",
    outputs: [
      {
        name: "",
        type: "uint256"
      }
    ],
    payable: false,
    stateMutability: "view",
    type: "function"
  },
  {
    constant: true,
    inputs: [
      {
        name: "",
        type: "uint256"
      }
    ],
    name: "candidates",
    outputs: [
      {
        name: "",
        type: "address"
      }
    ],
    payable: false,
    stateMutability: "view",
    type: "function"
  },
  {
    constant: true,
    inputs: [],
    name: "candidateWithdrawDelay",
    outputs: [
      {
        name: "",
        type: "uint256"
      }
    ],
    payable: false,
    stateMutability: "view",
    type: "function"
  },
  {
    constant: true,
    inputs: [
      {
        name: "_candidate",
        type: "address"
      }
    ],
    name: "getCandidateCap",
    outputs: [
      {
        name: "",
        type: "uint256"
      }
    ],
    payable: false,
    stateMutability: "view",
    type: "function"
  },
  {
    constant: true,
    inputs: [
      {
        name: "_candidate",
        type: "address"
      }
    ],
    name: "getCandidateOwner",
    outputs: [
      {
        name: "",
        type: "address"
      }
    ],
    payable: false,
    stateMutability: "view",
    type: "function"
  },
  {
    constant: true,
    inputs: [],
    name: "getCandidates",
    outputs: [
      {
        name: "",
        type: "address[]"
      }
    ],
    payable: false,
    stateMutability: "view",
    type: "function"
  },
  {
    constant: true,
    inputs: [
      {
        name: "_candidate",
        type: "address"
      },
      {
        name: "_voter",
        type: "address"
      }
    ],
    name: "getVoterCap",
    outputs: [
      {
        name: "",
        type: "uint256"
      }
    ],
    payable: false,
    stateMutability: "view",
    type: "function"
  },
  {
    constant: true,
    inputs: [
      {
        name: "_candidate",
        type: "address"
      }
    ],
    name: "getVoters",
    outputs: [
      {
        name: "",
        type: "address[]"
      }
    ],
    payable: false,
    stateMutability: "view",
    type: "function"
  },
  {
    constant: true,
    inputs: [],
    name: "getWithdrawBlockNumbers",
    outputs: [
      {
        name: "",
        type: "uint256[]"
      }
    ],
    payable: false,
    stateMutability: "view",
    type: "function"
  },
  {
    constant: true,
    inputs: [
      {
        name: "_blockNumber",
        type: "uint256"
      }
    ],
    name: "getWithdrawCap",
    outputs: [
      {
        name: "",
        type: "uint256"
      }
    ],
    payable: false,
    stateMutability: "view",
    type: "function"
  },
  {
    constant: true,
    inputs: [
      {
        name: "_candidate",
        type: "address"
      }
    ],
    name: "isCandidate",
    outputs: [
      {
        name: "",
        type: "bool"
      }
    ],
    payable: false,
    stateMutability: "view",
    type: "function"
  },
  {
    constant: true,
    inputs: [],
    name: "maxValidatorNumber",
    outputs: [
      {
        name: "",
        type: "uint256"
      }
    ],
    payable: false,
    stateMutability: "view",
    type: "function"
  },
  {
    constant: true,
    inputs: [],
    name: "minCandidateCap",
    outputs: [
      {
        name: "",
        type: "uint256"
      }
    ],
    payable: false,
    stateMutability: "view",
    type: "function"
  },
  {
    constant: true,
    inputs: [],
    name: "minVoterCap",
    outputs: [
      {
        name: "",
        type: "uint256"
      }
    ],
    payable: false,
    stateMutability: "view",
    type: "function"
  },
  {
    constant: true,
    inputs: [],
    name: "voterWithdrawDelay",
    outputs: [
      {
        name: "",
        type: "uint256"
      }
    ],
    payable: false,
    stateMutability: "view",
    type: "function"
  }
];

const web3 = new Web3(
  new Web3.providers.HttpProvider("http://rpc.xinfin.network")
);
const contarctInst = new web3.eth.Contract(
  contractAbi,
  "0x" + contractAddr.toLowerCase().slice(3)
);

const privKey = argv["privKey"];
if (_.isEmpty(privKey)){
    console.log("error");
    console.log("privKey is empty");
    return;
}

contarctInst.methods
  .getCandidates()
  .call()
  .then(resp => {
    const account = web3.eth.accounts.privateKeyToAccount(privKey);
    console.log(resp.includes(account.address));
});