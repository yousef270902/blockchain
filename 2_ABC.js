var MyContract = artifacts.require("ABC");

module.exports = function(deployer) {
  // deployment steps
  deployer.deploy(MyContract);
};
