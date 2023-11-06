


<?php
session_start();
// ... (outras partes do seu código) ...

if (isset($_SESSION['cart_json'])) {
    $cart = json_decode($_SESSION['cart_json'], true);

        
        // Você pode calcular o total e exibi-lo aqui também
    }

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <!-- CSS DO PROJETO -->
    <link rel="stylesheet" href="assets/CSS/checkout.css">

    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />
</head>
<body>

<div class='subject'>DailyUI #002 </br><strong>Pagamento com Cartão de Crédito</strong></div>
<div class='checkout'>
  <div class='order'>
    <h2>Finalizar Compra</h2>

    <!-- Inclua a div da lista de pedidos aqui -->
    <div class='order-list'>
      <?php
      // Loop through the items in the cart and display the details
      if (isset($_SESSION['cart_json'])) {
          $cart = json_decode($_SESSION['cart_json'], true);

          if (!empty($cart)) {
              foreach ($cart as $item) {
                  echo '<div class="product">';
                  echo '<img src="' . $item['imagem'] . '" alt="' . $item['nome'] . '">';
                  echo '<h3>' . $item['nome'] . '</h3>';
                  echo '<p>Preço: R$ ' . $item['preco'] . '</p>';
                  echo '<p>Quantidade: ' . $item['quantidade'] . '</p>';
                  echo '</div>';
              }
          }
      }
      ?>
    </div>
  </div>
  <h2>Pagamento</h2>
  <div id='payment' class='payment'>
    <div class='card'>
      <div class='card-content'>
        <h5>Número do Cartão</h5>
        <h6 id='label-cardnumber'>0000 0000 0000 0000</h6>
        <h5>Validade<span>Código CVC</span></h5>
        <h6 id='label-cardexpiration'>00 / 0000<span>000</span></h6>
      </div>
      <div class='wave'></div>
    </div>
    <div class='card-form'>
        <p class='field'>
        <i class="bi bi-card-heading"></i>
        <input type='text' id='cardnumber' name='cardnumber' placeholder='1234 5678 9123 4567' pattern='\d*' title='Número do Cartão' />
      </p>
        <p class='field space'>
        <i class="bi bi-calendar2-date"></i>
          <input type='text' id='cardexpiration' name='cardexpiration' placeholder="MM / AAAA" pattern="\d*" title='Data de Validade do Cartão' />
      </p>
        <p class= "field">
        <i class="bi bi-credit-card-2-back-fill"></i>
          <input type='text' id='cardcvc' name='cardcvc' placeholder="123" pattern="\d*" title='Código CVC' />
      </p>
      <button class='button-cta' title='Confirmar sua compra'><span>COMPRAR</span></button>
    </div>
    <div class='card-form' id="pix-form" style="display: none;">
        <p class='field'>
        <i class="bi bi-code-slash"></i>
        <input type='text' id='pix-key' name='pix-key' placeholder='Chave Pix' style="color: blue;" />
      </p>
    </div>
  </div>
  <div id='paid' class='paid'>
    <svg id='icon-paid' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 310.277 310.277" style="enable-background:new 0 0 310.277 310.277;" xml:space="preserve" width="180px" height="180px">
    <g>	<path d="M155.139,0C69.598,0,0,69.598,0,155.139c0,85.547,69.598,155.139,155.139,155.139   c85.547,0,155.139-69.592,155.139-155.139C310.277,69.598,240.686,0,155.139,0z M144.177,196.567L90.571,142.96l8.437-8.437   l45.169,45.169l81.34-81.34l8.437,8.437L144.177,196.567z" fill="#3ac569"/>
    </g></svg>
    
    <h2>Seu pagamento foi concluído.</h2>
    <h2>Obrigado!</h2>
  </div>
</div>



<script>
  const comprarButton = document.getElementById('comprar-button');
  const paidDiv = document.getElementById('paid');
  const statusMessage = document.getElementById('status-message');

  comprarButton.addEventListener('click', function () {
    // Simulação de pagamento bem-sucedido após 2 segundos
    setTimeout(function () {
      paidDiv.style.display = 'block';
      statusMessage.textContent = 'Seu pagamento foi concluído com sucesso. Obrigado!';
    }, 2000);
  });
</script>


</body>
</html>
