<?php
/*
--------------------------------------------------------------------
              ///  WHMCS DOMAIN ADDITIONAL FIELDS  \\\
--------------------------------------------------------------------

This is where you can define the TLD specific fields required to
register certain TLDs. Supported variables are:

  Name - key name used to reference field in modules (required)
  DisplayName - name displayed in client & admin interfaces
  LangVar - the language file variable to use if set
  Type - field type: text, dropdown, radio, tickbox (required)
  Size - the length of the text field
  Default - the default value the field should take
  Required - force entry - true/false

--------------------------------------------------------------------
*/

// .US

$additionaldomainfields['.us'][] = ['Name' => 'Nexus Category', 'LangVar' => 'ustldnexuscat', 'Type' => 'dropdown', 'Options' => 'C11,C12,C21,C31,C32', 'Default' => 'C11'];
$additionaldomainfields['.us'][] = ['Name' => 'Nexus Country', 'LangVar' => 'ustldnexuscountry', 'Type' => 'text', 'Size' => '20', 'Default' => '', 'Required' => true];
$additionaldomainfields['.us'][] = ['Name' => 'Application Purpose', 'LangVar' => 'ustldapppurpose', 'Type' => 'dropdown', 'Options' => 'Business use for profit,Non-profit business,Club,Association,Religious Organization,Personal Use,Educational purposes,Government purposes', 'Default' => 'Business use for profit'];

// .UK

$additionaldomainfields['.co.uk'][] = ['Name' => 'Legal Type', 'LangVar' => 'uktldlegaltype', 'Type' => 'dropdown', 'Options' => 'Individual,UK Limited Company,UK Public Limited Company,UK Partnership,UK Limited Liability Partnership,Sole Trader,UK Registered Charity,UK Entity (other),Foreign Organization,Other foreign organizations', 'Default' => 'Individual'];
$additionaldomainfields['.co.uk'][] = ['Name' => 'Company ID Number', 'LangVar' => 'uktldcompanyid', 'Type' => 'text', 'Size' => '30', 'Default' => '', 'Required' => false];
$additionaldomainfields['.co.uk'][] = ['Name' => 'Registrant Name', 'LangVar' => 'uktldregname', 'Type' => 'text', 'Size' => '30', 'Default' => '', 'Required' => true];
$additionaldomainfields['.net.uk'] = $additionaldomainfields['.co.uk'];
$additionaldomainfields['.org.uk'] = $additionaldomainfields['.co.uk'];
$additionaldomainfields['.me.uk'] = $additionaldomainfields['.co.uk'];
$additionaldomainfields['.plc.uk'] = $additionaldomainfields['.co.uk'];
$additionaldomainfields['.ltd.uk'] = $additionaldomainfields['.co.uk'];
$additionaldomainfields['.co.uk'][] = ['Name' => 'WHOIS Opt-out', 'LangVar' => 'uktldwhoisoptout', 'Type' => 'tickbox'];

// .CA

$additionaldomainfields['.ca'][] = ['Name' => 'Legal Type', 'LangVar' => 'catldlegaltype', 'Type' => 'dropdown', 'Options' => 'Corporation,Canadian Citizen,Permanent Resident of Canada,Government,Canadian Educational Institution,Canadian Unincorporated Association,Canadian Hospital,Partnership Registered in Canada,Trade-mark registered in Canada,Canadian Trade Union,Canadian Political Party,Canadian Library Archive or Museum,Trust established in Canada,Aboriginal Peoples,Legal Representative of a Canadian Citizen,Official mark registered in Canada', 'Default' => 'Corporation', 'Description' => 'Legal type of registrant contact'];
$additionaldomainfields['.ca'][] = ['Name' => 'CIRA Agreement', 'LangVar' => 'catldciraagreement', 'Type' => 'tickbox', 'Description' => "Tick to confirm you agree to the CIRA Registration Agreement shown below<br /><blockquote>You have read, understood and agree to the terms and conditions of the Registrant Agreement, and that CIRA may, from time to time and at its discretion, amend any or all of the terms and conditions of the Registrant Agreement, as CIRA deems appropriate, by posting a notice of the changes on the CIRA website and by sending a notice of any material changes to Registrant. You meet all the requirements of the Registrant Agreement to be a Registrant, to apply for the registration of a Domain Name Registration, and to hold and maintain a Domain Name Registration, including without limitation CIRA's Canadian Presence Requirements for Registrants, at: www.cira.ca/assets/Documents/Legal/Registrants/CPR.pdf. CIRA will collect, use and disclose your personal information, as set out in CIRA's Privacy Policy, at: www.cira.ca/assets/Documents/Legal/Registrants/privacy.pdf</blockquote>"];
$additionaldomainfields['.ca'][] = ['Name' => 'WHOIS Opt-out', 'LangVar' => 'catldwhoisoptout', 'Type' => 'tickbox', 'Description' => 'Tick to hide your contact information in CIRA WHOIS (only available to individuals)'];

// .ES

$additionaldomainfields['.es'][] = ['Name' => 'ID Form Type', 'LangVar' => 'estldidformtype', 'Type' => 'dropdown', 'Options' => 'Other Identification,Tax Identification Number,Tax Identification Code,Foreigner Identification Number', 'Default' => 'Other Identification'];
$additionaldomainfields['.es'][] = ['Name' => 'ID Form Number', 'LangVar' => 'estldidformnum', 'Type' => 'text', 'Size' => '30', 'Default' => '', 'Required' => true];

// .SG

$additionaldomainfields['.sg'][] = ['Name' => 'RCB/Singapore ID', 'LangVar' => 'sgtldrcbid', 'Type' => 'text', 'Size' => '30', 'Default' => '', 'Required' => true];
$additionaldomainfields['.sg'][] = ['Name' => 'Registrant Type', 'LangVar' => 'sgtldregtype', 'Type' => 'dropdown', 'Options' => 'Individual,Organisation', 'Default' => 'Individual'];
$additionaldomainfields['.com.sg'] = $additionaldomainfields['.sg'];
$additionaldomainfields['.edu.sg'] = $additionaldomainfields['.sg'];
$additionaldomainfields['.net.sg'] = $additionaldomainfields['.sg'];
$additionaldomainfields['.org.sg'] = $additionaldomainfields['.sg'];
$additionaldomainfields['.per.sg'] = $additionaldomainfields['.sg'];

// .TEL

$additionaldomainfields['.tel'][] = ['Name' => 'Legal Type', 'LangVar' => 'teltldlegaltype', 'Type' => 'dropdown', 'Options' => 'Natural Person,Legal Person', 'Default' => 'Natural Person'];
$additionaldomainfields['.tel'][] = ['Name' => 'WHOIS Opt-out', 'LangVar' => 'teltldwhoisoptout', 'Type' => 'tickbox'];

// .IT

$additionaldomainfields['.it'][] = ['Name' => 'Legal Type', 'LangVar' => 'ittldlegaltype', 'Type' => 'dropdown', 'Options' => 'Italian and foreign natural persons,Companies/one man companies,Freelance workers/professionals,non-profit organizations,public organizations,other subjects,non natural foreigners', 'Default' => 'Italian and foreign natural persons', 'Description' => 'Legal type of registrant'];
$additionaldomainfields['.it'][] = ['Name' => 'Tax ID', 'LangVar' => 'ittldtaxid', 'Type' => 'text', 'Size' => '20', 'Default' => '', 'Required' => true];
$additionaldomainfields['.it'][] = ['Name' => 'Publish Personal Data', 'LangVar' => 'ittlddata', 'Type' => 'tickbox'];
$additionaldomainfields['.it'][] = ['Name' => 'Accept Section 3 of .IT registrar contract', 'LangVar' => 'ittldsec3', 'Type' => 'tickbox'];
$additionaldomainfields['.it'][] = ['Name' => 'Accept Section 5 of .IT registrar contract', 'LangVar' => 'ittldsec5', 'Type' => 'tickbox'];
$additionaldomainfields['.it'][] = ['Name' => 'Accept Section 6 of .IT registrar contract', 'LangVar' => 'ittldsec6', 'Type' => 'tickbox'];
$additionaldomainfields['.it'][] = ['Name' => 'Accept Section 7 of .IT registrar contract', 'LangVar' => 'ittldsec7', 'Type' => 'tickbox'];

// .DE

$additionaldomainfields['.de'][] = ['Name' => 'Tax ID', 'LangVar' => 'detldtaxid', 'Type' => 'text', 'Size' => '20', 'Default' => '', 'Required' => true];

// .AU

$additionaldomainfields['.com.au'][] = ['Name' => 'Registrant Name', 'LangVar' => 'autldregname', 'Type' => 'text', 'Size' => '20', 'Default' => '', 'Required' => true];
$additionaldomainfields['.com.au'][] = ['Name' => 'Registrant ID', 'LangVar' => 'autldregid', 'Type' => 'text', 'Size' => '20', 'Default' => '', 'Required' => true];
$additionaldomainfields['.com.au'][] = ['Name' => 'Registrant ID Type', 'LangVar' => 'autldregidtype', 'Type' => 'dropdown', 'Options' => 'ABN,ACN,Business Registration Number', 'Default' => 'ABN'];
$additionaldomainfields['.com.au'][] = ['Name' => 'Eligibility Name', 'LangVar' => 'autldeligname', 'Type' => 'text', 'Size' => '20', 'Default' => '', 'Required' => false];
$additionaldomainfields['.com.au'][] = ['Name' => 'Eligibility ID', 'LangVar' => 'autldeligid', 'Type' => 'text', 'Size' => '20', 'Default' => '', 'Required' => false];
$additionaldomainfields['.com.au'][] = ['Name' => 'Eligibility ID Type', 'LangVar' => 'autldeligidtype', 'Type' => 'dropdown', 'Options' => ',Australian Company Number (ACN),ACT Business Number,NSW Business Number,NT Business Number,QLD Business Number,SA Business Number,TAS Business Number,VIC Business Number,WA Business Number,Trademark (TM),Other - Used to record an Incorporated Association number,Australian Business Number (ABN)', 'Default' => ''];
$additionaldomainfields['.com.au'][] = ['Name' => 'Eligibility Type', 'LangVar' => 'autldeligtype', 'Type' => 'dropdown', 'Options' => 'Charity,Citizen/Resident,Club,Commercial Statutory Body,Company,Incorporated Association,Industry Body,Non-profit Organisation,Other,Partnership,Pending TM Owner  ,Political Party,Registered Business,Religious/Church Group,Sole Trader,Trade Union,Trademark Owner,Child Care Centre,Government School,Higher Education Institution,National Body,Non-Government School,Pre-school,Research Organisation,Training Organisation', 'Default' => 'Company'];
$additionaldomainfields['.com.au'][] = ['Name' => 'Eligibility Reason', 'LangVar' => 'autldeligreason', 'Type' => 'radio', 'Options' => 'Domain name is an Exact Match Abbreviation or Acronym of your Entity or Trading Name.,Close and substantial connection between the domain name and the operations of your Entity.', 'Default' => 'Domain name is an Exact Match Abbreviation or Acronym of your Entity or Trading Name.'];

$additionaldomainfields['.net.au'] = $additionaldomainfields['.com.au'];
$additionaldomainfields['.org.au'] = $additionaldomainfields['.com.au'];
$additionaldomainfields['.asn.au'] = $additionaldomainfields['.com.au'];
$additionaldomainfields['.id.au'] = $additionaldomainfields['.com.au'];

// .IR
$additionaldomainfields['.ir'][] = ['Name' => 'NIC Handle', 'LangVar' => 'NIC Handle', 'Type' => 'text', 'Size' => '30', 'Default' => '', 'Required' => true];

$additionaldomainfields['.co.ir'] = $additionaldomainfields['.ir'];
$additionaldomainfields['.ac.ir'] = $additionaldomainfields['.ir'];
$additionaldomainfields['.net.ir'] = $additionaldomainfields['.ir'];
$additionaldomainfields['.org.ir'] = $additionaldomainfields['.ir'];
$additionaldomainfields['.id.ir'] = $additionaldomainfields['.ir'];
$additionaldomainfields['.sch.ir'] = $additionaldomainfields['.ir'];
$additionaldomainfields['.gov.ir'] = $additionaldomainfields['.ir'];

// .ASIA

$additionaldomainfields['.asia'][] = ['Name' => 'Legal Type', 'LangVar' => 'asialegaltype', 'Type' => 'dropdown', 'Options' => 'naturalPerson,corporation,cooperative,partnership,government,politicalParty,society,institution', 'Default' => 'naturalPerson'];
$additionaldomainfields['.asia'][] = ['Name' => 'Identity Form', 'LangVar' => 'asiaidentityform', 'Type' => 'dropdown', 'Options' => 'passport,certificate,legislation,societyRegistry,politicalPartyRegistry', 'Default' => 'passport'];
$additionaldomainfields['.asia'][] = ['Name' => 'Identity Number', 'LangVar' => 'asiaidentitynumber', 'Type' => 'text', 'Size' => '20', 'Default' => '', 'Required' => true];
