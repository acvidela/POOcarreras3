<style>
.cupon {
    max-width: 600px;
    margin: auto;
    padding: 20px;
    border: 2px dashed #555;
    background: #fafafa;
    font-size: 18px;
    text-align: center;
}
.cupon h2 {
    text-align: center;
}
.cupon img {
    margin-top: 20px;
}
button {
    margin-top: 20px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}
</style>

<div class="cupon">
    <h2>Cupón de Pago</h2>

    <p><strong>Atleta:</strong> {$cupon.nombre} {$cupon.apellido}</p>
    <p><strong>DNI:</strong> {$cupon.dni}</p>
    <p><strong>Carrera:</strong> {$cupon.carrera_nombre}</p>
    <p><strong>Fecha:</strong> {$cupon.fecha}</p>
    <p><strong>Monto a pagar:</strong> $ {$cupon.precio}</p>

    {if isset($qr)}
        <p>Presenta este QR para el pago en los puntos habilitados:</p>
        <img src="data:image/png;base64,{$qr}" alt="QR del cupón">
    {/if}

    <br>
    <p>Enviar el comprobante de pago a pagos@estandil.com.ar o presentarlo al momento de retirar la dorsal.</p>

    <button onclick="window.print()">Imprimir</button>
</div>

