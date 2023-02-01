<?php

//CRYPTO
$crypto_tickers=["BTC-USD","ETH-USD","DOGE-USD","LTC-USD","ADA-USD","TRX-USD","XMR-USD","XLM-USD","FIL-USD","MATIC-USD","BNB-USD","BCH-USD","LINK-USD","USDC-USD","DOT-USD","SOL-USD","XRP-USD","USDT-USD","CAKE-USD","UNI1-USD","SHIB-USD"];
$crypto_data=[];
foreach($crypto_tickers as $tick){
    $tick_data=array();
    $url="https://query1.finance.yahoo.com/v8/finance/chart/$tick?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d";
    $ticker=json_decode(file_get_contents($url),true);
    $price=$ticker['chart']['result'][0]['meta']['regularMarketPrice'];
    $previous=$ticker['chart']['result'][0]['meta']['chartPreviousClose'];
    $change=$price-$previous;
    $change_p=round(($change/$previous)*100,5);
    $code=$ticker['chart']['result'][0]['meta']['symbol'];
    $tick_data=array("change_p"=>$change_p,"close"=>$price,"code"=>$code);
    array_push($crypto_data,$tick_data);
    
}
//print_r($crypto_data);
//$api_crypto="https://eodhistoricaldata.com/api/real-time/BTC-USD.CC?api_token=614e62bf9dd353.18039365&fmt=json&s=ETH-USD.CC,DOGE-USD.CC,LTC-USD.CC,ADA-USD.CC,TRX-USD.CC,XMR-USD.CC,XLM-USD.CC,FIL-USD.CC,MATIC-USD.CC,BNB-USD.CC,BCH-USD.CC,LINK-USD.CC,USDC-USD.CC,DOT-USD.CC,SOL-USD.CC,XRP-USD.CC,USDT-USD.CC,CAKE-USD.CC,UNISWAP-USD.CC,SHIB-USD.CC";
//$crypto_file=file_get_contents($api_crypto);
$write_crypto=fopen("api/crypto.txt","w");
fwrite($write_crypto,json_encode($crypto_data));
$write_crypto2=fopen("../api/crypto.txt","w");
fwrite($write_crypto2,json_encode($crypto_data));
fclose($write_crypto);
fclose($write_crypto2);



//FOREX
$forex_tickers=["USDCAD=X","EURJPY=X","EURUSD=X","EURCHF=X","USDCHF=X","EURGBP=X","GBPUSD=X","AUDCAD=X","NZDUSD=X","GBPCHF=X","AUDUSD=X","GBPJPY=X","USDJPY=X","CHFJPY=X","EURCAD=X","AUDJPY=X","USDKRW=X","USDHKD=X","EURHKD=X"];
$forex_data=[];
foreach($forex_tickers as $tick){
    $tick_data=array();
    $url="https://query1.finance.yahoo.com/v8/finance/chart/$tick?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d";
    $ticker=json_decode(file_get_contents($url),true);
    $price=$ticker['chart']['result'][0]['meta']['regularMarketPrice'];
    $previous=$ticker['chart']['result'][0]['meta']['chartPreviousClose'];
    $change=$price-$previous;
    $change_p=round(($change/$previous)*100,3);
    $code=$ticker['chart']['result'][0]['meta']['symbol'];
    $tick_data=array("change_p"=>$change_p,"close"=>$price,"code"=>$code, "open"=>$previous);
    array_push($forex_data,$tick_data);
    
}
//print_r($forex_data);

//$api_forex="https://eodhistoricaldata.com/api/real-time/USDCAD.FOREX?api_token=614e62bf9dd353.18039365&fmt=json&s=EURJPY.FOREX,EURUSD.FOREX,EURCHF.FOREX,USDCHF.FOREX,EURGBP.FOREX,GBPUSD.FOREX,AUDCAD.FOREX,NZDUSD.FOREX,GBPCHF.FOREX,AUDUSD.FOREX,GBPJPY.FOREX,USDJPY.FOREX,CHFJPY.FOREX,EURCAD.FOREX,AUDJPY.FOREX,USDKRW.FOREX,USDHKD.FOREX,EURAUD.FOREX";
    //$forex_file=file_get_contents($api_forex);

    $write_forex=fopen("api/forex.txt","w");
    $write_forex2=fopen("../api/forex.txt","w");
    fwrite($write_forex,json_encode($forex_data));
    fwrite($write_forex2,json_encode($forex_data));
    fclose($write_forex);
    fclose($write_forex2);

    //STOCKS
    $stocks_tickers=["AAPL","MRNA","TSLA","MSFT","AMZN","META","GOOG","PFE","PYPL","NVDA","JPM","NFLX","A","GM","KO","V","GME","CLS","MCO","JNJ","MCD","BABA","GOOGL","BRK-B","CLF" ];
    $stocks_data=[];
    foreach($stocks_tickers as $tick){
      

        $tick_data=array();
        $url="https://query1.finance.yahoo.com/v8/finance/chart/$tick?region=US&lang=en-US&includePrePost=false&interval=1mo&useYfid=true&range=1y";
        $ticker=json_decode(file_get_contents($url),true);
        $price=$ticker['chart']['result'][0]['meta']['regularMarketPrice'];
        $previous=$ticker['chart']['result'][0]['meta']['chartPreviousClose'];
        $change=$price-$previous;
        $change_p=round(($change/$previous)*100,3);
        $code=$ticker['chart']['result'][0]['meta']['symbol'];

        
        $time=[];
        $close=[];

        
        foreach ($ticker['chart']['result'][0]['timestamp'] as $timestamp) {
            $time[] = date('Y-m-d', $timestamp);
        }
        foreach ($ticker['chart']['result'][0]['indicators']['quote'][0]['close'] as $arrprice) {
            $close[] = $arrprice;
        }
//Check if the final close value is lower than the initial close value
$initial_close = $close[0];
$final_close = end($close);
$dip = ($final_close < $initial_close);
        
        $tick_data=array("change_p"=>$change_p,"close"=>$price,"code"=>$code,"closes"=>$close,"time"=>$time,"dip"=>$dip);

        array_push($stocks_data,$tick_data);
        
    }
    //print_r($stocks_data);
    //$api_stock="https://eodhistoricaldata.com/api/real-time/AAPL.US?api_token=614e62bf9dd353.18039365&fmt=json&s=MRNA.US,TSLA.US,MSFT.US,AMZN.US,FB.US,GOOG.US,PFE.US,PYPL.US,NVDA.US,JPM.US,NFLX.US,A.US,GM.US,KO.US,V.US,GME.US,MRNA.US,CLS.US,MCO.US,JNJ.US,MCD.US,BABA.US,PFE.US,GOOGL.US,BRK-B.US,CLF.US";
    //$stocks_file=file_get_contents($api_stock);
    $write_stocks=fopen("api/stocks.txt","w");
    $write_stocks2=fopen("../api/stocks.txt","w");
    fwrite($write_stocks,json_encode($stocks_data));
    fwrite($write_stocks2,json_encode($stocks_data));
    fclose($write_stocks);
    fclose($write_stocks2);
//BOND_ETFS
$bonds_etf_tickers=["TMF","ICVT","FLTR"];
$bonds_etf_data=[];
foreach($bonds_etf_tickers as $tick){
    $tick_data=array();
    $url="https://query1.finance.yahoo.com/v8/finance/chart/$tick?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d";
    $ticker=json_decode(file_get_contents($url),true);
    $price=$ticker['chart']['result'][0]['meta']['regularMarketPrice'];
    $previous=$ticker['chart']['result'][0]['meta']['chartPreviousClose'];
    $change=$price-$previous;
    $change_p=round(($change/$previous)*100,3);
    $code=$ticker['chart']['result'][0]['meta']['symbol'];
    $tick_data=array("change_p"=>$change_p,"close"=>$price,"code"=>$code);
    array_push($bonds_etf_data,$tick_data);
    
}
//print_r($bonds_etf_data);
//$api_bonds_etfs="https://eodhistoricaldata.com/api/real-time/TMF.US?api_token=614e62bf9dd353.18039365&fmt=json&s=ICVT.US,FLTR.US";
//$bonds_etfs_file=file_get_contents($api_bonds_etfs);
    $write_bond_etf=fopen("api/bond-etf.txt","w");
    $write_bond_etf2=fopen("../api/bond-etf.txt","w");
    fwrite($write_bond_etf,json_encode($bonds_etf_data));
    fwrite($write_bond_etf2,json_encode($bonds_etf_data));
    fclose($write_bond_etf);
    fclose($write_bond_etf2);


//PRECIOUS METALS ETFS
$precious_metals_etf_tickers=["IAU","GLDM","SGOL","BAR","OUNZ","DBP","DGL","SPY","GDX"];
$precious_metals_etf_data=[];
foreach($precious_metals_etf_tickers as $tick){
    $tick_data=array();
    $url="https://query1.finance.yahoo.com/v8/finance/chart/$tick?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d";
    $ticker=json_decode(file_get_contents($url),true);
    $price=$ticker['chart']['result'][0]['meta']['regularMarketPrice'];
    $previous=$ticker['chart']['result'][0]['meta']['chartPreviousClose'];
    $change=$price-$previous;
    $change_p=round(($change/$previous)*100,3);
    $code=$ticker['chart']['result'][0]['meta']['symbol'];
    $tick_data=array("change_p"=>$change_p,"close"=>$price,"code"=>$code);
    array_push($precious_metals_etf_data,$tick_data);
    
}
//print_r($precious_metals_etf_data);
//$api_precious_metal_etf="https://eodhistoricaldata.com/api/real-time/IAU.US?api_token=614e62bf9dd353.18039365&fmt=json&s=GLDM.US,SGOL.US,BAR.US,OUNZ.US,DBP.US,DGL.US,SPY.US,GDX.US";
//$precious_metal_etf_file=file_get_contents($api_precious_metal_etf);
$write_precious_metal_etf=fopen("api/precious-metal-etf.txt","w");
$write_precious_metal_etf2=fopen("../api/precious-metal-etf.txt","w");
    fwrite($write_precious_metal_etf,json_encode($precious_metals_etf_data));
    fwrite($write_precious_metal_etf2,json_encode($precious_metals_etf_data));
    fclose($write_precious_metal_etf);
    fclose($write_precious_metal_etf2);

//COMMODITIES ETFS
$comm_etf_tickers=["PDBC","FTGC","COMT","USCI","FAAR","BCD","COMB","CMDY"];
$comm_etf_data=[];

foreach($comm_etf_tickers as $tick){
    $tick_data=array();
    $url="https://query1.finance.yahoo.com/v8/finance/chart/$tick?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d";
    $ticker=json_decode(file_get_contents($url),true);
    $price=$ticker['chart']['result'][0]['meta']['regularMarketPrice'];
    $previous=$ticker['chart']['result'][0]['meta']['chartPreviousClose'];
    $change=$price-$previous;
    $change_p=round(($change/$previous)*100,3);
    $code=$ticker['chart']['result'][0]['meta']['symbol'];
    $tick_data=array("change_p"=>$change_p,"close"=>$price,"code"=>$code);
    array_push($comm_etf_data,$tick_data);
    
}
//print_r($comm_etf_data);

//$api_comm_etfs="https://eodhistoricaldata.com/api/real-time/PDBC.US?api_token=614e62bf9dd353.18039365&fmt=json&s=FTGC.US,COMT.US,USCI.US,FAAR.US,BCD.US,COMB.US,CMDY.US";
//$comm_etfs_file=file_get_contents($api_comm_etfs);
$write_comm_etf=fopen("api/comm-etf.txt","w");
$write_comm_etf2=fopen("../api/comm-etf.txt","w");
    fwrite($write_comm_etf,json_encode($comm_etf_data));
    fwrite($write_comm_etf2,json_encode($comm_etf_data));
    fclose($write_comm_etf);
    fclose($write_comm_etf2);

//CURRENCY ETFS

$curr_etf_tickers=["UUP","CYB","EUFX","FXY","FXF","FXE","FXA","FXC","EWCO"];
$curr_etf_data=[];

foreach($curr_etf_tickers as $tick){
    $tick_data=array();
    $url="https://query1.finance.yahoo.com/v8/finance/chart/$tick?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d";
    $ticker=json_decode(file_get_contents($url),true);
    $price=$ticker['chart']['result'][0]['meta']['regularMarketPrice'];
    $previous=$ticker['chart']['result'][0]['meta']['chartPreviousClose'];
    $change=$price-$previous;
    $change_p=round(($change/$previous)*100,3);
    $code=$ticker['chart']['result'][0]['meta']['symbol'];
    $tick_data=array("change_p"=>$change_p,"close"=>$price,"code"=>$code);
    array_push($curr_etf_data,$tick_data);
    
}
//print_r($curr_etf_data);
//$api_curr_etfs="https://eodhistoricaldata.com/api/real-time/UUP.US?api_token=614e62bf9dd353.18039365&fmt=json&s=CYB.US,EUFX.US,FXY.US,FXF.US,FXE.US,FXA.US,FXC.US,EWCO.US";
//$curr_etfs_file=file_get_contents($api_curr_etfs);
$write_curr_etf=fopen("api/currency-etf.txt","w");
$write_curr_etf2=fopen("../api/currency-etf.txt","w");
    fwrite($write_curr_etf,json_encode($curr_etf_data));
    fwrite($write_curr_etf2,json_encode($curr_etf_data));
    fclose($write_curr_etf);
    fclose($write_curr_etf2);

//REAL ESTATE ETFS
$real_estate_tickers=["VNQI","REET","HAUZ","VNQ","FREL","GQRE","FPRO","EWRE","BBRE"];
$real_estate_data=[];
foreach($real_estate_tickers as $tick){
    $tick_data=array();
    $url="https://query1.finance.yahoo.com/v8/finance/chart/$tick?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d";
    $ticker=json_decode(file_get_contents($url),true);
    $price=$ticker['chart']['result'][0]['meta']['regularMarketPrice'];
    $previous=$ticker['chart']['result'][0]['meta']['chartPreviousClose'];
    $change=$price-$previous;
    $change_p=round(($change/$previous)*100,3);
    $code=$ticker['chart']['result'][0]['meta']['symbol'];
    $tick_data=array("change_p"=>$change_p,"close"=>$price,"code"=>$code);
    array_push($real_estate_data,$tick_data);
    
}
//print_r($real_estate_data);

//$api_real_estate_etf="https://eodhistoricaldata.com/api/real-time/VNQI.US?api_token=614e62bf9dd353.18039365&fmt=json&s=REET.US,HAUZ.US,VNQ.US,FREL.US,GQRE.US,FPRO.US,EWRE.US,BBRE.US";
//$real_estate_etfs_file=file_get_contents($api_real_estate_etf);
$write_real_estate_etf=fopen("api/real-estate-etf.txt","w");
$write_real_estate_etf2=fopen("../api/real-estate-etf.txt","w");
    fwrite($write_real_estate_etf,json_encode($real_estate_data));
    fwrite($write_real_estate_etf2,json_encode($real_estate_data));
    fclose($write_real_estate_etf);
    fclose($write_real_estate_etf2);

//REGIONAL ETFS

$regional_etf_tickers=["FLCH","SPEU"];
$regional_etf_data=[];
foreach($regional_etf_tickers as $tick){
    $tick_data=array();
    $url="https://query1.finance.yahoo.com/v8/finance/chart/$tick?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d";
    $ticker=json_decode(file_get_contents($url),true);
    $price=$ticker['chart']['result'][0]['meta']['regularMarketPrice'];
    $previous=$ticker['chart']['result'][0]['meta']['chartPreviousClose'];
    $change=$price-$previous;
    $change_p=round(($change/$previous)*100,3);
    $code=$ticker['chart']['result'][0]['meta']['symbol'];
    $tick_data=array("change_p"=>$change_p,"close"=>$price,"code"=>$code);
    array_push($regional_etf_data,$tick_data);
    
}
//print_r($regional_etf_data);


//$api_regional_etf="https://eodhistoricaldata.com/api/real-time/FLCH.US?api_token=614e62bf9dd353.18039365&fmt=json&s=SPEU.US";
//$regional_etf_file=file_get_contents($api_regional_etf);
$write_regional_etf=fopen("api/regional-etf.txt","w");
$write_regional_etf2=fopen("../api/regional-etf.txt","w");
    fwrite($write_regional_etf,json_encode($regional_etf_data));
    fwrite($write_regional_etf2,json_encode($regional_etf_data));
    fclose($write_regional_etf);
    fclose($write_regional_etf2);



//SECTOR ETFS
$sector_etf_tickers=["IAI","RSP","EWCO","SPY","IVV","VOO","QQQ","VTI"];
$sector_etf_data=[];
foreach($sector_etf_tickers as $tick){
    $tick_data=array();
    $url="https://query1.finance.yahoo.com/v8/finance/chart/$tick?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d";
    $ticker=json_decode(file_get_contents($url),true);
    $price=$ticker['chart']['result'][0]['meta']['regularMarketPrice'];
    $previous=$ticker['chart']['result'][0]['meta']['chartPreviousClose'];
    $change=$price-$previous;
    $change_p=round(($change/$previous)*100,3);
    $code=$ticker['chart']['result'][0]['meta']['symbol'];
    $tick_data=array("change_p"=>$change_p,"close"=>$price,"code"=>$code);
    array_push($sector_etf_data,$tick_data);
    
}
//print_r($sector_etf_data);
//$api_sector_etfs="https://eodhistoricaldata.com/api/real-time/IAI.US?api_token=614e62bf9dd353.18039365&fmt=json&s=RSP.US,EWCO.US,SPY.US,IVV.US,VOO.US,QQQ.US,VTI.US";
//$sector_etfs_file=file_get_contents($api_sector_etfs);
$write_sector_etf=fopen("api/sector-etf.txt","w");
$write_sector_etf2=fopen("../api/sector-etf.txt","w");
    fwrite($write_sector_etf,json_encode($sector_etf_data));
    fwrite($write_sector_etf2,json_encode($sector_etf_data));
    fclose($write_sector_etf);
    fclose($write_sector_etf2);

//CRYPTO ETFS
$crypto_etf_tickers=["BLOK","BLCN","LEGR","KOIN","BTCC-B.TO","EBIT-U.TO","BTCX-B.TO","BTCQ.TO"];
$crypto_etf_data=[];

foreach($crypto_etf_tickers as $tick){
    $tick_data=array();
    $url="https://query1.finance.yahoo.com/v8/finance/chart/$tick?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d";
    $ticker=json_decode(file_get_contents($url),true);
    $price=$ticker['chart']['result'][0]['meta']['regularMarketPrice'];
    $previous=$ticker['chart']['result'][0]['meta']['chartPreviousClose'];
    $change=$price-$previous;
    $change_p=round(($change/$previous)*100,3);
    $code=$ticker['chart']['result'][0]['meta']['symbol'];
    $tick_data=array("change_p"=>$change_p,"close"=>$price,"code"=>$code);
    array_push($crypto_etf_data,$tick_data);
    
}
//print_r($crypto_etf_data);
//$api_crypto_etf="https://eodhistoricaldata.com/api/real-time/BLOK.US?api_token=614e62bf9dd353.18039365&fmt=json&s=BLCN.US,LEGR.US,KOIN.US,BTCC.TO,EBIT-U.TO,BTCX-B.TO,BTCQ.TO";
//$crypto_etf_file=file_get_contents($api_crypto_etf);
$write_crypto_etf=fopen("api/crypto-etf.txt","w");
$write_crypto_etf2=fopen("../api/crypto-etf.txt","w");
    fwrite($write_crypto_etf,json_encode($crypto_etf_data));
    fwrite($write_crypto_etf2,json_encode($crypto_etf_data));
    fclose($write_crypto_etf);
    fclose($write_crypto_etf2);


//BONDS
$bonds_tickers=["^TNX","^TYX","^TYX","^TYX","^FVX","^IRX"];
$bonds_data=[];

foreach($bonds_tickers as $tick){
    $tick_data=array();
    $url="https://query1.finance.yahoo.com/v8/finance/chart/$tick?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d";
    $ticker=json_decode(file_get_contents($url),true);
    $price=$ticker['chart']['result'][0]['meta']['regularMarketPrice'];
    $previous=$ticker['chart']['result'][0]['meta']['chartPreviousClose'];
    $change=$price-$previous;
    $change_p=round(($change/$previous)*100,3);
    $code=$ticker['chart']['result'][0]['meta']['symbol'];
    $tick_data=array("change_p"=>$change_p,"close"=>$price,"code"=>$code);
    array_push($bonds_data,$tick_data);
    
}
//print_r($bonds_data);
//$api_bonds="https://eodhistoricaldata.com/api/real-time/US10Y.INDX?api_token=614e62bf9dd353.18039365&fmt=json&s=US30Y.INDX,US1Y.INDX,US2Y.INDX,US5Y.INDX,US3M.INDX ";
//$api_bonds_file=file_get_contents($api_bonds);
$write_bond=fopen("api/bonds.txt","w");
$write_bond2=fopen("../api/bonds.txt","w");
    fwrite($write_bond,json_encode($bonds_data));
    fwrite($write_bond2,json_encode($bonds_data));
    fclose($write_bond);
    fclose($write_bond2);


//PRECIOUS METALS
$precious_metals_tickers=["GC=F","SI=F","CL=F","BZ=F"];
$precious_metals_data=[];

foreach($precious_metals_tickers as $tick){
    $tick_data=array();
    $url="https://query1.finance.yahoo.com/v8/finance/chart/$tick?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d";
    $ticker=json_decode(file_get_contents($url),true);
    $price=$ticker['chart']['result'][0]['meta']['regularMarketPrice'];
    $previous=$ticker['chart']['result'][0]['meta']['chartPreviousClose'];
    $change=$price-$previous;
    $change_p=round(($change/$previous)*100,3);
    $code=$ticker['chart']['result'][0]['meta']['symbol'];
    $tick_data=array("change_p"=>$change_p,"close"=>$price,"code"=>$code);
    array_push($precious_metals_data,$tick_data);
    
}
//print_r($precious_metals_data);
//$api_precious_metals="https://eodhistoricaldata.com/api/real-time/GC.COMM?api_token=614e62bf9dd353.18039365&fmt=json&s=SI.COMM,CL.COMM";
//$precious_metals_file=file_get_contents($api_precious_metals);
$write_precious_metal=fopen("api/precious-metals.txt","w");
$write_precious_metal2=fopen("../api/precious-metals.txt","w");
    fwrite($write_precious_metal,json_encode($precious_metals_data));
    fwrite($write_precious_metal2,json_encode($precious_metals_data));
    fclose($write_precious_metal);
    fclose($write_precious_metal2);
?>