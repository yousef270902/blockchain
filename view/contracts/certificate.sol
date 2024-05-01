// SPDX-License-Identifier: MIT

	pragma solidity ^0.8.22;
    contract certificate
    {
         struct campign_certificate
    {
        string campaign_name;
        string campaign_date;
        uint campaign_range;

    }
    campign_certificate[]   campaign;
    function set_certificate(string memory name, string memory date , uint range) public 
    {
        campign_certificate memory new_Certificate = campign_certificate(name, date, range);
        campaign.push(new_Certificate);
    }
    function get_last_certificate() public view returns(uint,string memory)
    {
        require(campaign.length > 0, "No certificates available");
    
    campign_certificate memory lastCertificate = campaign[campaign.length - 1];
    return ( campaign.length, string.concat(" campaign name: " , lastCertificate.campaign_name));
    }
    
    }