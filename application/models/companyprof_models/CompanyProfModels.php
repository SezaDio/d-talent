interface gpon-onu_1/8/13:8
  name KARDIYONO|ZTEGC0D4ACEE
  description KOTA SEMARANG, TLOGOSARI KULON PEDURUNGAN, PARANG KESIT 1, 35
  tcont 1 name VOIP profile UP-1M
  tcont 2 name SPEEDY profile UP-1536K
  gemport 1 name VOIP tcont 1
  gemport 1 traffic-limit downstream DOWN-1M
  gemport 2 name SPEEDY tcont 2
  gemport 2 traffic-limit downstream DOWN-15360K
  switchport mode hybrid vport 1
  switchport mode hybrid vport 2
  service-port 1 vport 1 user-vlan 923 vlan 923
  service-port 1 description VOIP
  service-port 2 vport 2 user-vlan 2790 vlan 2790
  service-port 2 description SPEEDY
  dhcpv4-l2-relay-agent enable vport 1
  port-identification format DSL-FORUM-PON vport 2
  dhcpv4-l2-relay-agent enable vport 1
  pppoe-intermediate-agent enable vport 2
  
  
  pon-onu-mng gpon-onu_1/8/13:8
  service VOIP gemport 1 iphost 2 vlan 923
  service SPEEDY gemport 2 iphost 1 vlan 2790
  voip protocol sip
  voip-ip mode dhcp vlan-profile batchVlan923 host 2
  voip-ip ping-response enable traceroute-response enable
  wan-ip 1 mode pppoe username 142410308774@telkom.net password 115972690 vlan-profile wan2790 host 1
  sip-service pots_0/1 profile sipprofile userid +62246731642 username +62246731642@telkom.net.id password 830404279 media-profile mediaprofile
  veip 1 port udp 8080 host 1
  dhcp-ip ethuni eth_0/4 from-internet
  mvlan 110
  mvlan tag eth_0/4 strip
  tr069-mgmt 1 acs http://acs.telkom.net:9090/web/tr069 validate basic username CPE password CPE
  wan 1 service internet host 1

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
   configure equipment ont interface 1/1/11/7/12 sw-ver-pland 3FE56557AFDB44 sernum ALCL:F22BD6A0 sw-dnload-version 3FE56557AFDB44 voip-allowed iphost cvlantrans-mode local
  
  
  
  configure bridge port 1/1/7/15/17/14/1  vlan-id 881 vlan-scope local network-vlan 3355 tag single-tagged
  
  
  
  configure bridge port 1/1/11/7/12/14/1  vlan-id 881 vlan-scope local network-vlan 4070 tag single-tagged
  
  
  
configure interface port uni:1/1/11/7/12/14/1 admin-up
exit all
configure qos interface 1/1/11/7/12/14/1 upstream-queue 0 bandwidth-profile name:UP-1536K
configure qos interface 1/1/11/7/12/14/1 queue 0 shaper-profile name:DOWN-15360K
exit all
configure bridge port 1/1/11/7/12/14/1 max-unicast-mac 4
configure bridge port 1/1/11/7/12/14/1  vlan-id 881 vlan-scope local network-vlan 4070 tag single-tagged
exit all
configure veip ont 1/1/11/7/12/14/1 domain-name 141423109664@telkom.net admin-state up
exit all
configure ntp ont  1/1/11/7/12 key IZMKAP01OQ
exit all



1/1/11/7/12
F22BD6A0

  
  
  configure equipment ont interface 1/1/11/10/8 sw-ver-pland 3FE56557AFDB44 sernum ALCL:F22BD6A1 sw-dnload-version 3FE56557AFDB44 voip-allowed iphost cvlantrans-mode local
  
  
  
configure equipment ont interface 1/1/11/10/8 sw-ver-pland 3FE56557AFDB44 sernum ALCL:F22BD6A1 sw-dnload-version 3FE56557AFDB44 voip-allowed iphost cvlantrans-mode local
configure equipment ont interface 1/1/11/10/8 admin-state up
exit all
configure equipment ont slot 1/1/11/10/8/1 planned-card-type 10_100base plndnumdataports 4 plndnumvoiceports 0 admin-state up
configure equipment ont slot  1/1/11/10/8/2 planned-card-type pots plndnumdataports 0 plndnumvoiceports 2 admin-state up
configure equipment ont slot 1/1/11/10/8/14 planned-card-type veip plndnumdataports 1 plndnumvoiceports 0 admin-state up
exit all


configure interface port uni:1/1/11/10/8/14/1 admin-up
exit all
configure qos interface 1/1/11/10/8/14/1 upstream-queue 0 bandwidth-profile name:UP-1536K
configure qos interface 1/1/11/10/8/14/1 queue 0 shaper-profile name:DOWN-15360K
exit all
configure bridge port 1/1/11/10/8/14/1 max-unicast-mac 4
configure bridge port 1/1/11/10/8/14/1  vlan-id 881 vlan-scope local network-vlan 4070  tag single-tagged
exit all
configure veip ont 1/1/11/10/8/14/1 domain-name 141423106708@telkom.net admin-state up
exit all
configure ntp ont  1/1/11/10/8 key ORXNZA09CA
exit all

  


1/1/2/5/12    ALCLF22BD7A8

configure equipment ont interface 1/1/2/5/12 sw-ver-pland 3FE56557AFDB44 sernum ALCL:F22BD7A8 sw-dnload-version 3FE56557AFDB44 voip-allowed iphost cvlantrans-mode local
configure equipment ont interface 1/1/2/5/12 admin-state up
exit all
configure equipment ont slot 1/1/2/5/12/1 planned-card-type 10_100base plndnumdataports 4 plndnumvoiceports 0 admin-state up
configure equipment ont slot  1/1/2/5/12/2 planned-card-type pots plndnumdataports 0 plndnumvoiceports 2 admin-state up
configure equipment ont slot 1/1/2/5/12/14 planned-card-type veip plndnumdataports 1 plndnumvoiceports 0 admin-state up
exit all


configure interface port uni:1/1/2/5/12/14/1 admin-up
exit all
configure qos interface 1/1/2/5/12/14/1 upstream-queue 0 bandwidth-profile name:UP-1536K
configure qos interface 1/1/2/5/12/14/1 queue 0 shaper-profile name:DOWN-15360K
exit all
configure bridge port 1/1/2/5/12/14/1 max-unicast-mac 4
configure bridge port 1/1/2/5/12/14/1  vlan-id 881 vlan-scope local network-vlan 425 tag single-tagged
exit all
configure veip ont 1/1/2/5/12/14/1 domain-name 141423125183@telkom.net admin-state up
exit all
configure ntp ont  1/1/2/5/12 key 495090447
exit all

  
  
  
  
  
  
  