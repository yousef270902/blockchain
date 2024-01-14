
// SPDX-License-Identifier: MIT
pragma solidity ^0.8.0;
contract smart
{
    int amount;
    string name;
    function setname(string memory n, int value) public 
    {
amount=value;
name=n;
    }
    function getname() public view returns(string memory ,int)
    {
 return(name,amount);
    }

}