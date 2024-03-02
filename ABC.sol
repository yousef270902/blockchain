// SPDX-License-Identifier: UNLICENSED
pragma solidity ^0.8.19;
contract ABC{
    uint256 a;
    function setter(uint256 _a) public
    {
        a=_a;
    }
    function getter() public view returns(uint256)
    {
        return a;
    }
}