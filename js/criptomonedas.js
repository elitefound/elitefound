async function fetchCryptoPrices() {
    try {
        const response = await fetch('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin,ethereum,tether,binancecoin,cardano,dogecoin,polkadot,litecoin,shiba-inu,solana&vs_currencies=usd');
        const data = await response.json();

        const table = document.getElementById('cryptoTable');
        table.innerHTML = `
        <p><strong>Bitcoin (BTC): </strong>$${data.bitcoin.usd} (USD) |  
        <strong>Ethereum (ETH): </strong>$${data.ethereum.usd} (USD) |  
        <strong>Tether (USDT): </strong>$${data.tether.usd} (USD) |  
        <strong>Binance Coin (BNB): </strong>$${data.binancecoin.usd} (USD) |  
        <strong>Cardano (ADA): </strong>$${data.cardano.usd} (USD) |  
        <strong>Dogecoin (DOGE): </strong>$${data.dogecoin.usd} (USD) |  
        <strong>Polkadot (DOT): </strong>$${data.polkadot.usd} (USD) |  
        <strong>Litecoin (LTC): </strong>$${data.litecoin.usd} (USD) |  
        <strong>Shiba Inu (SHIB): </strong>$${data["shiba-inu"].usd} (USD) |  
        <strong>Solana (SOL): </strong>$${data.solana.usd} (USD)</p>`;
    } catch (error) {
        console.error('Error al obtener datos:', error);
    }
}

// Actualizar precios cada 10 segundos
fetchCryptoPrices();
setInterval(fetchCryptoPrices, 10000);