<?php
//CRYPTO CURRENCIES
//$api_crypto="https://eodhistoricaldata.com/api/real-time/BTC-USD.CC?api_token=614e62bf9dd353.18039365&fmt=json&s=ETH-USD.CC,DOGE-USD.CC,LTC-USD.CC,ADA-USD.CC,TRX-USD.CC,XMR-USD.CC,XLM-USD.CC,FIL-USD.CC,MATIC-USD.CC,BNB-USD.CC,BCH-USD.CC,LINK-USD.CC,USDC-USD.CC,DOT-USD.CC,SOL-USD.CC,XRP-USD.CC,USDT-USD.CC,CAKE-USD.CC,UNISWAP-USD.CC";

$crypto_file=file_get_contents("api/crypto.txt");
$crypto=json_decode($crypto_file,true);


//PRECIOUS METALS
 //$api_precious_metals="https://eodhistoricaldata.com/api/real-time/GOLD.US?api_token=614e62bf9dd353.18039365&fmt=json&s=SI.COMM,CL.COMM";
$precious_metals_file=file_get_contents("api/precious-metals.txt");
$precious_metals=json_decode($precious_metals_file,true);
//print_r($precious_metals);
//STOCKS

//$api_stock="https://eodhistoricaldata.com/api/real-time/AAPL.US?api_token=614e62bf9dd353.18039365&fmt=json&s=MRNA.US,TSLA.US,MSFT.US,AMZN.US,FB.US,GOOG.US,PFE.US,PYPL.US,NVDA.US,JPM.US,NFLX.US,A.US,GM.US,KO.US,V.US,GME.US,MRNA.US,CLS.US,MCO.US,JNJ.US,MCD.US,BABA.US,PFE.US,GOOGL.US,BRK-B.US,CLF.US";
$stocks_file=file_get_contents("api/stocks.txt");
$stocks=json_decode($stocks_file,true);
//print_r($stocks);

//CRYPTO ETFs


//$api_crypto_etf="https://eodhistoricaldata.com/api/real-time/BLOK.US?api_token=614e62bf9dd353.18039365&fmt=json&s=BLCN.US,LEGR.US,KOIN.US,BTCC.TO,EBIT-U.TO,BTCX-B.TO,BTCQ.TO";
$crypto_etf_file=file_get_contents("api/crypto-etf.txt");
$crypto_etf=json_decode($crypto_etf_file,true);
//print_r($crypto_etf);

//PRECIOUS METALS ETFs

//$api_precious_metal_etf="https://eodhistoricaldata.com/api/real-time/IAU.US?api_token=614e62bf9dd353.18039365&fmt=json&s=GLDM.US,SGOL.US,BAR.US,OUNZ.US,DBP.US,DGL.US,SPY.US,GDX.US";
$precious_metal_etf_file=file_get_contents("api/precious-metal-etf.txt");
$precious_metal_etf=json_decode($precious_metal_etf_file,true);
//print_r($precious_metal_etf);

//$api_forex="https://eodhistoricaldata.com/api/real-time/USDCAD.FOREX?api_token=614e62bf9dd353.18039365&fmt=json&s=EURJPY.FOREX,EURUSD.FOREX,EURCHF.FOREX,USDCHF.FOREX,EURGBP.FOREX,GBPUSD.FOREX,AUDCAD.FOREX,NZDUSD.FOREX,GBPCHF.FOREX,AUDUSD.FOREX,GBPJPY.FOREX,USDJPY.FOREX,CHFJPY.FOREX,EURCAD.FOREX,AUDJPY.FOREX,USDKRW.FOREX,USDHKD.FOREX,EURAUD.FOREX";
$forex_file=file_get_contents("api/forex.txt");
$forex=json_decode($forex_file,true);
//print_r($forex);



//$api_comm_etfs="https://eodhistoricaldata.com/api/real-time/PDBC.US?api_token=614e62bf9dd353.18039365&fmt=json&s=FTGC.US,COMT.US,USCI.US,FAAR.US,BCD.US,COMB.US,CMDY.US";
$comm_etfs_file=file_get_contents("api/comm-etf.txt");
$comm_etfs=json_decode($comm_etfs_file,true);

//$api_sector_etfs="https://eodhistoricaldata.com/api/real-time/IAI.US?api_token=614e62bf9dd353.18039365&fmt=json&s=RSP.US,EWCO.US,SPY.US,IVV.US,VOO.US,QQQ.US,VTI.US";
$sector_etfs_file=file_get_contents("api/sector-etf.txt");
$sector_etfs=json_decode($sector_etfs_file,true);
//print_r($sector_etfs);

//BONDS ETFS
//$api_bonds_etfs="https://eodhistoricaldata.com/api/real-time/TMF.US?api_token=614e62bf9dd353.18039365&fmt=json&s=ICVT.US,FLTR.US";
$bonds_etfs_file=file_get_contents("api/bond-etf.txt");
$bonds_etf=json_decode($bonds_etfs_file,true);


//CURRENCIES ETFS
//$api_curr_etfs="https://eodhistoricaldata.com/api/real-time/UUP.US?api_token=614e62bf9dd353.18039365&fmt=json&s=CYB.US,EUFX.US,FXY.US,FXF.US,FXE.US,FXA.US,FXC.US,EWCO.US";
$curr_etfs_file=file_get_contents("api/currency-etf.txt");
$curr_etfs=json_decode($curr_etfs_file,true);


//REAL ESTATE ETFS
//$api_real_estate_etf="https://eodhistoricaldata.com/api/real-time/VNQI.US?api_token=614e62bf9dd353.18039365&fmt=json&s=REET.US,HAUZ.US,VNQ.US,FREL.US,GQRE.US,FPRO.US,EWRE.US,BBRE.US";
$real_estate_etfs_file=file_get_contents("api/real-estate-etf.txt");
$real_estate_etf=json_decode($real_estate_etfs_file,true);


//REGIONAL ETFS
//$api_regional_etf="https://eodhistoricaldata.com/api/real-time/FLCH.US?api_token=614e62bf9dd353.18039365&fmt=json&s=SPEU.US";
$regional_etf_file=file_get_contents("api/regional-etf.txt");
$regional_etf=json_decode($regional_etf_file,true);

//BONDS
//$api_bonds="https://eodhistoricaldata.com/api/real-time/US10Y.INDX?api_token=614e62bf9dd353.18039365&fmt=json&s=US30Y.INDX,US1Y.INDX,US2Y.INDX,US5Y.INDX,US3M.INDX ";
$api_bonds_file=file_get_contents("api/bonds.txt");
$bonds=json_decode($api_bonds_file,true);

?>