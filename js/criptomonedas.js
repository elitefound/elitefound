async function fetchCryptoPrices() {
    try {
        const response = await fetch('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin,ethereum,tether,binancecoin,cardano,dogecoin,polkadot,litecoin,shiba-inu,solana&vs_currencies=usd,eur,jpy');
        
        if (!response.ok) {
            throw new Error('Error en la respuesta de la API');
        }
        const data = await response.json();
        const table = document.getElementById('cryptoTable');
        
        // Solo actualiza el DOM si los datos han cambiado
        const newContent = `\
        <h3>
        <strong>Bitcoin (BTC): </strong>$${data.bitcoin.usd} (USD) |   \
        <strong>Ethereum (ETH): </strong>$${data.ethereum.usd} (USD) |   \
        <strong>Tether (USDT): </strong>$${data.tether.usd} (USD) |   \
        <strong>Binance Coin (BNB): </strong>$${data.binancecoin.usd} (USD) |   \
        <strong>Cardano (ADA): </strong>$${data.cardano.usd} (USD) |   \
        <strong>Dogecoin (DOGE): </strong>$${data.dogecoin.usd} (USD) |   \
        <strong>Polkadot (DOT): </strong>$${data.polkadot.usd} (USD) |   \
        <strong>Litecoin (LTC): </strong>$${data.litecoin.usd} (USD) |   \
        <strong>Shiba Inu (SHIB): </strong>$${data["shiba-inu"].usd} (USD) |   \
        <strong>Solana (SOL): </strong>$${data.solana.usd} (USD)
        </h3>`;
        if (table.innerHTML !== newContent) {
            table.innerHTML = newContent;
        }
    } catch (error) {
        console.error('Error al obtener datos:', error);
    }
}
// Actualizar precios cada 10 segundos
fetchCryptoPrices();
const intervalId = setInterval(fetchCryptoPrices, 10000);
// Puedes agregar una lógica para detener el intervalo si el usuario sale de la página
window.addEventListener('beforeunload', () => {
    clearInterval(intervalId);
});